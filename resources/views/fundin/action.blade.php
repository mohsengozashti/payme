<!--begin::Action--->
<td class="text-end">
    <form class="d-inline-block" id="delete-{{$fundIn->id}}" action="{{ route('fund-ins.destroy', $fundIn->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="event.preventDefault();deleteItem({{$fundIn->id}})" class="btn btn-sm btn-danger btn-active-light-danger mt-1 mt-lg-0">
            Delete
        </button>
    </form>
</td>
<td class="text-end">
    <a href="{{ route('fund-ins.edit', $fundIn->id) }}" class="btn btn-sm btn-info btn-active-light-info mt-1 mt-lg-0">
        Edit
    </a>
</td>
<!--end::Action--->
