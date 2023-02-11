<x-app2>

    <div class="container-fluid">
        <div class="mx-auto" style="max-width:1200px">
            <h1 class="font-weight:bold text-3xl text-center ">商品詳細</h1>

            <div class="flex justify-center">
                <div class=" p-8 mx-8 object-top object-fit: contain">

                    <img class="border-2 border-indigo-600 object-contain h-48 w-full" src="/image/{{ $items->image}}" alt="" class="incart"><br>
                    <p class="tracking-wide text-center text-3xl">{{$items->product_name}}</p><br>

                    <p class="text-center">{{$items->description}}</p><br>
                    <p class="text-center text-2xl ">価格：{{number_format($items->price)}}円（税込）</p><br>
                    @if($items->upper_limit!==0)
                    <div class="mt-3 p-3 rounded shadow-lg bg-red-200 text-red-500 font-bold">
                        この商品はお一人様{{$items->upper_limit}}個までご購入いただけます。<br>
                    </div><br>

                    @endif
                    @if (session('message'))
                    <div class="flash_message mt-2">
                        <div class=" mb-2 p-3 rounded shadow-lg text-center bg-red-200 text-red-500 font-bold">{{ session('message') }}</div>
                    </div>
                    @endif
                    <div class=" p-3 rounded shadow-lg bg-red-200">残り{{ $items->stock}}個</div><br>
                </div>
            </div>

            <div class="flex justify-center">
                <form action="/favorites/add" method="post">
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $items->id }}">
                    <button type="submit" class="mb-4  px-11 py-1 bg-blue-400 text-white  rounded hover:bg-blue-500" value="">お気に入りに追加する<button><br>
                </form>
            </div>

            <div class="flex justify-center">
                <form action="/cart/add" method="post">
                    @csrf

                    <div class="form-group flex"><input type="number" name="quantity" value="" class="appearance-none block w-full bg-white
                           text-gray-700 border border-gray-200
                           rounded py-3 px-4 leading-tight focus:outline-none
                           focus:bg-white focus:border-gray-500">
                        <input type="hidden" name="item_id" value="{{ $items->id }}">
                        <button type="submit" value="" class="mt-1 mb-2 ml-4 px-6  bg-blue-400 text-white  rounded hover:bg-blue-500">カートに入れる</button><br>
                    </div>
                </form>
            </div>

            <div class="flex justify-center">
                <button type="button" onclick="location.href='/items'" class="mt-4 px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500">商品一覧ページへ戻る</button>
            </div>
        </div>
    </div>
</x-app2>
