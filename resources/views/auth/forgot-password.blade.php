<x-guest-layout>
    <x-authentication-card>
        @if (session('status'))
            <div class="mb-4 text-success">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            <div class="text_center">
                <x-authentication-card-logo />
            </div>
           <div class="auth-box">
            @csrf
            <div class="mb-4 text-secondary">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>
            <hr>
            <div class="input-group">
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="{{__('Email')}}" />
            </div>

            <div class="row mt-1">
                <div class="col-md-12">
                    <x-button>
                        {{ __('Email Password Reset Link') }}
                    </x-button>
                </div>
            </div>
           </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
