<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login - Blood Bank Management System</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('backend/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('backend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="#" class="logo d-flex align-items-center w-auto">
                                    <img src="{{ asset('backend/assets/img/logo.png') }}" alt="">
                                    <span class="d-none d-lg-block">BBMS</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">
                                    
                                    <div class="pt-4 pb-2">
                                        <p class="text-center display-6 text-decoration-underline">Donar</p>
                                        <h5 class="card-title text-center pt-0 pb-0 fs-4">Register Your Account</h5>
                                    </div>
                                    @if (session()->has('message'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert"
                                            id="alert">
                                            {{ session()->get('message') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
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
                           

                                    <form action="{{ route('donar.registration.submit') }}" method="POST" enctype="multipart/form-data"
                                        class="row g-3 needs-validation" novalidate>
                                        @csrf
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Email</label>
                                            <div class="input-group has-validation">
                                                <input type="email" name="email" class="form-control"  required>
                                                <div class="invalid-feedback">Please enter your email.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Name</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="d_name" class="form-control"  required>
                                                <div class="invalid-feedback">Please enter your name.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Age</label>
                                            <div class="input-group has-validation">
                                                <input type="number" name="d_age" class="form-control"  required>
                                                <div class="invalid-feedback">Please enter your age.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Mobile</label>
                                            <div class="input-group has-validation">
                                                <input type="number" name="d_mobile" class="form-control"  required>
                                                <div class="invalid-feedback">Please enter your mobile.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Disease</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="d_disease" class="form-control"  required>
                                                <div class="invalid-feedback">Please enter your disease.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Address</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="d_address" class="form-control"  required>
                                                <div class="invalid-feedback">Please enter your address.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="" class="form-label">Select Blood Group</label>
                                        <select class="form-select" name="d_blood_group" aria-label="Default select example">
                                            <option selected>Select Blood Group</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                        </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="" class="form-label">Donation status</label>
                                            <select class="form-select" name="status" aria-label="Default select example">
                                                <option selected>Ready or Already Donated?</option>
                                                <option value="ready">Ready</option>
                                                <option value="already_donated">Already Donate</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="" class="form-label"> Last Donation Date</label>
                                            <input type="date" class="form-control" name="last_donation_date" id="" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Image</label>
                                            <div class="input-group has-validation">
                                                <input type="file" name="d_image" class="form-control"  required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"  id="yourPassword" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="rememberMe"
                                                     id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Registar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('backend/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('backend/assets/js/main.js') }}"></script>
    <script>
      setTimeout(function() {
          $('#alert').slideUp();
      }, 4000);
  </script>

</body>

</html>
