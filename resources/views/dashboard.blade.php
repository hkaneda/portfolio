<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if (session('message'))
    {{session('message')}}
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    ログインしました<br>
                    <button class="bg-gradient-to-r from-blue-300 to-blue-800 hover:bg-gradient-to-l text-white rounded px-4 py-2 hover:bg-blue-500" onclick="location.href='/items'">商品一覧ページへ</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
