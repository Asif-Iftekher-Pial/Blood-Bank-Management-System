<header class="continer-fluid ">
    <div class="header-top">
        <div class="container">
            <div class="row col-det">
                <div class="col-lg-6 d-none d-lg-block">
                    <ul class="ulleft">
                        <li>

                            @auth
                                <i class="far fa-envelope"></i>
                                {{ Auth::user()->email }}
                                <span>|</span>
                            @else
                                <i class="far fa-envelope"></i>

                                <span>|</span>
                            @endauth

                        </li>
                        <li>
                            <i class="fas fa-calendar-alt"></i>
                            Today :{{ date(' d-M-Y') }}
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-12">
                    <ul class="ulright">

                        @auth

                            <li>
                                <i class="fas fa-user"></i>
                             <a href="{{ route('edit') }}" class="text-white">{{ App\Models\Patient::where('user_id',Auth::user()->id)->pluck('patient_name')->first() }}</a>   
                                <span>|</span>
                            </li>
                            <li>
                                <i class="fas fa-sign-out-alt"></i>
                                <a href="{{ route('patient.logout') }}" class="text-white">Logout</a>
                            </li>
                        @else


                        <li>
                            <i class="fas fa-user"></i>
                            Hello
                            <span>|</span></li>
                        <li>
                            <i class="fas fa-sign-in-alt"></i>
                           <a href="{{ route('login') }}" class="text-white">Login</a> 
                        </li>
                        @endauth

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="menu-jk" class="header-bottom">
        <div class="container">
            <div class="row nav-row">
                <div class="col-md-3 logo">
                    <img src="assets/images/logo.jpg" alt="">
                </div>
                <div class="col-md-9 nav-col">
                    <nav class="navbar navbar-expand-lg navbar-light">

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('home') }}">Home
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#about">About Us</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('donarList') }}">Donars</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Blood Bank</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#blog">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#contact">Contact US</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
