<x-app3>
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">お客様購入履歴一覧</h1>

                <div class="form-group flex flex-row grid grid-cols-2 ">

                    <form action="{{route('admin_history_index')}}" class="form-inline my-4 my-lg-0 ml-3">
                        <label>ユーザーIDを入力してください：</label>
                        <input type="search" size="30" class="bg-gray-50 border border-gray-300
                                     text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                     focus:border-blue-500 block w-80 pl-10 p-2.5
                                     dark:bg-gray-700 dark:border-gray-600
                                     dark:placeholder-gray-400
                                     dark:text-white dark:focus:ring-blue-500
                                     dark:focus:border-blue-500" name=" search" value="{{request('search')}}">
                        <input type="submit" value="検索" class="btn btn-info">
                    </form>
                    <div class="text-center">
                        <div class="inline-flex rounded-xl border border-[#e4e4e4] bg-white  p-4">
                            <ul class="-mx-[6px] flex items-center mb-8">
                                {{$users->links('vendor.pagination.tailwind2') }}
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mycart_box">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-lg text-gray-700 text-center uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">ユーザーID</th>
                                <th scope="col" class="px-6 py-3">ユーザー名</th>
                                <th scope="col" class="px-6 py-3">購入日</th>
                                <th scope="col" class="px-6 py-3">購入した商品</th>
                                <th scope="col" class="px-6 py-3">個数</th>
                                <th scope="col" class="px-6 py-3">値段</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($users as $user)

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                @if('user_id'==null)
                                商品データが存在しません
                                @endif
                                <td class="px-6 py-4 text-center text-lg">{{ $user->user_id }}</td>
                                <td class="px-6 py-4 text-center text-lg">{{ $user->user_name}} さま</td>
                                <td class="px-6 py-4 text-center text-lg">{{ $user->created_at }}</td>
                                <td class="px-6 py-4 text-center text-lg">

                                    {{ $user->product_name}}

                                </td>
                                <td class="px-6 py-4 text-center text-lg">{{$user->quantity}}個</td>

                                <td class="px-6 py-4 text-center text-lg">
                                    {{number_format($user->price)}}円

                                </td>
                            </tr>
                            @empty
                            <p class="px-6 py-4 text-center text-lg">該当する履歴がありません</p>
                            @endforelse

                    </table>

                    <button type="button" onclick="location.href='/admin/index'" class="mt-6 px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500">管理者
                        ページへ戻る</button>
                </div>
            </div>
        </div>
    </div>
</x-app3>
