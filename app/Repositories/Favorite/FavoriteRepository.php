<?php

namespace App\Repositories\Favorite;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

class FavoriteRepository implements FavoriteRepositoryInterface
{
    private $Favorite;

    public function __construct(Favorite $Favorite)
    {
        $this->Favorite = $Favorite;
    }

    // お気に入り一覧を表示させる
    public function FavoriteIndex(Request $request)
    {
        $user_id = Auth::id();
        $Favorite = new Favorite();
        return $Favorite->where('user_id', $user_id)->paginate(5);
    }

    // お気に入りに商品を追加する
    public function FavoriteStore(Request $request)
    {
        $Favorites = new Favorite();
        $Favorites->user_id = Auth::id();
        $item_id = $request->input('item_id');
        $Favorites->item_id = $item_id;

        // 「お気に入りに追加するボタン」を押して送信されてきたitem_idと同じitem_idをテーブルから探して変数に格納する
        $favorites = Favorite::where('user_id', $Favorites->user_id)->where('item_id', $item_id)->first();

        // 既にお気に入りに追加されていればメッセージ付きでリダイレクトさせる。
        if (isset($favorites)) {
            return redirect()->route('item.show', ['id' => $item_id])->with('message', 'すでにお気に入りに入っています。');
        } else {
            $Favorites->save();
            return
                redirect()->route('item.show', ['id' => $request['item_id']])->with('message', 'お気に入りに追加しました。');
        }
    }

    //お気に入りから商品を削除する
    public function FavoriteDestroy()
    {
        $id = $_POST['id'];
        Favorite::find($id)->delete();
    }
}
