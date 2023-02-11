<x-app3>
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品情報変更成功</h1>
                <div class="">
                    <div class="flex">
                        <h3>商品情報の変更が成功しました。<br>
                            引き続き変更する場合は商品一覧ページに戻ってください。
                        </h3>
                        <div class="mycart_box">

                            <button type="button" onclick="location.href='/admin/items/index'" class="px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-yellow-500">商品情報一覧ページ</button>
                            <button type="button" onclick="location.href='/admin/index'" class="px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500">管理者
                                ページへ戻る</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app3>
