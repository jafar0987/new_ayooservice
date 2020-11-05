@extends('backend.layouts.app')

@section('title', __('User Management'))

@section('page-header')
    <x-backend.page-header>
        <x-slot name="title">User Management</x-slot>
        <x-slot name="menu">Access</x-slot>
        <x-slot name="menuLink">#</x-slot>
        <x-slot name="menuItem">User Management</x-slot>
        <x-slot name="menuItemLink">#</x-slot>
        <x-slot name="link">
            <x-utils.link
                iconFa="fa fa-plus"
                class="btn btn-info"
                :href="route('admin.auth.user.create')"
                :text="__('Create User')"
            />
            @include('backend.auth.user.includes.breadcrumb-links')
        </x-slot>
    </x-backend.page-header>
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Active User')
        </x-slot>

        <x-slot name="body">
            <livewire:users-table/>
        </x-slot>
    </x-backend.card>
@endsection
