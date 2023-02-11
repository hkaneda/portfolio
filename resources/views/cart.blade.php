<x-app2>
    <div class="bg-white py-6 sm:py-8 lg:py-12 container-fluid ">
        <div class="max-w-screen-lg  px-4 md:px-4 mx-auto" style="max-width:1200px">
            <div class="mb-6 sm:mb-10 lg:mb-16">
                <h2 class="text-gray-800 text-2xl lg:text-3xl  text-center mb-4 md:mb-6">{{ Auth::user()->name }} さんのカート</h2>
            </div>

            @if (session('message'))
            <div class="p-3 rounded shadow bg-green-200">{{session('message')}}</div>
            @endif

            @if($cart->isNotEmpty())
            @foreach($cart as $carts)
            <div class="flex flex-col gap-4 md:gap-6 mb-6 sm:mb-8">
                <!-- product - start -->
                <div class="flex flex-wrap border rounded-lg overflow-hidden gap-x-4 sm:gap-y-4 lg:gap-4">
                    <a href="#" class="group w-32 sm:w-40 h-48 sm:h-56 block bg-gray-100 overflow-hidden relative">
                        <img src="/image/{{$carts->item->image}}" loading="lazy" class="w-32 h-48 object-contain object-center " />
                    </a>
                    <div class="flex flex-col">
                        <p class="inline-block text-gray-800 hover:text-gray-500 text-lg lg:text-xl text-center font-bold transition duration-100 mb-1">{{$carts->item->product_name}}</p>
                        <div class="w-32 sm:w-auto flex justify-between border-t sm:border-none p-4 sm:pl-0 lg:p-6 lg:pl-0">
                            <div class="flex flex-col items-start gap-2">
                                <div class="pt-3 md:pt-2 ml-4 md:ml-8 lg:ml-16">
                                    <span class="block text-gray-800 md:text-lg font-bold">価格：{{ number_format($carts->item->price)}}円</span>
                                    <span class="block text-gray-800 md:text-lg text-right font-bold">{{$carts->quantity}}個</span>
                                </div>
                                <form action="cart/delete" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="mt-12 px-4 py-1 bg-blue-400 text-white  rounded hover:bg-blue-500 ">カートから削除する</button>
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="id" value="{{$carts->id}}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="flex box-content  content-around place-content-evenly h-64">
                <p class=" text-center">カートはからっぽです。</p>

                 @endif

                    <!-- product - end -->
            </div>
        </div>
        <!-- totals - start -->
        <div class="flex justify-end mt-4">
            <div class="flex flex-col">
                <div class="sm:max-w-xs bg-gray-100 rounded-lg p-4">
                    <div class="space-y-1 text-right">
                        <div class="text-center text-gray-500 gap-4">
                            <span class="font-bold text-xl">合計</span>
                        </div>
                    </div>

                    <div class=" text-right text-gray-800 mt-8">
                        <span class="flex flex-col items-end">
                            <span class="text-lg font-bold">個数：{{$count}}個</span>
                            <span class="text-lg font-bold">合計金額:{{number_format($sum)}}円</span>
                        </span>
                    </div>

                    <div class="flex justify-center">
                        <form action="/cart/checkout" method="POST">
                            @csrf
                            <button type="submit" class=" mt-8 px-11 py-1 bg-blue-400 text-white  rounded hover:bg-blue-500  ">購入する</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- totals - end -->
        <div class="mt-12 text-center">
            <button type="button" onclick="location.href='/items'" class=" px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500">商品一覧ページへ戻る</button>
        </div>

</x-app2>
