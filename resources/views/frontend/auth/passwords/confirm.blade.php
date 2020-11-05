@extends('backend.layouts.app')

@section('title', __('Please confirm your password before continuing.'))

@section('page-header')
    <x-backend.page-header>
        <x-slot name="title">Password Confirmation</x-slot>
        <x-slot name="menu">Password confirmation</x-slot>
        <x-slot name="menuLink">#</x-slot>
    </x-backend.page-header>
@endsection

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Please confirm your password before continuing.')
                    </x-slot>

                    <x-slot name="body">
                        <x-forms.post :action="route('frontend.auth.password.confirm')">
                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">@lang('Password')</label>

                                <div class="col-md-6">
                                    <input type="password" name="password" class="form-control"
                                           placeholder="{{ __('Password') }}" maxlength="100" required
                                           autocomplete="current-password"/>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn btn-primary" type="submit">@lang('Confirm Password')</button>
                                </div>
                            </div>
                        </x-forms.post>
                    </x-slot>
                </x-frontend.card>
            </div>
        </div>
    </div>
@endsection
