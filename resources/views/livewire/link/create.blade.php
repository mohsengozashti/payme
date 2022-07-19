<div wire:ignore.self class="modal fade" id="createLink" data-backdrop="static" tabindex="-1" role="dialog"
     aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generate FundIn Temporary Payment Link</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                @if($is_link_created)
                    <div class="form-group">
                        <label class="text-success">Generated Link:</label>
                        <input type="text"
                               class="form-control"
                               readonly
                               value="{{route('link.show',$link)}}"
                        />
                    </div>
                    @if($link->with_qr_code)
                    {!! QrCode::size(100)->generate(route('link.show',$link)); !!}
                    @endif
                    @endif
                <div class="form-group {{$is_link_created ? 'mt-2' : ''}}">
                    <label for="merchant_id">Merchant <span class="text-danger">*</span></label>
                    <div wire:ignore>
                        <select class="form-control" id="merchant_id" wire:model.lazy="link.merchant_id">
                            <option value="" selected>Select Merchant</option>
                            @foreach(\App\Models\User::role('merchant')->get() as $merchant)
                                <option value="{{$merchant->id}}">{{$merchant->full_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('link.merchant_id')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Amount:</label>
                    <input type="text" wire:model.lazy="link.amount"
                           class="form-control @error('link.amount') is-invalid @enderror"
                           placeholder="Amount"/>
                    @error('link.amount')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Customer Name:</label>
                    <input type="text" wire:model.lazy="link.customer_name"
                           class="form-control @error('link.customer_name') is-invalid @enderror"
                           placeholder="Customer Name"/>
                    @error('link.customer_name')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Bank Name:</label>
                    <input type="text" wire:model.lazy="link.bank_name"
                           class="form-control @error('link.bank_name') is-invalid @enderror"
                           placeholder="Bank Name"/>
                    @error('link.bank_name')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                <label class="checkbox checkbox-rounded w-100">
                    <input type="checkbox" wire:model="link.with_qr_code"/>
                    <span class="mr-2"></span>
                    With Qr Code?
                </label>
                </div>

{{--                <div class="form-group">--}}
{{--                    <label for="wallet_address">Wallet Address <span class="text-danger">*</span></label>--}}
{{--                    <div wire:ignore>--}}
{{--                        <select class="form-control" id="wallet_address" wire:model.lazy="link.wallet_address">--}}
{{--                            <option value="" selected>Select Wallet Address</option>--}}
{{--                            @foreach(\App\Models\User::role('merchant')->get() as $merchant)--}}
{{--                                <option value="{{$merchant->id}}">{{$merchant->full_name}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    @error('link.wallet_address')--}}
{{--                    <span class="form-text text-danger">{{$message}}</span>--}}
{{--                    @enderror--}}
{{--                </div>--}}


                <div class="form-group">
                    <label>Link Expiration (In Minutes):</label>
                    <input type="text" wire:model.lazy="link.expiration_duration"
                           class="form-control @error('link.expiration_duration') is-invalid @enderror"
                           placeholder="Link Expiration"/>
                    @error('link.expiration_duration')
                    <span class="form-text text-danger">{{$message}}</span>
                    @enderror
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" wire:click="resetForm" class="btn btn-light-primary font-weight-bold">Close</button>
                @if(!$is_link_created)
                <button type="button" wire:click="create" class="btn btn-primary font-weight-bold">Create</button>
                    @endif
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        $('#merchant_id').select2({width: '100%'});
        $('#merchant_id').on('change', function (e) {
            var data = $('#merchant_id').select2("val");
        @this.set('link.merchant_id', data);
        });
    </script>
    <script>
        document.addEventListener('resetLinkModal',function () {
            $('#merchant_id').val('');
            $('#merchant_id').trigger('change');
            $('#createLink').modal('toggle');
            $('#merchant_id').select2({width: '100%'});
            $('#merchant_id').on('change', function (e) {
                var data = $('#merchant_id').select2("val");
            @this.set('link.merchant_id', data);
            });
        })
        document.addEventListener('refresh',function () {
            let table = window.LaravelDataTables['fund-in-table'];
            table.ajax.reload();
        })
    </script>
@endpush
