<x-guest-layout>
    <x-authentication-card>
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="text_center">
                <x-authentication-card-logo />
            </div>
            <div class="auth-box">
                <div class="row m-b-20">
                    <div class="col-md-12">
                        <h3 class="text-left txt-primary">{{ __('Sing up')}}</h3>
                    </div>
                </div>
                <hr/>

                <div class="input-group">
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="{{ __('Name')}}"/>
                </div>

                <div class="mt-4 input-group">
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="{{ __('Email')}}"/>
                </div>

                <div class="mt-4 input-group">
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="{{ __('Password')}}" />
                </div>

                <div class="mt-4 input-group">
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm password')}}" />
                </div>
                <div class="row m-t-25 text-left">
                    <div class="col-sm-7 col-xs-12">
                        <div class="checkbox-fade fade-in-primary">
                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <label>
                                <x-checkbox name="terms" id="terms" required />
                                <span class="text-inverse">
                                    <a target="_blank" href="{{route('terms.show')}}" class="text-inverse">{{__('Terms of Service & Privacy Policy')}}</a>
                                </span>
                            </label>
                            @endif

                        </div>
                    </div>


                    <div class="col-sm-5 col-xs-12 forgot-phone text-right">
                            <a class="text-right f-w-300 text-inverse" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                    </div>
                </div>
                <div class="row m-t-30">
                    <div class="col-md-12">
                        <x-button class="btn-md btn-block waves-effect text-center m-b-20">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </div>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
