<!--begin::Action--->
@can('view-merchant')
<td class="text-end">
    <a href="{{ route('merchants.show', $user->id) }}" class="btn btn-sm btn-light btn-active-light-light">
        Show
    </a>
</td>
@endcan
@can('delete-merchant')
<td class="text-end">
    <form class="d-inline-block" action="{{ route('users.destroy', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger btn-active-light-danger mt-1">
            Delete
        </button>
    </form>
</td>
@endcan
@can('update-merchant')
<td class="text-end">
    <a href="{{ route('merchants.edit', $user->id) }}" class="btn btn-sm btn-info btn-active-light-info mt-1">
        Edit
    </a>
</td>
@endcan
<!--end::Action--->
