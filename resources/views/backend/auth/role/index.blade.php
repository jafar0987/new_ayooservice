@extends('backend.layouts.app')

@section('title', __('Role Management'))
@section('page-header')
    <!--Page header-->
    <x-backend.page-header>
        <x-slot name="title">Role Management</x-slot>
        <x-slot name="menu">Access</x-slot>
        <x-slot name="menuLink">#</x-slot>
        <x-slot name="menuItem">Role Management</x-slot>
        <x-slot name="menuItemLink">{{ url('/admin/auth/role') }}</x-slot>
        <x-slot name="link">
            <x-utils.link
                iconFa="fa fa-plus"
                class="btn btn-info"
                :href="route('admin.auth.role.create')"
                :text="__('Create Role')"
            />
        </x-slot>
    </x-backend.page-header>
    <!--End Page header-->
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Role Management')
        </x-slot>

        <x-slot name="body">
            <livewire:roles-table />
        </x-slot>
    </x-backend.card>
@endsection
