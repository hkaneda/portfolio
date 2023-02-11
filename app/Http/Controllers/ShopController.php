<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Repositories\Shop\ShopRepositoryInterface as ShopRepository;


class ShopController extends Controller
{
    private $ShopRepository;

    public function __construct(ShopRepository $ShopRepository)
    {
        $this->ShopRepository = $ShopRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * 管理者側のページで商品情報の一覧を表示させる
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       return $this->ShopRepository->ShopIndex($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * 管理者側のページで商品を新規登録するためのフォームを表示させる
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_items_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * 管理者側のページで商品を新規登録する処理をする
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      return $this->ShopRepository->ShopStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * 管理者側のページで商品の情報を編集するフォームを表示させる
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       return $this->ShopRepository->ShopEdit($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * 管理者側のページで商品情報を変更する処理をする
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      return $this->ShopRepository->ShopUpdate($request);
    }
    /**
     * 管理者側のページで商品を削除する前の確認画面を表示させる
     *
     * @param Request $request
     * @return void
     */
    public function destroyConfirm(Request $request)
    {
       return $this->ShopRepository->ShopDestroyConfirm($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * 管理者側のページで商品を削除する処理をする
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      return $this->ShopRepository->ShopDestroy($request);
    }
}
