<x-utils.link
    class="btn btn-warning"
    :href="route('admin.auth.user.deactivated')"
    :text="__('Deactivated Users')"
    permission="admin.access.user.reactivate"/>

@if ($logged_in_user->hasAllAccess())
    <x-utils.link class="btn btn-danger" :href="route('admin.auth.user.deleted')" :text="__('Deleted Users')"/>
@endif
