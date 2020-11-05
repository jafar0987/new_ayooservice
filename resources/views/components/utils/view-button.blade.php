@props(['href' => '#', 'permission' => false])

<x-utils.link :href="$href" class="btn btn-info btn-sm" iconFa="fa fa-search" :text="__('View')" permission="{{ $permission }}" />
