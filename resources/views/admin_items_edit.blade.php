<x-app3>
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品情報変更</h1>
                <div class="mt-8">
                    @foreach($edits as $edit)
                    <form class="w-10/12 mx-auto md:max-w-md" action="{{ route('admin_shop_update')}}" method="post" class="row">
                        @csrf
                        @method('PATCH')
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="form-group">
                                <label for="product_name" class="text-xl block"><br> 商品名<span class="text-sm label label-danger">(必須)</span></label>
                                <input class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" id="product_name" name="product_name" class="form-control" value="{{$edit->product_name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="description" class="text-xl block"> 説明文<span class="text-sm label label-danger">(必須)</span></label>
                                <input class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" id="description" name="description" class="form-control" value="{{$edit->description}}" required>
                            </div>
                            <div class="form-group">
                                <label for="price" class="text-xl block">値段<span class="text-sm label label-danger">(必須)</span></label>
                                <input class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" id="price" name="price" class="form-control" value="{{$edit->price}}" required>
                            </div>
                            <div class="form-group">
                                <label for="image" class="text-xl block">画像<span class="text-sm label label-danger">(必須)</span></label>
                                <input class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" id="image" name="image" class="form-control" value="{{$edit->image}}" placeholder="画像の名前を入力してください" required>
                            </div>
                            <div class="form-group">
                                <label for="stock" class="text-xl block">在庫<span class="text-sm label label-danger">(必須)</span></label>
                                <input class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="number" id="stock" name="stock" class="form-control" value="{{$edit->stock}}" required>個
                                <div class="form-group">
                                    <label for="release_date" class="text-xl block">発売開始日<span class="text-sm label label-danger">(必須)</span></label>
                                    <input class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="date" id="release_date" name="release_date" class="form-control" value="{{$edit->release_date->format('Y-m-d')}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="upper_limit" class="text-xl block">個数制限<span class="text-sm label label-danger">(必須)</span></label><br>
                                    <!-- <label class="text-xl block"><input type="checkbox" id="upper_limit_yes" name="upper_limit_yes" class="form-control">あり</label> -->
                                    <input class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="number" name="upper_limit" id="upper_limit" value="{{$edit->upper_limit}}">
                                    <!-- 個数制限を「付けない」にチェックを入れると、DBには「0」が入る -->
                                    <!-- <label class="text-xl block"><input type="checkbox" id="upper_limit" name="upper_limit" class="form-control" value="0">なし</label> -->
                                    <input type="hidden" name="id" value="{{$edit->id}}">
                                    <button type="submit" class="px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500">更新する</button><br>
                                </div>
                                @endforeach
                    </form>
                    <button type=" button" onclick="location.href='/admin/index'" class="px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500">管理者
                        ページへ戻る</button>
                    <button type="button" onclick="location.href='/admin/items/index'" class="px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500">商品情報一覧に戻る</button>
                </div>
            </div>
        </div>
    </div>
</x-app3>
