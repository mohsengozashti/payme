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
                    <input type="text" wire:model.lazy="settlement.order_number"
                           class="form-control @error('settlement.order_number') is-invalid @enderror"
                           placeholder="Order Number"/>
                    @error('settlement.order_number')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Transaction Id:</label>
                    <input type="text" wire:model.lazy="settlement.transaction_id"
                           class="form-control @error('settlement.transaction_id') is-invalid @enderror"
                           placeholder="Transaction Id"/>
                    @error('settlement.transaction_id')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Settlement Id:</label>
                    <input type="text" wire:model.lazy="settlement.settlement_id"
                           class="form-control @error('settlement.settlement_id') is-invalid @enderror"
                           placeholder="Settlement Id"/>
                    @error('settlement.settlement_id')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Customer Bank Name:</label>
                    <input type="text" wire:model.lazy="settlement.customer_bank_name"
                           class="form-control @error('settlement.customer_bank_name') is-invalid @enderror"
                           placeholder="Customer Bank Name"/>
                    @error('settlement.customer_bank_name')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Customer Bank Code:</label>
                    <input type="text" wire:model.lazy="settlement.customer_bank_code"
                           class="form-control @error('settlement.customer_bank_code') is-invalid @enderror"
                           placeholder="Customer Bank Code"/>
                    @error('settlement.customer_bank_code')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Account Name:</label>
                    <input type="text" wire:model.lazy="settlement.account_name"
                           class="form-control @error('settlement.account_name') is-invalid @enderror"
                           placeholder="Account Name"/>
                    @error('settlement.account_name')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Account Number:</label>
                    <input type="text" wire:model.lazy="settlement.account_number"
                           class="form-control @error('settlement.account_number') is-invalid @enderror"
                           placeholder="Account Number"/>
                    @error('settlement.account_number')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Amount:</label>
                    <input type="text" wire:model.lazy="settlement.amount"
                           class="form-control @error('settlement.amount') is-invalid @enderror"
                           placeholder="Amount"/>
                    @error('settlement.amount')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Remark:</label>
                    <input type="text" wire:model.lazy="settlement.remark"
                           class="form-control @error('settlement.remark') is-invalid @enderror"
                           placeholder="Remark"/>
                    @error('settlement.remark')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="merchant">Merchant <span class="text-danger">*</span></label>
                    <div wire:ignore>
                    <select class="form-control" id="merchant" wire:model.lazy="settlement.merchant_id">
                        <option value="" selected>Select Merchant</option>
                        @foreach(\App\Models\User::role('merchant')->get() as $merchant)
                            <option value="{{$merchant->id}}">{{$merchant->full_name}}</option>
                        @endforeach
                    </select>
                    </div>
                    @error('settlement.merchant_id')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="update_by">Update By</label>
                    <div wire:ignore>
                    <select class="form-control" id="update_by" wire:model.lazy="settlement.update_by">
                        <option value="bot" selected>Bot</option>
                        <option value="1001">1001</option>
                    </select>
                    </div>
                    @error('settlement.update_by')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <div wire:ignore>
                    <select class="form-control" id="status" wire:model.lazy="settlement.status">
                        <option value="2" selected>Pending</option>
                        <option value="1">Accept</option>
                        <option value="0">Reject</option>
                    </select>
                    </div>
                    @error('settlement.status')
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
        @this.set('settlement.merchant_id', data);
        });
        $('#update_by').select2({width: '100%'});
        $('#update_by').on('change', function (e) {
            var data = $('#update_by').select2("val");
        @this.set('settlement.update_by', data);
        });
        $('#status').select2({width: '100%'});
        $('#status').on('change', function (e) {
            var data = $('#status').select2("val");
        @this.set('settlement.status', data);
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
            let table = window.LaravelDataTables['settlement-table'];
            table.ajax.reload();
        })
    </script>
@endpush
