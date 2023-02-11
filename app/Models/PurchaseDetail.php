<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'item_id',  'quantity', 'product_name', 'upper_limit', 'price'
    ];
    /**
     * Cartsテーブルと1対1のリレーションを結ぶ
     *
     * @return void
     */
    public function LatestOrder()
    {
        return $this->hasOne(Cart::class);
    }

    /**
     * 従テーブルのPurchaseDetailsテーブルの複数レコードに対し、
     * Itemsテーブルのレコードと関連付けるためリレーションを結ぶ
     *
     * @return void
     */
    public function item()
    {
        return $this->BelongsTo('\App\Models\Item');
    }
}
