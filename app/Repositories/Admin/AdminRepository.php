<?php
namespace App\Repositories\Admin;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminRepository implements AdminRepositoryInterface
{
    /**
     * @var App\Models\Admin
     * 管理者を新規登録する
     */
    private $Admin;

    public function __construct(Admin $Admin) {
        $this->Admin = $Admin;
    }

    /**
     * 管理者を新規登録する
     *
     * @return Admin
     */
    public function AdminStore(Request $request)
    {
        $Admin = new Admin;
        $Admin->name = $request->input('name');
        $Admin->email = $request->input('email');
        $Admin->password = Hash::make($request->input('password'));
        $Admin->save();

    }

    /**
     * 管理者削除画面を表示させる
     */
    public function AdminDelete(): Collection
    {
        return $this->Admin->all();
    }

    /**
     * 管理者削除の確認ページを表示させる
     */
    public function AdminDeleteConfirm(Request $request)
    {
        return $this->Admin->find($request);
    }

    /**
     * 管理者を削除する
     */
    public function AdminDestroy(Request $request)
    {
        $id = $request['id'];
        return  $this->Admin->find($id)->delete();


    }
}
