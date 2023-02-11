<?php
namespace App\Repositories\Admin;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;


interface AdminRepositoryInterface
{
// 管理者を新規登録する
public function AdminStore(Request $request);

// 管理者を削除する画面を表示させる
public function AdminDelete(): Collection;
// 管理者削除の確認ページを表示させる
public function AdminDeleteConfirm(Request $request);
// 管理者を削除する
public function AdminDestroy(Request $request);
}
