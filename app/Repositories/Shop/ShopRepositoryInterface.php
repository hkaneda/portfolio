<?php
namespace App\Repositories\Shop;

use Illuminate\Http\Request;

interface ShopRepositoryInterface
{
    // 管理者側のページで商品情報の一覧を表示させる
    public function ShopIndex(Request $request);
    // 管理者側のページで商品を新規登録する処理をする
    public function ShopStore(Request $request);
    // 管理者側のページで商品の情報を編集するフォームを表示させる
    public function ShopEdit(Request $request);
    // 管理者側のページで商品情報を変更する処理をする
    public function ShopUpdate(Request $request);
    // 管理者側のページで商品を削除する前の確認画面を表示させる
    public function ShopDestroyConfirm(Request $request);
    // 管理者側のページで商品を削除する処理をする
    public function ShopDestroy(Request $request);
}
