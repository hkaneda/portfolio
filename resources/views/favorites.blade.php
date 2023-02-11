<x-app2>



    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">お気に入り一覧</h2>
                <!-- text - end -->

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4">
                    <!-- product - start -->
                    @if($favorites->isNotEmpty())

                    @foreach($favorites as $favorite)
                    <div>
                        <a href="#" class="group h-96 block bg-gray-100 rounded-t-lg overflow-hidden relative">
                            <img src="/image/{{$favorite->item->image}}" loading="lazy" alt="Photo by Austin Wade" class="object-contain object-center group-hover:scale-110 transition duration-200" />
                        </a>

                        <div class="flex justify-between items-start bg-gray-100 rounded-b-lg gap-2 p-4">
                            <div class="flex flex-col">
                                <a href="#" class="text-gray-800 hover:text-gray-500 lg:text-lg font-bold transition duration-100">{{$favorite->item->product_name}}</a>
                            </div>

                            <div class="flex flex-col items-end">
                                <button class="bg-blue-500 text-center hover:bg-gradient-to-l text-white rounded px-4 py-2" onclick="location.href='http://127.0.0.1:8000/items/detail/{{$favorite->item->id}}'" class="px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500">商品詳細へ</button>
                                <form action="/favorites/delete" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="id" value="{{$favorite->id}}">

                                    <button class="px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500"><input type="submit" value="お気に入りから削除する"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @else
    <p class="text-center">お気に入りに入っている商品はありません。</p>
    @endif
    <div class="text-center object-center">
        <div class="flex justify-center mt-8">
            <ul class="-mx-[6px] flex items-center">
                <button type="button" onclick="location.href='/items'" class=" px-4 py-4 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500">商品一覧ページへ戻る</button>
            </ul>
        </div>

        <div class="text-center">
            <div class="inline-flex rounded-xl border border-[#e4e4e4] bg-white mt-4 p-4">
                <ul class="-mx-[6px] flex items-center">
                    {{$favorites->links('vendor.pagination.tailwind2')}}

                </ul>
            </div>
        </div>
    </div>

</x-app2>
