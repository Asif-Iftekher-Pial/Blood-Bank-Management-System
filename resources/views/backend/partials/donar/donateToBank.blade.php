@extends('master')
@section('main')
<div class="card">
    <div class="card-body">
        <h5 class="card-title text-center">Blood Bank Donation Form</h5>


        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                {{ session()->get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- error message --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-12">
            <div class="row">
                <div class="col-md-6">
                    @php
                        $status = App\Models\BloodStock::where('donar_id',$donar->id)->pluck('avalability')->first();
                    @endphp
                    <p>Name : {{ $donar->d_name }}</p>
                    <p>Age : {{ $donar->d_age }} years</p>
                   <p>Donate Status : {{ ucfirst($status) }} </p>  
                </div>
                <div class="col-md-6">
                    <p>Blood Group : {{ $donar->d_blood_group }}</p>
                    <p>Last Donation Date : {{ $donar->donated_user->last_donation_date }}</p>
                </div>
            </div>
            <div class="border-bottom"></div>
        </div>
        <!-- Multi Columns Form -->
        <form action="{{ route('donate.bloodToBank.save') }}" method="POST" class="row g-3 mt-4" >
            @csrf

            <input type="hidden" name="donar_id" value="{{ $donar->id }}">
            <input type="hidden" name="blood_group" value="{{ $donar->d_blood_group }}">
            <div class="col-12">
                <label for="" class="form-label">Donation status</label>
                <select class="form-select" name="status" aria-label="Default select example">
                    <option value="ready">Available to Donate</option>
                    <option selected value="already_donated">Donated</option>
                </select>
            </div>
            <div class="col-12">
                <label for="" class="form-label">Donation Date</label>
                <input type="date" class="form-control" name="last_donation_date" id="" required>
            </div>
            
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Confirm</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form><!-- End Multi Columns Form -->

    </div>
</div>    
@endsection