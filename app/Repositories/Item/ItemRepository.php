<?php

namespace App\Repositories\Item;

use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;


class ItemRepository implements ItemRepositoryInterface
{
    /**
     * @var App\Models\Item;
     */
    private $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * 商品を一覧を表示させる
     *
     * @return Collection
     */
    public function IndexItem()
    {
        return Item::Paginate(6);
    }

    /**
     * 商品の詳細情報を表示させる
     */
    public function ShowItem($id): Item
    {
        return Item::findOrFail($id);
    }
}
