<div class="page-header">
    <div class="page-leftheader">
        @if (isset($title))
            <h4 class="page-title mb-0">{{$title}}</h4>
        @endif
        <ol class="breadcrumb">
            @if(isset($menu) && isset($menuLink))
                <li class="breadcrumb-item"><a href="{{$menuLink}}"><i class="fe fe-layout mr-2 fs-14"></i>{{$menu}}</a>
                </li>
            @endif
            @if(isset($menuItem) && isset($menuItemLink))
                <li class="breadcrumb-item active" aria-current="page"><a href="{{$menuItemLink}}">{{$menuItem}}</a>
                </li>
            @endif
            @if(isset($menuItem2) && isset($menuItemLink2))
                <li class="breadcrumb-item active" aria-current="page"><a href="{{$menuItemLink2}}">{{$menuItem2}}</a>
                </li>
            @endif
        </ol>

    </div>
    @if(isset($link))
        <div class="page-rightheader">
            <div class="btn btn-list">
                {!! $link !!}
            </div>
        </div>
    @endif
</div>
