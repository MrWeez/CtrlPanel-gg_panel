@extends('layouts.app')

@section('content')

    <body class="hold-transition dark-mode login-page">
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="text-center card-header">
                    <a href="{{ route('welcome') }}" class="h1"><b
                            class="mr-1">{{ config('app.name', 'Laravel') }}</b></a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">
                        {{ __('You are only one step a way from your new password, recover your password now.') }}</p>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-3 input-group">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="{{ __('Email') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @error('email')
                                <span class="text-danger" role="alert">
                                    <small><strong>{{ $message }}</strong></small>
                                </span>
                            @enderror
                        </div>


                        <div class="mb-3 input-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                placeholder="{{ __('Password') }}" name="password" required autocomplete="new-password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password')
                                <span class="text-danger" role="alert">
                                    <small><strong>{{ $message }}</strong></small>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3 input-group">
                            <input type="password" class="form-control" name="password_confirmation"
                                placeholder="{{ __('Retype password') }}" required autocomplete="new-password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <button type="submit"
                                    class="btn btn-primary btn-block">{{ __('Change password') }}</button>
                            </div>
                            <!-- /.col -->
                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>

                    <p class="mt-3 mb-1">
                        <a href="{{ route('login') }}">Login</a>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->

        {{-- imprint and privacy policy --}}
        <div class="fixed-bottom ">
            <div class="container text-center">
                @php($website_settings = app(App\Settings\WebsiteSettings::class))
                @if ($website_settings->show_imprint)
                    <a target="_blank" href="{{ route('terms', 'imprint') }}"><strong>{{ __('Imprint') }}</strong></a> |
                @endif
                @if ($website_settings->show_privacy)
                    <a target="_blank" href="{{ route('terms', 'privacy') }}"><strong>{{ __('Privacy') }}</strong></a>
                @endif
                @if ($website_settings->show_tos)
                    | <a target="_blank"
                        href="{{ route('terms', 'tos') }}"><strong>{{ __('Terms of Service') }}</strong></a>
                @endif
            </div>
        </div>
    </body>
@endsection
