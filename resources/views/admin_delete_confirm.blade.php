<x-app3>
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">管理者削除</h1>
                <div class="">
                    <h3 class="text-center">以下の管理者を削除します。よろしいですか？</h3>
                    <div class="mycart_box">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-lg text-gray-700 text-center uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">ID</th>
                                    <th scope="col" class="px-6 py-3">管理者名</th>
                                    <th scope="col" class="px-6 py-3">メールアドレス</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                <form action="/admin/destroy" method="post">
                                    @csrf
                                    @method('delete')
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4 text-center text-lg">{{ $admin->id }}</td>
                                        <td class="px-6 py-4 text-center text-lg">{{ $admin->name }}</td>
                                        <td class="px-6 py-4 text-center text-lg">{{ $admin->email }}</td>
                                        <td><input type="submit" class="px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500" value="削除"></td>
                                        <td><input type="hidden" name="id" value="{{$admin->id}}"></td>
                                    </tr>
                                </form>
                                @endforeach
                            </tbody>
                        </table>
                        <button type="button" onclick="location.href='/admin/index'" class="px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500">管理者
                            ページへ戻る</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app3>
