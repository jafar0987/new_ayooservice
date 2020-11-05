@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Update Role'))

@section('page-header')
    <!--Page header-->
    <x-backend.page-header>
        <x-slot name="title">Edit Role Management</x-slot>
        <x-slot name="menu">Access</x-slot>
        <x-slot name="menuLink">#</x-slot>
        <x-slot name="menuItem">Role Management</x-slot>
        <x-slot name="menuItemLink">{{ url('/admin/auth/role') }}</x-slot>
        <x-slot name="menuItem2">Edit Role : {{$role->id}}</x-slot>
        <x-slot name="menuItemLink2">#</x-slot>
        <x-slot name="link">
            <x-utils.link class="btn btn-secondary" :href="route('admin.auth.role.index')" :text="__('Cancel')"/>
        </x-slot>
    </x-backend.page-header>
    <!--End Page header-->
@endsection
@section('content')
    <x-forms.patch :action="route('admin.auth.role.update', $role)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Role')
            </x-slot>

            <x-slot name="body">
                <div x-data="{userType : '{{ $role->type }}'}">
                    <div class="form-group row">
                        <label for="type" class="col-md-2 form-label">@lang('Type')</label>

                        <div class="col-md-10">
                            <select name="type" class="form-control select2" required
                                    x-on:change="userType = $event.target.value">
                                <option
                                    value="{{ $model::TYPE_USER }}" {{ $role->type === $model::TYPE_USER ? 'selected' : '' }}>@lang('User')</option>
                                <option
                                    value="{{ $model::TYPE_ADMIN }}" {{ $role->type === $model::TYPE_ADMIN ? 'selected' : '' }}>@lang('Administrator')</option>
                            </select>
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="name" class="col-md-2 form-label">@lang('Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}"
                                   value="{{ old('name') ?? $role->name }}" maxlength="100" required/>
                        </div>
                    </div><!--form-group-->

                    @include('backend.auth.includes.permissions')
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-primary float-right" type="submit">@lang('Update Role')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
