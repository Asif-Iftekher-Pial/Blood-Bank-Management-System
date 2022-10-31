@extends('master')
@section('main')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Add New Patient</h5>


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
            <!-- Multi Columns Form -->
            <form action="{{ route('patient.save') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-12">
                    <label for="inputName5" class="form-label">Patient Name</label>
                    <input type="text" name="patient_name" class="form-control" id="inputName5" placeholder="ex: Mou">
                </div>
                <div class="col-md-6">
                    <label for="inputEmail5" class="form-label">Patient Age</label>
                    <input type="number" name="patient_age" min="1" class="form-control" id="inputEmail5">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword5" class="form-label">Patient Address</label>
                    <input type="text" name="patient_address" class="form-control" id="inputPassword5">
                </div>
                <div class="col-12">
                    <label for="inputAddress5" class="form-label">Mobile</label>
                    <input type="text" name="mobile" class="form-control" id="inputAddres5s" placeholder="016*******">
                </div>
                <div class="col-12">
                    <label for="inputAddress2" class="form-label">Reason</label>
                    <input type="text" name="reason" class="form-control" id="inputAddress2" placeholder="Disease name">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form><!-- End Multi Columns Form -->

        </div>
    </div>

@endsection
