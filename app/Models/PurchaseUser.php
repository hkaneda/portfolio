<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseUser extends Model

{
    use HasFactory;

    protected $fillable = [
        'user_id', 'purchase_date', 'user_name',
    ];
    protected $dates = [
        'purchase_date',
    ];

    /**
     * Cartsテーブルと1対1のリレーションを結ぶ
     *
     * @return void
     */
    public function LatestUser()
    {
        return $this->hasOne(Cart::class);
    }
}
