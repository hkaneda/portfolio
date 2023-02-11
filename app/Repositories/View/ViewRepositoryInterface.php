<?php
namespace App\Repositories\View;

use Illuminate\Http\Request;

interface ViewRepositoryInterface
{
    // 管理者ページからお気に入りを表示させる
public function ViewFavoriteIndex(Request $request);
    //管理者ページから購入履歴を表示させる
public function ViewShowHistory(Request $request);
}
