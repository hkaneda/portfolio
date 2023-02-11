<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Item\ItemRepositoryInterface as ItemRepository;

class ItemController extends Controller
{
    /**
     * @var ItemRepository
     *
     * @return void
     */
    private $itemRepository;

    public function __construct(ItemRepository $itemRepository){
        $this->itemRepository = $itemRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * 商品一覧を表示させる
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->itemRepository->IndexItem();
        return view('items', compact('items'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * 商品の詳細情報を表示させる
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = $this->itemRepository->ShowItem($id);
        return view('show', compact('items'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
