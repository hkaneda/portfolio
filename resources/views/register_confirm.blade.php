<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            以下の情報で登録します。よろしいですか？
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('お名前')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$name" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('メールアドレス')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$email" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('パスワード')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" value="$password" required />
            </div>
            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('確認のため、再度ご入力ください')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" value="$password" required />
            </div>

            <div>
                <x-label for="postal_code" :value="__('郵便番号')" />

                <x-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code" :value="$postal_code" required autofocus />
            </div>
            <div>
                <x-label for="prefectures" :value="__('都道府県')" />

                <x-input id="prefectures" class="block mt-1 w-full" type="text" name="prefectures" :value="$prefectures" required autofocus />
            </div>
            <div>
                <x-label for="municipality" :value="__('市区町村')" />

                <x-input id="municipality" class="block mt-1 w-full" type="text" name="municipality" :value="$municipality" required autofocus />
            </div>
            <div>
                <x-label for="block" :value="__('番地')" />

                <x-input id="block" class="block mt-1 w-full" type="text" name="block" :value="$block" required autofocus />
            </div>
            <div>
                <x-label for="address" :value="__('マンション・アパート名・部屋番号')" />

                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="$address" autofocus />
            </div>
            <div>
                <x-label for="phone_number" :value="__('電話番号')" />

                <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="$phone_number" required autofocus />
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('登録') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
