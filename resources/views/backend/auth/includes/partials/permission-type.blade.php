@if ($general->where('type', $type)->count())
    <h5 class="mb-3">@lang('General Permissions')</h5>

    <div class="row">
        <div class="col">
            @foreach($general->where('type', $type) as $permission)
                <span class="d-block">
                        <input type="checkbox" name="permissions[]"
                               {{ in_array($permission->id, $usedPermissions ?? [], true) ? 'checked' : '' }} value="{{ $permission->id }}"
                               id="{{ $permission->id }}"/>
                        <label for="{{ $permission->id }}">{{ $permission->description ?? $permission->name }}</label>
                    </span>
            @endforeach
        </div><!--col-->
    </div><!--row-->
@endif

@if ($general->where('type', $type)->count() && $categories->where('type', $type)->count())
    <hr/>
@endif

@if ($categories->where('type', $type)->count())
    <div class="form-label">@lang('Permission Categories')</div>
    <div class="custom-controls-stacked">
        @foreach($categories->where('type', $type) as $permission)
            <label class="custom-control custom-checkbox" id="{{ $permission->id }}">
                <input type="checkbox" class="custom-control-input" name="permissions[]"
                       value="{{ $permission->id }}"
                       id="{{ $permission->id }}" {{ in_array($permission->id, $usedPermissions ?? [], true) ? 'checked' : '' }} >
                <span class="custom-control-label">{{ $permission->description ?? $permission->name }}</span>
            </label>

            @if($permission->children->count())
                @include('backend.auth.role.includes.children', ['children' => $permission->children])
            @endif
        @endforeach
    </div>


@endif

@if (!$general->where('type', $type)->count() && !$categories->where('type', $type)->count())
    <p class="mb-0"><em>@lang('There are no additional permissions to choose from for this type.')</em></p>
@endif
