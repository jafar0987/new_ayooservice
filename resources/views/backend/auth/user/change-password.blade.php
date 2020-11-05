@extends('backend.layouts.app')

@section('title', __('Change Password for :name', ['name' => $user->name]))

@section('page-header')
    <x-backend.page-header>
        <x-slot name="title">Create User</x-slot>
        <x-slot name="menu">Access</x-slot>
        <x-slot name="menuLink">#</x-slot>
        <x-slot name="menuItem">User Management</x-slot>
        <x-slot name="menuItemLink">{{ url('/admin/auth/user') }}</x-slot>
        <x-slot name="menuItem2">Change Password : {{$user->id}}</x-slot>
        <x-slot name="menuItemLink2">#</x-slot>
        <x-slot name="link">
            <x-utils.link class="btn btn-secondary" :href="route('admin.auth.user.index')" :text="__('Cancel')" />
        </x-slot>
    </x-backend.page-header>
@endsection


@section('content')
    <x-forms.patch :action="route('admin.auth.user.change-password.update', $user)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Change Password for :name', ['name' => $user->name])
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="password" class="col-md-2 col-form-label">@lang('Password')</label>

                    <div class="col-md-10">
                        <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}" maxlength="100" required autocomplete="new-password" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="password_confirmation" class="col-md-2 col-form-label">@lang('Password Confirmation')</label>

                    <div class="col-md-10">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Password Confirmation') }}" maxlength="100" required autocomplete="new-password" />
                    </div>
                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-primary float-right" type="submit">@lang('Update')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
