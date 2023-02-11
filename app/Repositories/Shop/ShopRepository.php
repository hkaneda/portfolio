<?php

namespace App\Repositories\Shop;

use Illuminate\Http\Request;
use App\Models\Item;

class ShopRepository implements ShopRepositoryInterface
{
    // 管理者側のページで商品情報の一覧を表示させる
    public function ShopIndex(Request $request)
    {
        // 商品情報一覧をペジネートで取得
        $items = Item::Paginate(5);
        // 検索フォームで入力された値を取得する
        $search = $request->input('search');

        // クエリビルダ
        $query = Item::query();

        // もし検索フォームが空でなければ
        if (!empty($search)) {
            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');

            // 単語を半角スペースで区切り、配列にする（例："ウサギ ぬいぐるみ" → ["ウサギ", "ぬいぐるみ]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            // 単語をループで回し、idかproduct_nameかdescriptionのいずれかに部分一致すれば$queryとして入力された値が保持される。
            foreach ($wordArraySearched as $keyword)
                $query->where('id', 'like', "%{$keyword}%")->orWhere(
                    'product_name',
                    'like',
                    "%{keyword}%"
                )->orWhere('description', 'like', "%{$keyword}%");
        }

        //上記で取得した$queryをページネートにし、変数$usersに代入
        $items = $query->paginate(5);

        // ビューにusersとsearchを変数として渡す
        return view('admin_items', compact('items', 'search'));
    }

    // 管理者側のページで商品を新規登録する処理をする
    public function ShopStore(Request $request)
    {
        $shop = new Item;

        $shop->product_name = $request->input('product_name');
        $shop->description = $request->input('description');
        $shop->price = $request->input('price');
        $shop->image = $request->input('image');
        $shop->stock = $request->input('stock');
        $shop->release_date = $request->input('release_date');
        $shop->upper_limit = $request->input('upper_limit');
        $shop->save();

        return view('admin_items_continue');
    }

    // 管理者側のページで商品の情報を編集するフォームを表示させる
    public function ShopEdit(Request $request)
    {
        $edits = Item::find($request);

        return view('admin_items_edit', compact('edits'));
    }

    // 管理者側のページで商品情報を変更する処理をする
    public function ShopUpdate(Request $request)
    {
        $id = $request->id;
        $update = Item::find($id);
        $update->fill([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->image,
            'stock' => $request->stock,
            'release_date' => $request->release_date,
            'upper_limit' => $request->upper_limit
        ])->save();

        return view('admin_items_update');
    }

    // 管理者側のページで商品を削除する前の確認画面を表示させる
    public function ShopDestroyConfirm(Request $request)
    {
        $items = Item::find($request);
        return view('admin_items_delete', compact('items'));
    }

    // 管理者側のページで商品を削除する処理をする
    public function ShopDestroy(Request $request)
    {
        $id = $request->id;
        Item::find($id)->delete();
        return view('admin_items_destroy');
    }
}
