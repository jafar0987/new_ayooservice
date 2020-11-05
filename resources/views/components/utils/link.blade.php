@props(['active' => '', 'class' => '','text' => '', 'hide' => false, 'icon' => false, 'iconFa' => '', 'iAfterMenu' => '', 'toggle' => '','permission' => false])

@if ($permission)
    @if ($logged_in_user->can($permission))
        @if (!$hide)
            <a class="{{$class}}"
               @if($toggle) data-toggle="{{$toggle}}" @endif {{ $attributes->merge(['href' => '#', 'class' => $active]) }}">
        @if ($icon){!! $icon !!}@endif
        @if (isset($iconFa))<i class="{{ $iconFa }}"></i>@endif
        <span class="side-menu__label">{!! strlen($text) ? $text : $slot !!}</span>
        @if($iAfterMenu)
            <i class="{{ $iAfterMenu }}"></i>@endif
            </a>
        @endif
    @endif
@else
    @if (!$hide)
        <a class="{{$class}}" @if($toggle) data-toggle="{{$toggle}}" @endif {{ $attributes->merge(['href' => '#', 'class' => $active]) }}">
    @if (isset($icon)){!! $icon !!}@endif
    @if (isset($iconFa))<i class="{{ $iconFa }}"></i>@endif
    <span class="side-menu__label">{!! strlen($text) ? $text : $slot !!}</span>
    @if(isset($iAfterMenu))
        <i class="{{ $iAfterMenu }}"></i>@endif
        </a>
    @endif
@endif


