<x-app3>
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品削除確認</h1>

                <h3 class="text-center">以下の商品を削除します。よろしいですか？</h3>
                </h3>
                <div class="mycart_box">

                    <div class="container mx-auto text-center">
                        <table class="table-auto border-collapse border-2 border-gray-500"">
                                <thead>
                                    <tr>
                                        <th class=" border border-gray-400 px-6 py-4 text-gray-800">商品ID</th>
                            <th class="border border-gray-400 px-6 py-4 text-gray-800">画像</th>
                            <th class="border border-gray-400 px-6 py-4 text-gray-800">商品名</th>
                            <th class="border border-gray-400 px-6 py-4 text-gray-800">説明文</th>
                            <th class="border border-gray-400 px-6 py-4 text-gray-800">値段</th>
                            <th class="border border-gray-400 px-6 py-4 text-gray-800">在庫</th>
                            <th class="border border-gray-400 px-6 py-4 text-gray-800">発売開始日</th>
                            <th class="border border-gray-400 px-6 py-4 text-gray-800">個数制限</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($items as $item)
                                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                    <!-- <td><a href=" {{route('admin_shop.index',$item)}}">
                                    </td> -->
                                    <td class="border border-gray-400 px-4 py-2">{{ $item->id }}</td>
                                    <td class="border border-gray-400 px-4 py-2"><img src="/image/{{$item->image}}" alt="" class="incart"><br></td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $item->product_name}}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $item->description }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $item->price }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $item->stock }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $item->release_date->format('Y/m/d') }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $item->upper_limit }}</td>
                                    <td class="border border-gray-400 px-4 py-2">
                                        <form action="{{route('admin_items_destroy')}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" id="id" name="id" value="{{ $item->id }}">
                                            <input type="submit" value="削除する">
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <td>該当する商品がありません</td>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="mt-4 text-center">
        <button type="button" onclick="location.href='/admin/items/index'" class="px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-yellow-500">商品情報一覧ページ</button>
        <button type="button" onclick="location.href='/admin/index'" class="px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500">管理者
            ページへ戻る</button>
    </div>
</x-app3>
