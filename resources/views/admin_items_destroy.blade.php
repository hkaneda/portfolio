<x-app3>
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品登録成功</h1>
                <div class="">
                    <div class="flex">
                        <h3>商品削除が成功しました。<br>
                            引き続き削除しますか？
                        </h3>
                        <div class="mycart_box">

                            <button type="button" onclick="location.href='/admin/items/create'" class="px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-yellow-500">引き続き削除する</button>
                            <button type="button" onclick="location.href='/admin/index'" class="px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500">管理者
                                ページへ戻る</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app3>
