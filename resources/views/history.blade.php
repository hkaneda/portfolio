<x-app2>
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                @if($users->isNotEmpty())
                <p class="text-center text-2xl mt-8">{{Auth::user()->name}} さまの購入履歴</p><br>

                <div class="text-center">
                    <div class="inline-flex rounded-xl border border-[#e4e4e4] bg-white p-4">
                        <ul class="-mx-[6px] flex items-center">
                            {{$users->links('vendor.pagination.tailwind2') }}
                        </ul>
                    </div>
                </div>

                <div class="mycart_box">

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-lg text-gray-700 text-center uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <th class="px-6 py-4">
                                注文番号
                            </th>
                            <th class="px-6 py-3">
                                購入日
                            </th>
                            <th class="px-6 py-3">
                                商品名
                            </th>
                            <th class="px-6 py-3">
                                金額
                            </th>
                            <th class="px-6 py-3">
                                個数
                            </th>
                            </tr>
                        </thead>
                        @foreach($users as $user)
                        <tbody>


                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <td class="px-6 py-4 text-center text-lg">{{$user->id}}</td>
                                <td class="px-6 py-4 text-center text-lg">{{$user->created_at}}</td>
                                <td class="px-6 py-4 text-center text-lg">{{$user->product_name}}</td>
                                <td class="px-6 py-4 text-center text-lg">{{number_format($user->price)}}</td>
                                <td class="px-6 py-4 text-center text-lg">{{$user->quantity}}個</td>
                            </tr>
                            @endforeach
                            @else
                            <p class="text-center">購入履歴はありません。</p><br>
                            @endif

                    </table>

                    <div class="text-center object-center">
                        <div class="flex justify-center mt-8">
                            <ul class="-mx-[6px] flex items-center">
                                <button type="button" onclick="location.href='/items'" class=" px-4 py-4 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500">商品一覧ページへ戻る</button>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app2>
