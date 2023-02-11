<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Favorite\FavoriteRepositoryInterface as FavoriteRepository;

class FavoriteController extends Controller
{
    private $FavoriteRepository;

    public function __construct(FavoriteRepository $FavoriteRepository)
    {
        $this->FavoriteRepository = $FavoriteRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * お気に入り一覧を表示させる
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $favorites = $this->FavoriteRepository->FavoriteIndex($request);
        return view('favorites', compact('favorites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * お気に入りに商品を追加する
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       return $this->FavoriteRepository->FavoriteStore($request);
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
     * Remove the specified resource from storage.
     *
     * お気に入りから商品を削除する
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->FavoriteRepository->FavoriteDestroy($request);
        return redirect()->route('favorite.index');
    }
}
