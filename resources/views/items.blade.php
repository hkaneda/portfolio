<x-app2>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">商品一覧</h2>
                <!-- text - end -->

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4">
                    <!-- product - start -->
                    @foreach($items as $item)
                    <div>
                        <a href="#" class="group h-96 block object-center bg-gray-100 rounded-t-lg overflow-hidden relative">
                            <img src="/image/{{$item->image}}" loading="lazy" class="object-fit:contain object-center group-hover:scale-100 transition duration-200" />
                        </a>

                        <div class="flex justify-between items-start bg-gray-100 rounded-b-lg gap-2 p-4">
                            <div class="flex flex-col">
                                <a href="#" class="text-gray-800 hover:text-gray-500 text-xl font-bold transition duration-100">{{$item->product_name}}</a>
                            </div>

                            <div class="flex flex-col items-end">
                                <span class="text-gray-600 text-2xl font-bold">{{number_format($item->price)}}円</span>
                                <button class="bg-blue-500 text-center hover:bg-gradient-to-l text-white rounded px-4 py-2" onclick="location.href='items/detail/{{$item->id}}'" class="px-2 py-1 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500">商品詳細へ</button>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- product - end -->

                </div>
            </div>
        </div>
        <div class="text-center">
            <div class="inline-flex rounded-xl border border-[#e4e4e4] bg-white p-4">
                <ul class="-mx-[6px] flex items-center">
                    {{$items->links('vendor.pagination.tailwind2')}}

                </ul>
            </div>
        </div>

</x-app2>
