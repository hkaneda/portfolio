<?php

namespace App\Repositories\Cart;

use Illuminate\Http\Request;
use App\Models\Cart;
interface CartRepositoryInterface
{
    // カートを表示する
    public function ShowCart(Cart $cart);
    // カートに商品を入れる
    public function CartStore(Request $request);

    // カート内の商品を削除する
    public function CartDestroy(Request $request);

    // 購入履歴にカートの内容を反映させ、カートの内容を削除。その後、購入完了メールを発送する。
    public function CartBuyRecord(Request $request);
}
