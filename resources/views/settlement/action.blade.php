<!--begin::Action--->
@can('delete-settlement')
<td class="text-end">
    <form class="d-inline-block" id="delete-{{$settlement->id}}" action="{{ route('settlements.destroy', $settlement->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="event.preventDefault();deleteItem({{$settlement->id}})" class="btn btn-sm btn-danger btn-active-light-danger mt-1 mt-lg-0">
            Delete
        </button>
    </form>
</td>
@endcan
@can('update-settlement')
<td class="text-end">
    <a href="{{ route('settlements.edit', $settlement->id) }}" class="btn btn-sm btn-info btn-active-light-info mt-1 mt-lg-0">
        Edit
    </a>
</td>
@endcan
<!--end::Action--->
