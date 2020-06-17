<div class="container mx-auto">
    <div class="flex flex-wrap justify-center">
        <div class="w-full max-w-lg">
            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                    {{ __('Register') }}
                </div>

                <form class="w-full p-6" wire:submit.prevent="submit">
                    @csrf

                    <div class="flex flex-wrap mb-6">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('Name') }}:
                        </label>

                        <input wire:model="form.name" id="name" type="text" class="form-input w-full @error('form.name')  border-red-500 @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                        @error('form.name')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap mb-6">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('E-Mail Address') }}:
                        </label>

                        <input wire:model="form.email" id="email" type="email" class="form-input w-full @error('form.email') border-red-500 @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                        @error('form.email')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap mb-6">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('Password') }}:
                        </label>

                        <input wire:model="form.password" id="password" type="password" class="form-input w-full @error('form.password') border-red-500 @enderror" name="password" autocomplete="new-password">

                        @error('form.password')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap mb-6">
                        <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('Confirm Password') }}:
                        </label>

                        <input wire:model="form.password_confirmation" id="password-confirm" type="password" class="form-input w-full" name="password_confirmation" autocomplete="new-password">
                    </div>

                    <div class="flex flex-wrap">
                        <button type="submit" class="inline-block align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 w-full">
                            {{ __('Register') }}
                        </button>

                        <p class="w-full text-xs text-center text-gray-700 mt-8 -mb-4">
                            {{ __('Already have an account?') }}
                            <a class="text-blue-500 hover:text-blue-700 no-underline" href="#">
                                {{ __('Login') }}
                            </a>
                        </p>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
