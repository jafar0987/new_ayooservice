<label class="custom-control custom-checkbox">
    @foreach($children as $permission)
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
</label>
