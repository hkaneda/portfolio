<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // 更新不可のカラム
    protected $guarded = [
        'id'
    ];

    // 更新可能なカラム
    protected $fillable = [
        'product_name',
        'description',
        'price',
        'image',
        'stock',
        'release_date',
        'upper_limit'
    ];

    // format()を使えるようにする
    protected $dates = [
        'release_date',
    ];

    /**
     * 従テーブルであるFavoritesテーブルと1対他のリレーションを結ぶ
     *
     * @return void
     */
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    /**
     * 従テーブルであるPurchaseDetailsテーブルと1対他のリレーションを結ぶ
     *
     * @return void
     */
    public function purchaseDetail()
    {
        return $this->hasMany(PurchaseDetail::class);
    }
}
