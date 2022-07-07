<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <!--begin::Card-->
            <div class="card card-custom example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Edit Merchant {{$user->first_name . ' '. $user->last_name}}</h3>
                </div>
                <!--begin::Form-->
                <form class="form" wire:submit.prevent="edit">
                    <div class="card-body">
                        <div class="form-group">
                            <label>First Name:</label>
                            <input type="text" wire:model.lazy="user.first_name" class="form-control @error('user.first_name') is-invalid @enderror" placeholder="Enter First Name" />
                            @error('user.first_name')
                            <span class="form-text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="separator separator-dashed my-5"></div>
                        <div class="form-group">
                            <label>Last Name:</label>
                            <input type="text" wire:model.lazy="user.last_name" class="form-control @error('user.last_name') is-invalid @enderror" placeholder="Enter Last Name" />
                            @error('user.last_name')
                            <span class="form-text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="separator separator-dashed my-5"></div>
                        <div class="form-group">
                            <label>User Name:</label>
                            <input type="text" wire:model.lazy="user.username" class="form-control @error('user.user_name') is-invalid @enderror" placeholder="Enter Username" />
                            @error('user.username')
                            <span class="form-text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="separator separator-dashed my-5"></div>

                        <div class="form-group">
                            <label>Password:</label>
                            <input type="text" wire:model.lazy="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" />
                            @error('password')
                            <span class="form-text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="separator separator-dashed my-5"></div>
                        <div class="form-group">
                            <label>Company:</label>
                            <input type="text" wire:model.lazy="company" class="form-control @error('company') is-invalid @enderror" placeholder="Enter Username" />
                            @error('company')
                            <span class="form-text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="separator separator-dashed my-5"></div>

                        <div class="form-group">
                            <label>Balance:</label>
                            <div class="input-group input-group-lg">
                                <input type="text" wire:model.lazy="balance" class="form-control @error('balance') is-invalid @enderror" placeholder="Enter Username" />
                                <div class="input-group-append"><span class="input-group-text" >Rp</span></div>
                            </div>
                            @error('balance')
                            <span class="form-text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="separator separator-dashed my-5"></div>

                        <div class="form-group">
                            <label>Fund Out Commission Rate:</label>
                            <div class="input-group input-group-lg">
                                <input type="text" wire:model.lazy="fund_out_rate" class="form-control @error('fund_out_rate') is-invalid @enderror" placeholder="Enter Username" />
                                <div class="input-group-append"><span class="input-group-text" >%</span></div>
                            </div>
                            @error('fund_out_rate')
                            <span class="form-text text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="separator separator-dashed my-5"></div>
                        <div class="form-group">
                            <label>Fund In Commission Rate:</label>
                            <div class="input-group input-group-lg">
                                <input type="text" wire:model.lazy="fund_in_rate" class="form-control @error('fund_in_rate') is-invalid @enderror" placeholder="Enter Username" />
                                <div class="input-group-append"><span class="input-group-text" >%</span></div>
                            </div>
                            @error('fund_in_rate')
                            <span class="form-text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="separator separator-dashed my-5"></div>


                        <div class="form-group row align-items-center">
                            <label class="col-lg-3 col-form-label">Status:</label>
                            <div class="col-lg-6">
                                <div class="radio-inline">
                                    <label class="radio">
                                        <input type="radio" wire:model.lazy="user.status" name="status" value="1"/>
                                        <span></span>
                                        Active
                                    </label>
                                    <label class="radio">
                                        <input type="radio"  wire:model.lazy="user.status" name="status" value="0"/>
                                        <span></span>
                                        InActive
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row align-items-center">
                            <label class="col-lg-3 col-form-label">Merchant Type:</label>
                            <div class="col-lg-6">
                                <div class="radio-inline">
                                    <label class="radio">
                                        <input type="radio" wire:model.lazy="merchant_type" name="merchant_type" value="Merchant"/>
                                        <span></span>
                                        Merchant
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row align-items-center">
                            <label class="col-lg-3 col-form-label">Settlement Method:</label>
                            <div class="col-lg-6">
                                <div class="radio-inline">
                                    <label class="radio">
                                        <input type="radio" wire:model.lazy="settlement_method" name="settlement_method" value="No Settlement"/>
                                        <span></span>
                                        No Settlement
                                    </label>

                                    <label class="radio">
                                        <input type="radio" wire:model.lazy="settlement_method" name="settlement_method" value="Seamless"/>
                                        <span></span>
                                        Seamless
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="button" class="btn btn-secondary">Cancel</button>
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
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Merchants</h5>
                <!--end::Page Title-->
                <!--begin::Action-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <span class="text-muted font-weight-bold mr-4">Edit Merchant</span>
            {{--            <a href="#" class="btn btn-light-primary font-weight-bolder btn-sm">Add New</a>--}}
            <!--end::Action-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
@endsection
