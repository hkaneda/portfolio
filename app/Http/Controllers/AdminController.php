<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Admin\AdminRepositoryInterface as AdminRepository;

class AdminController extends Controller
{
    private $AdminRepository;

    public function __construct(AdminRepository $AdminRepository)
    {
        $this->AdminRepository = $AdminRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 管理者ページを表示させる
     */
    public function index()
    {
        return view('admin_menu');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 管理者を新規登録するフォームを表示させる
     */
    public function create()
    {
        return view('admin_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *  // 管理者を新規登録する
     */
    public function store(Request $request)
    {
         $this->AdminRepository->AdminStore($request);

        return redirect('/admin/index')->with('message', '管理者を追加しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     *  管理者を削除する画面を表示させる
     *
     * @return void
     */
    public function adminDelete()
    {
        $admins = $this->AdminRepository->AdminDelete();

        return view('admin_delete', compact('admins'));
    }

    /**
     * 管理者削除の確認ページを表示させる
     *
     * @param Request $request
     * @return void
     */
    public function adminDeleteConfirm(Request $request)
    {

        $admins = $this->AdminRepository->AdminDeleteConfirm($request);
        return view('admin_delete_confirm', compact('admins'));
    }

    /**
     * Remove the specified resource from storage.
     *管理者を削除する
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->AdminRepository->AdminDestroy($request);
        return  redirect('/admin/index')->with('message', '管理者を削除しました。');
    }
}
