<?php

namespace App\Repositories\Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Mockery\Exception;
use App\Models\Cart;
use App\Models\Item;
use App\Models\PurchaseDetail;
use App\Models\PurchaseUser;
use App\Mail\Thanks;

class CartRepository implements CartRepositoryInterface
{
    // カートを表示する
    public function showCart(Cart $cart)
    {
        $user_id = Auth::id();
        // 合計金額を表示させる
        $cart = Cart::where('user_id', $user_id)->get();
        $data['cart'] = $cart;

        $data['count'] = 0;

        $data['price'] = 0;
        $data['sum'] = 0;

        foreach ($data['cart'] as $cart) {
            $data['count'] += $cart->quantity;

            $data['price'] = $cart->item->price * $cart->quantity;
            $data['sum'] += $data['price'];
        }
        return $data;
    }

    // カートに商品を入れる
    public function CartStore(Request $request)
    {
        $user_id = Auth::id();
        $id = $request->input('item_id');
        $quantity = $request->input('quantity');

        // 購入履歴から過去に同じ商品を購入しているか調べる
        $old_quantity = PurchaseDetail::where('item_id', $id)->where('user_id', $user_id)->value('quantity');
        // カートに同じ商品が入っているか調べる。
        $cart_quantity = Cart::where('item_id', $id)->value('quantity');

        // フォームから送信されてきたitem_idの個数制限の数を取得する。
        $limit = Item::where('id', $id)->value('upper_limit');
        // Itemテーブルの在庫数を取得する
        $stock = Item::where('id', $id)->value('stock');

        // 個数制限が0ではない(個数制限が掛かっている)、かつ
        // フォームから送信された値が制限個数を上回っていると、
        // メッセージ付きで商品詳細ページにリダイレクトされる。
        if ($limit !== 0 && $quantity > $limit) {
            return redirect()->route('item.show', ['id' => $id])->with('message', '制限個数を超過しています。数を減らしてください。');
            // 上記に加え、過去に同じ商品を購入・カートに同じ商品が入っている場合もリダイレクトさせる。
        } elseif ($limit !== 0 && $quantity + $old_quantity + $cart_quantity > $limit) {
            return redirect()->route('item.show', ['id' => $id])->with('message', '過去に同じ商品を購入しているため、合計で制限個数を超過しています。数を減らしてください。');
            // カートに入れる数が在庫数を上回っていた場合もリダイレクトさせる。
        } elseif ($quantity > $stock) {
            return redirect()->route('item.show', ['id' => $id])->with('message', '商品の数が足りません。数を減らしてください。');
            // 個数を入力せずカートに入れようとした場合、リダイレクトさせる。
        } elseif ($quantity == 0) {
            return redirect()->route('item.show', ['id' => $id])->with('message', '商品の数は必ず入力してください！');
        }

        // カートに商品を入れる。
        $carts = new Cart;
        $carts->user_id = Auth::id();
        $carts->item_id = $request->input('item_id');
        $carts->quantity = $request->input('quantity');
        $carts->save();

        return redirect('/cart')->with('message', 'カートに追加しました。');
    }

    // カート内の商品を削除する
    public function CartDestroy(Request $request)
    {
        $id = $request->id;
        Cart::find($id)->delete();
    }

    // 購入履歴にカートの内容を反映させ、カートの内容を削除。その後、購入完了メールを発送する。
    public function CartBuyRecord(Request $request)
    {
        $user_id = Auth::id();

        // cartsテーブルから、現在ログイン中のユーザーの情報を取得する。
        $histories = Cart::where('user_id', $user_id)->get();

        DB::beginTransaction();
        try {
            foreach ($histories as $history) :
                // 「ログイン中のユーザーのカート内のitem_idをもとに、itemsテーブルのid(商品id)を割り出す。
                $item = Item::where('id', $history->item_id)->get();

                //在庫数に反映させるため、 Itemテーブルの在庫数から、カートの中の上記で割り出した商品idの個数を引く。
                $item[0]->decrement('stock', $history->quantity);

                // 取得した情報をPurchaseDetails,PurchaseUsersテーブルに格納する。
                // 直接items・usersテーブルからレコードを取得するのではなく、
                // 「購入時にカートに存在するレコード」に紐づいたレコードをitems・usersテーブルから取得して格納することにより、
                // 後からユーザー情報や値段が変更されたとしても、購入履歴のレコードに反映されてしまう事を防げる。
                PurchaseUser::create([
                    'user_id' => $history->user_id,
                    'user_name' => $history->user->name,
                    'purchase_date' => \Carbon\Carbon::today()
                ]);

                PurchaseDetail::create([
                    'user_id' => $history->user_id,
                    'item_id' => $history->item_id,
                    'product_name' => $history->item->product_name,
                    'quantity' => $history->quantity,
                    'upper_limit' => $history->item->upper_limit,
                    'price' => $history->item->price
                ]);
            endforeach;

            // メール送信のテストを行う際にはコメントを外す。
            // // 購入したユーザーに購入完了メールを送信していく。
            // $user = Auth::user();
            // // $mail_data['user']に購入ユーザー名を挿入する。
            // $mail_data['user'] = $user->name;
            // // $mail_data['checkout_items']に、現在ログイン中のユーザーのカート内の情報を入れる。
            // $mail_data['checkout_items'] = Cart::where('user_id', Auth::id())->get();

            // // ここでユーザーに購入完了メールを送信する。
            // Mail::to($user->email)->send(new Thanks($mail_data));

            //条件を「現在ログイン中のユーザーID」で絞り、カートの中身を物理削除する。
            Cart::where('user_id', $user_id)->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
    }
}
