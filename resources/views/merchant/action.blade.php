<!--begin::Action--->
<td class="text-end">
    <a href="{{ route('merchants.show', $user->id) }}" class="btn btn-sm btn-light btn-active-light-primary">
        Show
    </a>
</td>
<td class="text-end">
    <a href="{{ route('merchants.destroy', $user->id) }}" class="btn btn-sm btn-light btn-active-light-danger">
        Delete
    </a>
</td>
<td class="text-end">
    <a href="{{ route('merchants.edit', $user->id) }}" class="btn btn-sm btn-light btn-active-light-info">
        Edit
    </a>
</td>
<!--end::Action--->
