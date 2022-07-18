<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <!--begin::Card-->
            <div class="card card-custom example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Enter New Role Information to Create </h3>
                </div>
                <!--begin::Form-->
                <form class="form" wire:submit.prevent="create">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Role Name:</label>
                            <input type="text" wire:model.lazy="role.name" class="form-control @error('role.name') is-invalid @enderror" placeholder="Enter Role Name" />
                            @error('role.name')
                            <span class="form-text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="separator separator-dashed my-5"></div>
                        <div class="form-group">
                            <label>Role Description:</label>
                            <input type="text" wire:model.lazy="role.description" class="form-control @error('role.description') is-invalid @enderror" placeholder="Enter Role Description" />
                            @error('role.description')
                            <span class="form-text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="separator separator-dashed my-5"></div>
                        @foreach(\Spatie\Permission\Models\Permission::all()->chunk(3) as $permissions)
                        <div class="checkbox-inline row">
                            @foreach($permissions as $permission)
                                <label class="checkbox checkbox-rounded col-md-3">
                                    <input type="checkbox" wire:model="selectedPermissions" value="{{$permission->name}}" />
                                    <span></span>
                                        {{$permission->description}}
                                </label>
                            @endforeach
                                <div class="separator separator-dashed my-5"></div>
                        </div>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{route('roles.index')}}" class="btn btn-secondary">Cancel</a>
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
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Roles</h5>
                <!--end::Page Title-->
                <!--begin::Action-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <span class="text-muted font-weight-bold mr-4">Create New Role</span>
            {{--            <a href="#" class="btn btn-light-primary font-weight-bolder btn-sm">Add New</a>--}}
            <!--end::Action-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
@endsection

