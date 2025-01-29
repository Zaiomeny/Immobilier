<x-guest-layout>
    <x-authentication-card>
        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="text-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="md-float-material">
            @csrf
            <div class="text_center">
                <x-authentication-card-logo />
            </div>
            <div class="auth-box">
                <div class="row m-b-20">
                    <div class="col-md-12">
                        <h3 class="text-left txt-primary">{{ __('Sign In')}}</h3>
                    </div>
                </div>
                <hr/>
                <div class="input-group">
                    <x-input id="email" class="" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="{{ __('Email') }}" />
                </div>
                <x-input-error for="email"></x-input-error>
                <div class="input-group">
                    <x-input id="password" class="" type="password" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}" />
                </div>
                <x-input-error for="password"></x-input-error>
                <div class="row m-t-25 text-left">
                    <div class="col-sm-7 col-xs-12">
                        <div class="checkbox-fade fade-in-primary">
                            <label for="remember_me">
                                <x-checkbox id="remember_me" name="remember" />
                                <span class="text-inverse">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-5 col-xs-12 forgot-phone text-right">
                        @if (Route::has('password.request'))
                            <a class="text-right f-w-600 text-inverse" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                </div>
                <div class="row m-t-30">
                    <div class="col-md-12">
                        <x-button class="btn-md btn-block waves-effect text-center m-b-20">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </div>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
