<?php
namespace App\Repositories\Item;

use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;

interface ItemRepositoryInterface
{
// 商品一覧を表示させる
    public function IndexItem();
// 商品情報を詳細表示させる
    public function ShowItem($id): Item;
}
