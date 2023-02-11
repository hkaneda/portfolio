<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Item;

class Favorite extends Model
{
    protected $fillable = [

        'id', 'item_id', 'user_id',
    ];

    protected $date = [
        'created_at'
    ];

    use HasFactory;


    /**
     * 親ファイルであるitemモデルから商品のデータを引っ張りたいのでリレーションを結ぶ
     *
     * @return void
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * ユーザーテーブルとリレーションを結ぶ
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }
}
