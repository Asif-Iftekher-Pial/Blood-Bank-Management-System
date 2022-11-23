@extends('master')
@section('main')
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                                {{ session()->get('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <img src="{{ asset('backend/images/donar/' . $profile->d_image) }}" alt="Profile"
                            class="rounded-circle">
                        <h2>{{ $profile->d_name }}</h2>
                        <h3>{{ $profile->d_blood_group }}</h3>
                        <h3>{{ ucfirst($profile->blood_stock->avalability) }}</h3>
                        <div class="social-links mt-2">
                            @php
                                $exists = App\Models\BloodRequest::where('donar_id', $profile->id)
                                    ->where('user_id', Auth::user()->id)
                                    ->first();
                            @endphp
                            {{-- @dd($exists) --}}
                            @if ($exists == !null) 
                                <div>
                                    <a href="#"class="btn btn-sm btn-success text-white"> Sent <i
                                            class="bi bi-check-all"></i></a>
                                    <a href="{{ route('delete.request', ['donar_id' => $profile->id, 'user_id' => Auth::user()->id]) }}"
                                        class="btn btn-sm btn-danger text-white">Cancel <i
                                            class="bi bi-x-square-fill"></i></a>
                                </div>
                            @else
                                <a href="{{ route('send.request', ['donar_id' => $profile->id, 'user_id' => Auth::user()->id]) }}"
                                    class="btn btn-sm btn-primary text-white"> Send Request <i class="bi bi-send"></i></a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">

                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview"
                                    aria-selected="true" role="tab">Overview</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview" role="tabpanel">
                                <h5 class="card-title">Address</h5>
                                <p class="small fst-italic">{{ $profile->d_address }}</p>

                                <h5 class="card-title">Last Donation Date</h5>

                                <p class="small fst-italic">{{ $profile->donated_user->last_donation_date }}</p>
                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8">{{ $profile->d_name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Age</div>
                                    <div class="col-lg-9 col-md-8">{{ $profile->d_age }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Mobile</div>
                                    <div class="col-lg-9 col-md-8">{{ $profile->d_mobile }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Disease</div>
                                    <div class="col-lg-9 col-md-8">{{ $profile->d_disease }}</div>
                                </div>

                            </div>
                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
