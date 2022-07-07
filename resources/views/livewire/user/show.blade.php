<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <!--begin::Card-->
            <div class="card card-custom example example-compact">
                <div class="card-header">
                    <h3 class="card-title">User Detail</h3>
                </div>
                <!--begin::Form-->
                <form class="form">
                    <div class="card-body">
                        <div class="form-group">
                            <label>First Name:</label>
                            <input type="text" value="{{$user->first_name}}" class="form-control @error('user.first_name') is-invalid @enderror" placeholder="Enter First Name" disabled/>
                            @error('user.first_name')
                            <span class="form-text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="separator separator-dashed my-5"></div>
                        <div class="form-group">
                            <label>Last Name:</label>
                            <input type="text" value="{{$user->last_name}}" class="form-control @error('user.last_name') is-invalid @enderror" placeholder="Enter Last Name" disabled/>
                            @error('user.last_name')
                            <span class="form-text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="separator separator-dashed my-5"></div>
                        <div class="form-group">
                            <label>User Name:</label>
                            <input type="text" value="{{$user->username}}" class="form-control @error('user.user_name') is-invalid @enderror" placeholder="Enter Username" disabled/>
                            @error('user.username')
                            <span class="form-text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="separator separator-dashed my-5"></div>
                        <div class="form-group row align-items-center">
                            <label class="col-lg-3 col-form-label">Status:</label>
                            <div class="col-lg-6">
                                <div class="radio-inline">
                                    <label class="radio">
                                        <input type="radio" {{$user->status ? 'checked' : ''}} name="status" value="1" disabled/>
                                        <span></span>
                                        Active
                                    </label>
                                    <label class="radio">
                                        <input type="radio" {{!$user->status ? 'checked' : ''}} wire:model.lazy="user.status" name="status" value="0" disabled/>
                                        <span></span>
                                        InActive
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-5"></div>
                        <div class="form-group">
                            <label>User Role</label>
                            <div class="input-group">
                                <select wire:model.lazy="roles" class="custom-select form-control" multiple disabled>
                                    @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                        <option value="{{$role->name}}" {{$role->name == 'user' ? 'selected' : ''}}>{{ucfirst($role->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('roles')
                            <span class="form-text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
{{--                        <button type="submit" class="btn btn-primary mr-2">Submit</button>--}}
                        <a type="button" href="{{\Illuminate\Support\Facades\URL::previous()}}" class="btn btn-secondary">Back</a>
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
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Users</h5>
                <!--end::Page Title-->
                <!--begin::Action-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <span class="text-muted font-weight-bold mr-4">User Details</span>
            {{--            <a href="#" class="btn btn-light-primary font-weight-bolder btn-sm">Add New</a>--}}
            <!--end::Action-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
@endsection
