<!--begin::Action--->
<td class="text-end">
    <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-light btn-active-light-light">
        Show
    </a>
</td>
<td class="text-end">
    <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-sm btn-danger btn-active-light-danger mt-1">
        Delete
    </a>
</td>
<td class="text-end">
    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-info btn-active-light-info mt-1">
        Edit
    </a>
</td>
<!--end::Action--->
