<!--begin::Action--->
@can('view-user')
<td class="text-end">
    <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-light btn-active-light-light">
        Show
    </a>
</td>
@endcan
@can('delete-user')
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
@can('update-user')
<td class="text-end">
    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-info btn-active-light-info mt-1">
        Edit
    </a>
</td>
@endcan
<!--end::Action--->
