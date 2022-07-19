@extends('layouts.layout')

@section('content')
    <div class="container">
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">Fund Ins
{{--                        <span class="d-block text-muted pt-2 font-size-sm">Column output customization</span></h3>--}}
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    @can('create-fund-in')
                    <button data-toggle="modal" data-target="#create" class="btn btn-primary font-weight-bolder mr-2">
											<span class="svg-icon svg-icon-md">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<circle fill="#000000" cx="9" cy="15" r="6" />
														<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
													</g>
												</svg>
                                                <!--end::Svg Icon-->
											</span>Manual Create</button>
                    @endcan
                    @can('create-fund-in-link')
                    <button data-toggle="modal" data-target="#createLink" class="btn btn-primary font-weight-bolder">
											<span class="svg-icon svg-icon-md">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<circle fill="#000000" cx="9" cy="15" r="6" />
														<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
													</g>
												</svg>
                                                <!--end::Svg Icon-->
											</span>Generate Temporary FundIn Link</button>
                @endcan
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
            {{ $dataTable->table() }}
            </div>
        </div>
        <!--end::Card-->
    </div>
    <livewire:fund-in.create/>
    <livewire:link.create/>
@endsection


@section('page-title')
    FundIns Management
@endsection

@section('breadcrumb')
    @include('fundin.breadcrumb')
@endsection

@push('css')
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    @endpush

@push('js')
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    {{ $dataTable->scripts() }}
    <script>
        function deleteItem(id) {
            console.log(id);
            Swal.fire({
                title: "Are you sure?",
                text: "You wont be able to revert this",
                icon: "warning", showCancelButton: true, confirmButtonText: "Yes, delete it!", cancelButtonText: "No, cancel!", reverseButtons: true}).
            then(function (result) {
                if (result.value) {
                    $('#delete-'+id).submit();
                }
            })
        }
    </script>
@endpush
