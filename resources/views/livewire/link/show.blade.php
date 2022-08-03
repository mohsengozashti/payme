<div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
    <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid"
         style="background-image: url({{asset('assets/media/bg/bg-2.jpg')}});">
        <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
            <!--begin::Login Header-->
            <div class="d-flex flex-center mb-15">
                <a href="#">
                    <img src="{{asset('assets/media/svg/flags/004-indonesia.svg')}}" class="max-h-75px" alt=""/>
                </a>
            </div>
            <!--end::Login Header-->
            <!--begin::Login Sign in form-->
            <div class="login-signin">
                <div class="mb-15">
                    <h3 class="opacity-100 font-weight-normal pb-5">Transaction Details</h3>
                    @if($link->with_qr_code)
                    <div class="mt-3">{!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(300)->generate(route('link.show',$link)); !!}</div>
                        @endif
                </div>
                <form>
                    @csrf
                    <div class="form-group">
                        <label class="text-white" for="">Amount</label>
                        <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 text-center"
                               type="text" value="{{$link->amount.' Rp'}}" autocomplete="off" readonly/>
                    </div>
                    <div class="form-group">
                        <label class="text-white" for="">Customer Name</label>
                        <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 text-center"
                               type="text" value="{{$link->customer_name}}" autocomplete="off" readonly/>
                    </div>
                    <div class="form-group">
                        <label class="text-white" for="">Bank Name</label>
                        <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 text-center"
                               type="text" value="{{$link->bank_name}}" autocomplete="off" readonly/>
                    </div>
                    <div class="form-group">
                        <label class="text-white" for="">Merchant</label>
                        <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 text-center"
                               type="text" value="{{$link->merchant->full_name}}" autocomplete="off" readonly/>
                    </div>
                </form>
            </div>
            <!--end::Login Sign in form-->
        </div>
    </div>
</div>
@section('page-title')
    View Payment Details
@endsection

