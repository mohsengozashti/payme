@extends('layouts.layout')

@section('content')
    <div class="container">
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">Fund Outs

                </div>
                <div class="card-toolbar">
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                {{ $dataTable->table() }}
            </div>
        </div>
        <!--end::Card-->
    </div>
@endsection



@section('page-title')
    FundOuts Management
@endsection

@section('breadcrumb')
    @include('fundout.breadcrumb')
@endsection

@push('css')
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    @endpush

@push('js')
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    {{ $dataTable->scripts() }}
@endpush
