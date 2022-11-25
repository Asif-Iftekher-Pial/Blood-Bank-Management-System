@extends('frontend.master.master')
@section('main_frontend')
    
    <div class="col-12 my-5">
        {{-- <div> --}}
            <div class="col-lg-6 m-auto">
                @include('frontend.layouts.errorAndSuccessMessage')
                <div class="form-card ">
                    <div class="form-title text-center">
                        <h4>Patient Profile Edit</h4>
                    </div>
                    <form action="{{ route('profileUpdate') }}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-body">
                            <label for="">Name</label>
                            <input type="text" name="patient_name" value="{{ $profile->patient_name }}" placeholder="Enter Name" class="form-control">
                            <label for="">Address</label>
                            <input type="text" name="patient_address" value="{{ $profile->patient_address }}" placeholder="Enter Email Address" class="form-control">
                            <label for="">Reason</label>
                            <input type="text" name="patient_reason" value="{{ $profile->patient_reason }}" placeholder="Your Reason" class="form-control">
                            <label for="">Age</label>
                            <input type="number" name="patient_age" value="{{ $profile->patient_age }}" placeholder="age" min="1" class="form-control">
                            <label for="">Mobile</label>
                            <input type="number" name="patient_mobile" value="{{ $profile->patient_mobile }}" placeholder="Enter Mobile no" class="form-control">
        
                            <input type="hidden" name="position" value="Patient">
                            <input type="hidden" name="patient_user_id" value="{{ $profile->user_id }}">
        
                            <button type="submit" class="btn btn-sm btn-primary w-100">Update Info</button>
                        </div>
                    </form>
                </div>
            </div>
        {{-- </div> --}}
    </div>
    
@endsection
