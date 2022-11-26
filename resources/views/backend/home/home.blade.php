@extends('master')
@section('main')
   @if (Auth::user()->position == 'Admin')
        <!-- Left side columns -->
    <div class="col-lg-12">

        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                {{ session()->get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
             <!-- Customers Card -->
             <div class="col-xxl-4 col-md-4">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Patients<span></span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ App\Models\Patient::count() }}</h6>
                            </div>
                        </div>

                    </div>
                </div>

            </div><!-- End Customers Card -->
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Donars</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ App\Models\Donar::count() }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Approved Donars</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ App\Models\Donar::where('status','approved')->count() }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


                <h4 class="text-center" style="color: red;text-decoration:underline">Blood Bank</h4>

           
           
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">A+ <span></span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="color: red">
                                <i class="bi bi-droplet-fill"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ App\Models\BloodBank::where('blood_group','A+')->count() }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">A- <span></span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="color: red">
                                <i class="bi bi-droplet-fill"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ App\Models\BloodBank::where('blood_group','A-')->count() }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">B+ <span></span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="color: red">
                                <i class="bi bi-droplet-fill"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ App\Models\BloodBank::where('blood_group','B+')->count() }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">B- <span></span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="color: red">
                                <i class="bi bi-droplet-fill"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ App\Models\BloodBank::where('blood_group','B-')->count() }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">O- <span></span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="color: red">
                                <i class="bi bi-droplet-fill"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ App\Models\BloodBank::where('blood_group','O-')->count() }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">O+ <span></span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="color: red">
                                <i class="bi bi-droplet-fill"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ App\Models\BloodBank::where('blood_group','O+')->count() }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">AB+ <span></span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="color: red">
                                <i class="bi bi-droplet-fill"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ App\Models\BloodBank::where('blood_group','AB+')->count() }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">AB- <span></span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="color: red">
                                <i class="bi bi-droplet-fill"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ App\Models\BloodBank::where('blood_group','AB-')->count() }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Left side columns -->

    
   @else
      <h2>Hello- {{ App\Models\Donar::where('user_id',Auth::user()->id)->pluck('d_name')->first() }} !</h2>
   @endif
@endsection
