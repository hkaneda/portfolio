<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    protected $fillable = [
        'item_id', 'user_id', 'quantity'
    ];

    // itemモデルから商品のデータを引っ張りたいのでリレーションを結ぶ
    public function item()
    {
        return $this->belongsTo('\App\Models\Item');
    }
    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }

    public function data()
    {
        $cart = Cart::With(['item.user'])->get();
    }

    public function purchase_details()
    {
        return $this->hasMany('\App\Models\PurchaseDetail');
    }
}
