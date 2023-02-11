<x-app3>
    <div class="bg-white py-6 sm:py-8 lg:py-12 w-screen">
        <h1 class="color:#555555; text-2xl lg:text-3xl font-bold text-center mb-24 md:mb-6">管理者ページ</h1>

        @if (session('message'))
        <div class="flash_message">
            <div class="p-3 mb-3 text-center bg-yellow-300">{{session('message')}}</div>
        </div>
        @endif

        <div class=" flex justify-center items-center  w-50 space-x-4 space-y-6">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 lg:gap-8 mt-24">

                <div class="flex flex-col justify-center items-center bg-gray-100 rounded-lg p-4 lg:p-8">
                    <button type="button" onclick="location.href='/admin/create'" class="text-indigo-500 text-xl sm:text-2xl md:text-3xl font-bold">管理者新規追加</button>
                </div>

                <div class="flex flex-col justify-center items-center bg-gray-100 rounded-lg p-4 lg:p-8">
                    <button type="button" onclick="location.href='/admin/delete'" class="text-indigo-500 text-xl sm:text-2xl md:text-3xl font-bold">管理者削除</button>
                </div>

                <div class=" flex flex-col justify-center items-center bg-gray-100 rounded-lg p-4 lg:p-8">
                    <button type="button" onclick="location.href='/admin/items/index'" class=" text-indigo-500 text-xl sm:text-2xl md:text-3xl font-bold">商品情報一覧</button>
                </div>

                <div class=" flex flex-col justify-center items-center bg-gray-100 rounded-lg p-4 lg:p-8">
                    <button type="button" onclick="location.href='/admin/items/create'" class="text-indigo-500 text-xl sm:text-2xl md:text-3xl font-bold">商品追加</button>
                </div>

                <div class=" flex flex-col justify-center items-center bg-gray-100 rounded-lg p-4 lg:p-8">
                    <button type="button" onclick="location.href='/admin/favorites/index'" class="text-indigo-500 text-xl sm:text-2xl md:text-3xl font-bold">ユーザーお気に入り閲覧</button>
                </div>

                <div class=" flex flex-col justify-center items-center bg-gray-100 rounded-lg p-4 lg:p-8">
                    <button type="button" onclick="location.href='/admin/history/index'" class="text-indigo-500 text-xl sm:text-2xl md:text-3xl font-bold">ユーザー購入履歴閲覧</button>
                </div>

            </div>
        </div>
    </div>
    </div>
</x-app3>
