@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('page-header')
    <!--Page header-->
    <x-backend.page-header>
        <x-slot name="title">Hi Welcome Back</x-slot>
        <x-slot name="menu">Dashboard</x-slot>
    </x-backend.page-header>
    <!--End Page header-->
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome :Name', ['name' => $logged_in_user->name])
        </x-slot>

        <x-slot name="body">
            @lang('Welcome to the Dashboard')
        </x-slot>
    </x-backend.card>
@endsection
