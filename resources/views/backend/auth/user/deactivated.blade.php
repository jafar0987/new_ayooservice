@extends('backend.layouts.app')

@section('title', __('Deactivated Users'))


@section('page-header')
    <!--Page header-->
    <x-backend.page-header>
        <x-slot name="title">User Management</x-slot>
        <x-slot name="menu">Access</x-slot>
        <x-slot name="menuLink">#</x-slot>
        <x-slot name="menuItem">User Management</x-slot>
        <x-slot name="menuItemLink">{{ url('/admin/auth/user') }}</x-slot>
        <x-slot name="menuItem2">Deactivated</x-slot>
        <x-slot name="menuItemLink2">#</x-slot>
        <x-slot name="link">
            @include('backend.auth.user.includes.breadcrumb-links')
        </x-slot>
    </x-backend.page-header>

    <!--End Page header-->
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Deactivated Users')
        </x-slot>

        <x-slot name="body">
            <livewire:users-table status="deactivated" />
        </x-slot>
    </x-backend.card>
@endsection
