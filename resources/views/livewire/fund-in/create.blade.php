<div wire:ignore.self class="modal fade" id="create" data-backdrop="static" tabindex="-1" role="dialog"
     aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Manual Fund In Creation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Order Number:</label>
                    <input type="text" wire:model.lazy="fundin.order_number"
                           class="form-control @error('fundin.order_number') is-invalid @enderror"
                           placeholder="Order Number"/>
                    @error('fundin.order_number')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Transaction Id:</label>
                    <input type="text" wire:model.lazy="fundin.transaction_id"
                           class="form-control @error('fundin.transaction_id') is-invalid @enderror"
                           placeholder="Transaction Id"/>
                    @error('fundin.transaction_id')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Customer Bank Name:</label>
                    <input type="text" wire:model.lazy="fundin.customer_bank_name"
                           class="form-control @error('fundin.customer_bank_name') is-invalid @enderror"
                           placeholder="Customer Bank Name"/>
                    @error('fundin.customer_bank_name')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Customer Bank Code:</label>
                    <input type="text" wire:model.lazy="fundin.customer_bank_code"
                           class="form-control @error('fundin.customer_bank_code') is-invalid @enderror"
                           placeholder="Customer Bank Code"/>
                    @error('fundin.customer_bank_code')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Requested Amount:</label>
                    <input type="text" wire:model.lazy="fundin.requested_amount"
                           class="form-control @error('fundin.requested_amount') is-invalid @enderror"
                           placeholder="Requested Amount"/>
                    @error('fundin.requested_amount')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Fund In Commission:</label>
                    <input type="text" wire:model.lazy="fundin.fund_in_commission"
                           class="form-control @error('fundin.fund_in_commission') is-invalid @enderror"
                           placeholder="Fund In Commission"/>
                    @error('fundin.fund_in_commission')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="merchant">Merchant <span class="text-danger">*</span></label>
                    <div wire:ignore>
                    <select class="form-control" id="merchant" wire:model.lazy="fundin.merchant_id">
                        <option value="" selected>Select Merchant</option>
                        @foreach(\App\Models\User::role('merchant')->get() as $merchant)
                            <option value="{{$merchant->id}}">{{$merchant->full_name}}</option>
                        @endforeach
                    </select>
                    </div>
                    @error('fundin.merchant_id')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="update_by">Update By</label>
                    <div wire:ignore>
                    <select class="form-control" id="update_by" wire:model.lazy="fundin.update_by">
                        <option value="manual" selected>Manual</option>
                        <option value="auto">Auto</option>
                    </select>
                    </div>
                    @error('fundin.update_by')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <div wire:ignore>
                    <select class="form-control" id="status" wire:model.lazy="fundin.status">
                        <option value="2" selected>Pending</option>
                        <option value="1">Accept</option>
                        <option value="0">Reject</option>
                    </select>
                    </div>
                    @error('fundin.status')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="resetForm" class="btn btn-light-primary font-weight-bold">Close</button>
                <button type="button" wire:click="create" class="btn btn-primary font-weight-bold">Create</button>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        $('#merchant').select2({width: '100%'});
        $('#merchant').on('change', function (e) {
            var data = $('#merchant').select2("val");
        @this.set('fundin.merchant_id', data);
        });
        $('#update_by').select2({width: '100%'});
        $('#update_by').on('change', function (e) {
            var data = $('#update_by').select2("val");
        @this.set('fundin.update_by', data);
        });
        $('#status').select2({width: '100%'});
        $('#status').on('change', function (e) {
            var data = $('#status').select2("val");
        @this.set('fundin.status', data);
        });
    </script>
    <script>
        document.addEventListener('reset',function () {
            $('#merchant').val('');
            $('#merchant').trigger('change');
            $('#status').val('2');
            $('#status').trigger('change');
            $('#update_by').val('manual');
            $('#update_by').trigger('change');
            $('#create').modal('toggle');
        })
        document.addEventListener('refresh',function () {
            let table = window.LaravelDataTables['fund-in-table'];
            table.ajax.reload();
        })
    </script>
@endpush
