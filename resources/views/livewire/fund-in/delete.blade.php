<button type="button" wire:click.prevent="show" class="btn btn-sm btn-danger btn-active-light-danger mt-1 mt-lg-0 d-inline-block">
        Delete
</button>
@push('js')
    <script>
        document.addEventListener('show-alert',function () {
;
        })
        $("#delete").click(function (e) {

        });
    </script>
@endpush
