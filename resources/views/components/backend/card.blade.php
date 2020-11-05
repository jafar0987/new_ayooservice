@if (isset($headerActions))

            {{ $headerActions }}
    <div class="clearfix"></div>
    </br>

@endif
<div class="card">
    @if (isset($header))

        <div class="card-header">
            <h3 class="card-title">
                {{ $header }}
            </h3>

        </div><!--card-header-->
    @endif

    @if (isset($body))
        <div class="card-body">
            {{ $body }}
        </div><!--card-body-->
    @endif

    @if (isset($footer))
        <div class="card-footer">
            {{ $footer }}
        </div><!--card-footer-->
    @endif
</div><!--card-->
