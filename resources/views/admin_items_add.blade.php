<x-app3>
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                <h1 class="text-3xl font-semibold text-center text-gray-800 capitalize lg:text-4xl dark:text-white">商品新規登録</h1>



                <div class="mycart_box">

                    <form action="/admin/items/store" method="post" class="w-10/12 mx-auto md:max-w-md">
                        @csrf
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="form-group">
                                <label for="product_name" class=" block text-xl">商品名<span class="text-sm label label-danger">(必須)</span></label>
                                <input type="text" id="product_name" name="product_name" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                            </div>
                            <div class="form-group">
                                <label for="description" class=" block text-xl">説明文<span class="text-sm label label-danger">(必須)</span></label>
                                <input type="text" id="description" name="description" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                            </div>
                            <div class="form-group">
                                <label for="price" class=" block text-xl">値段<span class="text-sm label label-danger">(必須)</span></label>
                                <input type="text" id="price" name="price" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                            </div>
                            <div class="form-group">
                                <label for="image" class=" block text-xl">画像<span class="text-sm label label-danger">(必須)</span></label>
                                <input type="text" id="image" name="image" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="画像の名前を入力してください" required>
                            </div>
                            <div class="form-group">
                                <label for="price" class=" block text-xl">在庫<span class="text-sm label label-danger">(必須)</span></label>
                                <input type="number" id="stock" name="stock" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                                <div class="form-group">
                                    <label for="release_date" class=" block text-xl"> 発売開始日<span class="text-sm label label-danger">(必須)</span></label>
                                    <input type="date" id="release_date" name="release_date" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                                </div>
                                <div class="form-group">
                                    <label for="upper_limit" class=" block text-xl">個数制限<span class="text-sm label label-danger">(必須)</span></label>
                                    <p>個数制限を設けないなら「0」で登録！</p>
                                    <input type="number" name="upper_limit" id="upper_limit" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" value="">
                                </div>

                                <button type="submit" class="mt-4 px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500">送信する</button><br>
                                <button type="button" onclick="location.href='/admin/index'" class="mt-2 px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500">管理者
                                    ページへ戻る</button>
                            </div>
                        </div>
                </div>
            </div>



</x-app3>
