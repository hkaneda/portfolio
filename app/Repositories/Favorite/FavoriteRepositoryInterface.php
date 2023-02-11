<?php

namespace App\Repositories\Favorite;

use Illuminate\Http\Request;

interface FavoriteRepositoryInterface
{
    // お気に入り一覧を表示させる
    public function FavoriteIndex(Request $request);

    // お気に入りに商品を追加する
    public function FavoriteStore(Request $request);

    //お気に入りから商品を削除する
    public function FavoriteDestroy();
}
