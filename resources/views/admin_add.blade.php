<x-app3>
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                <h1 style="color:#555555; text-align:center; font-size:2rem; padding:24px 0px; font-weight:bold;">管理者新規登録</h1>

                <div class="form-group">


                    <div class="mt-8">
                        <form class="w-10/12 mx-auto md:max-w-md" action="/admin/add" method="post" class="row">
                            @csrf
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-group">

                                    <label for="name" class=" block text-xl">名前</label>
                                    <input type="text" id="name" name="name" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                                </div>
                                <div class="form-group">
                                    <label for="email" class=" block text-xl"> メールアドレス<span class="text-sm label label-danger">(必須)</span></label>
                                    <input type="email" id="email" name="email" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                                </div>
                                <div class="form-group">
                                    <label for="password" class=" block text-xl">パスワード<span class="text-sm label label-danger">(必須)</span> </label>
                                    <input type="password" id="password" name="password" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"" required>
                                </div>
                                <button type=" submit" class="px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500">送信する
                                </div>
                            </div>
                    </div>


                </div>
</x-app3>
