<x-app3>
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                <h1 style="color:#555555; text-align:center; font-size:2rem; padding:24px 0px; font-weight:bold;">商品情報一覧</h1>

                <div class="form-group flex flex-row grid grid-cols-2 ">
                    <form action="{{route('admin_history_index')}}" class="form-inline my-4 my-lg-0 ml-3">
                        <label>商品ID、もしくはキーワード：</label>
                        <input type="search" size="30" class="bg-gray-50 border border-gray-300
                                     text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                     focus:border-blue-500 block w-80 pl-10 p-2.5
                                     dark:bg-gray-700 dark:border-gray-600
                                     dark:placeholder-gray-400
                                     dark:text-white dark:focus:ring-blue-500
                                     dark:focus:border-blue-500" name=" search" value="{{request('search')}}" placeholder="キーワードの入力例：ウサギ ぬいぐるみ">
                        <input type="submit" value="検索" class="btn btn-info">
                    </form>

                    <div class="text-center">
                        <div class="inline-flex rounded-xl border border-[#e4e4e4] bg-white p-4">
                            <ul class="-mx-[6px] flex items-center">
                                {{$items->links('vendor.pagination.tailwind2') }}
                            </ul>
                        </div>
                    </div>

                </div>

                <div class=" flex justify-center  ">
                    <table class=" w-screen  text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-base text-gray-700 text-center uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">商品ID</th>
                                <th scope="col" class="px-3 py-3">画像</th>
                                <th scope="col" class="px-4 py-3">商品名</th>
                                <th scope="col" class="px-4 py-3">説明文</th>
                                <th scope="col" class="px-8 py-3">値段</th>
                                <th scope="col" class="px-4 py-3">在庫</th>
                                <th scope="col" class="px-4 py-3">発売開始日</th>
                                <th scope="col" class="px-8 py-3">個数制限</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($items as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <td class="px-4 py-4 text-center text-lg">{{ $item->id }}</td>
                                <td class="px-4 py-4 text-center text-lg"><img class="object-contain h-20 w-full " src="/image/{{$item->image}}" alt="" class="incart"></td>
                                <td class="px-6 py-4 text-center ext-base">{{ $item->product_name}}</td>
                                <td class="px-6 py-4 text-center text-base">{{ $item->description }}</td>
                                <td class="px-8 py-4 text-center text-lg">{{ number_format($item->price) }}円</td>
                                <td class="px-6 py-4 text-center text-lg">{{ $item->stock }}</td>
                                <td class="px-6 py-4 text-center text-lg">{{ $item->release_date->format('Y/m/d') }}</td>
                                <td class="px-4 py-4 text-center text-lg">{{ $item->upper_limit }}</td>
                                <td>
                                    <form action="{{route('admin_shop.edit')}}" method="get">
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <input type="submit" value="編集">
                                    </form>
                                    <form action="{{route('admin_delete.confirm')}}" method="get">
                                        <input type="hidden" id="id" name="id" value="{{ $item->id }}">
                                        <input type="submit" value="削除">
                                    </form>
                                </td>
                            </tr>
                            @empty

                            <td>該当する商品がありません</td>
                            @endforelse


                    </table>


                </div>

            </div>
            <div class="flex justify-center mt-4">
                <ul class="-mx-[6px] flex items-center">
                    <button type="button" onclick="location.href='/admin/index'" class=" px-4 py-4 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500">管理者ページへ戻る</button>
                </ul>
            </div>
        </div>
    </div>
</x-app3>
