@extends('frontend.layouts.app')

@section('title', __('Login'))

@section('content')
    <div class="page">
        <div class="page-single">
            <div class="container">
                <div class="row">
                    <div class="col mx-auto">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-body">
                                        <x-forms.post :action="route('frontend.auth.login')">
                                        <div class="text-center title-style mb-6">
                                            <h1 class="mb-2">Login</h1>
                                            <hr>
                                            <p class="text-muted">Sign In to your account</p>
                                        </div>
{{--                                        <div class="btn-list d-flex">--}}
{{--                                            <a href="https://www.google.com/gmail/" class="btn btn-google btn-block"><i class="fa fa-google fa-1x mr-2"></i> Google</a>--}}
{{--                                            <a href="https://twitter.com/" class="btn btn-twitter"><i class="fa fa-twitter fa-1x"></i></a>--}}
{{--                                            <a href="https://www.facebook.com/" class="btn btn-facebook"><i class="fa fa-facebook fa-1x"></i></a>--}}
{{--                                        </div>--}}
{{--                                        <hr class="divider my-6">--}}
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fe fe-user"></i>
                                                </div>
                                            </div>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" maxlength="255" required autofocus autocomplete="email" />
                                        </div>
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fe fe-lock"></i>
                                                </div>
                                            </div>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}" maxlength="100" required autocomplete="current-password" />
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn  btn-primary btn-block px-4">Login</button>
                                            </div>
                                            <div class="col-12 text-center">
                                                <x-utils.link-fe :href="route('frontend.auth.password.request')" class="btn btn-link box-shadow-0 px-0" :text="__('Forgot Your Password?')"></x-utils.link-fe>
                                            </div>
                                        </div>
                                        <div class="text-center pt-4">
                                            <div class="font-weight-normal fs-16">You Don't have an account <a class="btn-link font-weight-normal" href="{{route('frontend.auth.register')}}">Register Here</a></div>
                                        </div>
                                        </x-forms.post>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
