<!--begin::Action--->
{{--<td class="text-end">--}}
{{--    <form class="d-inline-block" action="#" method="POST">--}}
{{--        @csrf--}}
{{--        @method('DELETE')--}}
{{--        <button type="submit" class="btn btn-sm btn-danger btn-active-light-danger mt-1">--}}
{{--            Delete--}}
{{--        </button>--}}
{{--    </form>--}}
{{--</td>--}}
<td class="text-end">
    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-info btn-active-light-info mt-1">
        Edit
    </a>
</td>
<!--end::Action--->
