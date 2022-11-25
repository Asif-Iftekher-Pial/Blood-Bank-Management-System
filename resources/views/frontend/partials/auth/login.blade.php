@extends('frontend.master.master')
@section('main_frontend')
    <div class="col-12">
        <div class="col-6 text-center"  style="margin: auto" >
           @include('frontend.layouts.errorAndSuccessMessage')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 col-md-12 footer-form ml-5  my-5 text-center">
            <div class="form-card">
                <div class="form-title">
                    <h4>Patient Registration</h4>
                </div>
                <form action="{{ route('submitRegistration') }}" method="post">
                    @csrf
                    <div class="form-body">
                        <input type="email" name="email" placeholder="Enter Email Address" class="form-control">
                        <input type="text" name="patient_name" placeholder="Enter Name" class="form-control">
                        <input type="text" name="patient_address" placeholder="Enter Email Address" class="form-control">

                        <input type="text" name="patient_reason" placeholder="Your Reason" class="form-control">
                        <input type="number" name="patient_age" placeholder="age" min="1" class="form-control">
                        <input type="number" name="patient_mobile" placeholder="Enter Mobile no" class="form-control">
                        <input type="password" name="password" placeholder="Enter password" class="form-control">

                        <input type="hidden" name="position" value="Patient">

                        <button type="submit" class="btn btn-sm btn-primary w-100">Register</button>
                    </div>
                </form>
            </div>
        </div>




        {{----------------------- Login -------------- --}}
        <div class="col-lg-5 col-md-12 footer-form ml-5 my-5 text-center">
            <div class="form-card">
                <div class="form-title">
                    <h4>Login</h4>
                </div>
                <form action="{{ route('submitLogin') }}" method="post">
                    @csrf
                    <div class="form-body">
                        <input type="email" name="email" placeholder="Enter Email" class="form-control">
                        <input type="password" name="password" placeholder="Enter Mobile no" class="form-control">
                        <button type="submit" class="btn btn-sm btn-primary w-100">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
