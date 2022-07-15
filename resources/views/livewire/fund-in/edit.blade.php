<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <!--begin::Card-->
            <div class="card card-custom example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Edit Fund In</h3>
                </div>
                <!--begin::Form-->
                <form class="form" wire:submit.prevent="edit">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Order Number:</label>
                            <input type="text" wire:model.lazy="fundin.order_number"
                                   class="form-control @error('fundin.order_number') is-invalid @enderror"
                                   placeholder="Order Number"/>
                            @error('fundin.order_number')
                            <span class="form-text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="separator separator-dashed my-5"></div>
                        <div class="form-group">
                            <label>Transaction Id:</label>
                            <input type="text" wire:model.lazy="fundin.transaction_id"
                                   class="form-control @error('fundin.transaction_id') is-invalid @enderror"
                                   placeholder="Transaction Id"/>
                            @error('fundin.transaction_id')
                            <span class="form-text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="separator separator-dashed my-5"></div>
                        <div class="form-group">
                            <label>Customer Bank Name:</label>
                            <input type="text" wire:model.lazy="fundin.customer_bank_name"
                                   class="form-control @error('fundin.customer_bank_name') is-invalid @enderror"
                                   placeholder="Customer Bank Name"/>
                            @error('fundin.customer_bank_name')
                            <span class="form-text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="separator separator-dashed my-5"></div>
                        <div class="form-group">
                            <label>Customer Bank Code:</label>
                            <input type="text" wire:model.lazy="fundin.customer_bank_code"
                                   class="form-control @error('fundin.customer_bank_code') is-invalid @enderror"
                                   placeholder="Customer Bank Code"/>
                            @error('fundin.customer_bank_code')
                            <span class="form-text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="separator separator-dashed my-5"></div>
                        <div class="form-group">
                            <label>Requested Amount:</label>
                            <input type="text" wire:model.lazy="fundin.requested_amount"
                                   class="form-control @error('fundin.requested_amount') is-invalid @enderror"
                                   placeholder="Requested Amount"/>
                            @error('fundin.requested_amount')
                            <span class="form-text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="separator separator-dashed my-5"></div>
                        <div class="form-group">
                            <label>Fund In Commission:</label>
                            <input type="text" wire:model.lazy="fundin.fund_in_commission"
                                   class="form-control @error('fundin.fund_in_commission') is-invalid @enderror"
                                   placeholder="Fund In Commission"/>
                            @error('fundin.fund_in_commission')
                            <span class="form-text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="separator separator-dashed my-5"></div>
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
                        <div class="separator separator-dashed my-5"></div>
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
                        <div class="separator separator-dashed my-5"></div>
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
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{route('fund-ins.index')}}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->
        </div>
    </div>
</div>
@section('breadcrumb')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">FundIns</h5>
                <!--end::Page Title-->
                <!--begin::Action-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <span class="text-muted font-weight-bold mr-4">Edit Fund In</span>
            {{--            <a href="#" class="btn btn-light-primary font-weight-bolder btn-sm">Add New</a>--}}
            <!--end::Action-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
@endsection
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

        document.addEventListener('livewire:load',function () {
           var fundin = @js($fundin);
            $('#merchant').val(fundin['merchant_id']);
            $('#merchant').trigger('change');
            $('#status').val(fundin['status']);
            $('#status').trigger('change');
            $('#update_by').val(fundin['update_by']);
            $('#update_by').trigger('change');
        });
    </script>
@endpush
