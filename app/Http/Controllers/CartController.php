<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Repositories\Cart\CartRepositoryInterface as CartRepository;

class CartController extends Controller
{
    private $CartRepository;

    public function __construct(CartRepository $CartRepository)
    {
        $this->CartRepository = $CartRepository;
    }
    /**
     * Display a listing of the resource.
     *カートの中身を表示させる
     * @return \Illuminate\Http\Response
     */
    public function index(Cart $cart)
    {
        // インスタンス化したCart.phpを呼び出す事で、
        // Cart.phpのshowCart()メソッドの処理を実行できる。
        $data = $this->CartRepository->showCart($cart);
        return view('cart', $data);
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
     *カートに商品を入れる
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      return  $this->CartRepository->CartStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
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
     *カートの中の商品を削除する
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->CartRepository->CartDestroy($request);
        return  redirect()->route('cart.index')->with('message', 'カートの商品を削除しました。');
    }


    /**
     *   購入履歴にカートの内容を反映させてから、カートの内容を削除。
     *   その後、購入完了メールを発送する。
     *
     * @return void
     */
    public function buyRecord(Request $request)
    {
        $this->CartRepository->CartBuyRecord($request);
        return redirect('/cart')->with('message', 'お買い上げありがとうございます。');
    }
}
