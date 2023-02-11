<x-app3>
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                <h1 class="text-3xl font-semibold text-center text-gray-800 capitalize lg:text-4xl dark:text-white">お客様お気に入り一覧</h1>
                <div class="form-group flex flex-row grid grid-cols-2 ">

                    <form action="{{route('admin_favorite_index')}}" class="form-inline my-4 my-lg-0 ml-3">
                        <label>ユーザーIDを入れて検索できます：</label>
                        <input type="search" class="bg-gray-50 border border-gray-300
                                      text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                      focus:border-blue-500 block w-80 pl-10 p-2.5
                                      dark:bg-gray-700 dark:border-gray-600
                                      dark:placeholder-gray-400
                                      dark:text-white dark:focus:ring-blue-500
                                      dark:focus:border-blue-500" size="30" class="form-control col-md-5" name="search" value="{{request('search')}}" placeholder="キーワードの入力例：ウサギ ぬいぐるみ">
                        <input type="submit" value="検索" class="btn btn-info">
                    </form>
                </div>

                <button type="button" onclick="location.href='/admin/index'" class="w-40 h-12 object-bottom bg-blue-400 text-white font-semibold rounded hover:bg-blue-500">管理者
                    ページへ戻る</button>

                <div class="mycart_box">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-lg text-gray-700 text-center uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">ユーザーID</th>
                                <th scope="col" class="px-6 py-3">ユーザー名</th>
                                <th scope="col" class="px-6 py-3">登録された商品</th>
                                <th scope="col" class="px-6 py-3">登録日</th>
                                <th scope="col" class="px-6 py-3">値段</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($favorites as $favorite)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <td class="px-6 py-4 text-center text-lg">{{ $favorite->user_id }}</td>

                                <td class="px-6 py-4 text-center text-lg">{{ $favorite->user->name}}さま</td>

                                <td class="px-6 py-4 text-center text-lg">

                                    {{ $favorite->item->product_name}}

                                </td>

                                <td class="px-6 py-4 text-center text-lg">{{ $favorite->created_at->format('Y/m/d') }}</td>
                                <td class="px-6 py-4 text-center text-lg">
                                    @if('price'==null)
                                    商品データが存在しません
                                    @endif
                                    {{ $favorite->item->price}}円
                                </td>

                            </tr>
                            @empty
                            <p class="px-6 py-4 text-center text-lg">該当する商品がありません</p>
                            @endforelse

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app3>
