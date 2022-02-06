<x-guest-layout>
    <div class="flex flex-col items-center justify-center h-screen space-y-10 bg-gray-100">
        <div class="p-6 bg-white rounded md:shadow-lg shadow:none w-96">
            <h1 class="text-3xl font-bold leading-normal">Sign in</h1>
            <p class="text-sm">Sign in to access your feed</p>
    
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    
            <form class="mt-5 space-y-2" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="relative mb-3">
                    <label for="email" class="pl-3 mb-1 text-base text-gray-500 label cursor-text">Email</label>
                    <input id="email" class="w-full rounded px-3 border border-gray-500 pt-2 pb-2 focus:outline-none input active:outline-none @error('email') ring border-transparent ring-red-500 @enderror" type="text" value="{{ old('email') }}" name="email" required autocomplete="email" autofocus>
                </div>
                
                <div class="relative mb-3">
                    <label for="password" class="pl-3 mb-1 text-base text-gray-500 label cursor-text">Password</label>
                    <input id="password" class="w-full rounded px-3 border border-gray-500 pt-2 pb-2 focus:outline-none input active:outline-none @error('email') ring border-transparent ring-red-500 @enderror" name="password" type="password" required/>
                    @error('email')
                        <p class="px-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="transition-all duration-200 rounded">
    
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
    
                @if (Route::has('password.request'))
                <div class="-m-2">
                    <a class="px-2 py-1 font-bold text-blue-700 rounded-md hover:bg-blue-200" href="{{ route('password.request') }}"">Forgot password?</a>
                </div>
                @endif
    
                <button type="submit" class="w-full py-3 font-bold text-center text-white transition-all duration-150 bg-blue-700 hover:bg-blue-900 hover:scale-105 rounded-xl">Sign in</button>
            </form>
        </div>
    </div>
</x-guest-layout>