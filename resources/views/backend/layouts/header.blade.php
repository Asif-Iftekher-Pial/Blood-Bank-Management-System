<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('backend/assets/img/logo.png') }}" alt="">
            <span class="d-none d-lg-block">BBMS</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            

            @if (Auth::user()->position == 'Admin')
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('backend/assets/img/profile-img.jpg') }}" alt="Profile"
                            class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->email }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->email }}n</h6>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li>
            @elseif(Auth::user()->position == 'Donar')
                <li class="nav-item dropdown pe-3">
                    @php
                        $image = App\Models\Donar::where('user_id', Auth::user()->id)
                            ->pluck('d_image')
                            ->first();
                    @endphp
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('backend/images/donar/' . $image) }}" alt="Profile"
                            class="rounded-circle">
                        <span
                            class="d-none d-md-block dropdown-toggle ps-2">{{ App\Models\Donar::where('user_id', Auth::user()->id)->pluck('d_name')->first() }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ App\Models\Donar::where('user_id', Auth::user()->id)->pluck('d_name')->first() }}</h6>
                            {{ Auth::user()->email }}

                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('edit.donar') }}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('donar.logout') }}">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>



                    </ul><!-- End Profile Dropdown Items -->
                </li>
            @endif

            <!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header>
