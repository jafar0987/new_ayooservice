<!doctype html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>
<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    @include('backend.layouts.head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ appName() }} | @yield('title')</title>
    <meta name="description" content="@yield('meta_description', appName())">
    @yield('meta')
    <livewire:styles/>
</head>
<body class="app sidebar-mini">

<div id="global-loader">
    <img src="{{URL::asset('assets/images/svgs/loader.svg')}}" alt="loader">
</div>

<div class="page">
    <div class="page-main">
        @include('backend.layouts.aside-menu')
        <div class="app-content main-content">
            <div class="side-app">
                @include('backend.layouts..header')
                @yield('page-header')
                @yield('content')
                @include('backend.layouts..footer')
            </div>

        </div>
    </div>
</div>
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/backend.js') }}"></script>
<livewire:scripts/>
@include('backend.layouts.footer-scripts')
</body>
</html>
