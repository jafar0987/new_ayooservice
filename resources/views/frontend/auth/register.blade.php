@extends('frontend.layouts.app')

@section('title', __('Register'))

@section('content')

    <div class="page">
        <div class="page-single">
            <div class="p-5">
                <div class="row">
                    <div class="col mx-auto">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 col-xl-8">
                                <div class="card-group mb-0">
                                    <div class="card p-4">
                                        <x-forms.post :action="route('frontend.auth.register')">
                                            <div class="card-body">
                                                <div class="text-center title-style mb-6">
                                                    <h1 class="mb-2">Register</h1>
                                                    <hr>
                                                    <p class="text-muted">Create New Account</p>
                                                    @if($errors->any())
                                                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                                                    @endif
                                                </div>
                                                {{--                                            <div class="btn-list d-flex">--}}
                                                {{--                                                <a href="https://www.google.com/gmail/" class="btn btn-google btn-block"><i class="fa fa-google fa-1x mr-2"></i> Google</a>--}}
                                                {{--                                                <a href="https://twitter.com/" class="btn btn-twitter"><i class="fa fa-twitter fa-1x"></i></a>--}}
                                                {{--                                                <a href="https://www.facebook.com/" class="btn btn-facebook"><i class="fa fa-facebook fa-1x"></i></a>--}}
                                                {{--                                            </div>--}}
                                                {{--                                            <hr class="divider my-6">--}}
                                                <div class="input-group mb-4">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fe fe-user"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" name="name" id="name" class="form-control"
                                                           value="{{ old('name') }}" placeholder="{{ __('Name') }}"
                                                           maxlength="100" required autofocus autocomplete="name"/>
                                                </div>
                                                <div class="input-group mb-4">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fe fe-mail"></i>
                                                        </div>
                                                    </div>
                                                    <input type="email" name="email" id="email" class="form-control"
                                                           placeholder="{{ __('E-mail Address') }}"
                                                           value="{{ old('email') }}" maxlength="255" required
                                                           autocomplete="email"/>
                                                </div>
                                                <div class="input-group mb-4">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fe fe-lock"></i>
                                                        </div>
                                                    </div>
                                                    <input type="password" name="password" id="password"
                                                           class="form-control" placeholder="{{ __('Password') }}"
                                                           maxlength="100" required autocomplete="new-password"/>
                                                </div>
                                                <div class="input-group mb-4">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fe fe-lock"></i>
                                                        </div>
                                                    </div>
                                                    <input type="password" name="password_confirmation"
                                                           id="password_confirmation" class="form-control"
                                                           placeholder="{{ __('Password Confirmation') }}"
                                                           maxlength="100" required autocomplete="new-password"/>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <button type="submit" class="btn  btn-primary btn-block px-4">
                                                            Create New Account
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="text-center pt-4">
                                                    <div class="font-weight-normal fs-16">You Already have an account <a
                                                            class="btn-link font-weight-normal"
                                                            href="{{ route('frontend.auth.login') }}">Login Here</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </x-forms.post>
                                    </div>

                                    <div class="card text-white bg-primary py-5 d-md-down-none page-content mt-0">
                                        <div class="text-center justify-content-center page-single-content">
                                            <div class="box">
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                            </div>
                                            <img src="{{URL::asset('assets/images/png/login.png')}}" alt="img">
                                        </div>
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
