@extends('master')
@section('main')
<div class="card">
    <div class="card-body">
        <h5 class="card-title text-center">Edit Donar </h5>


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
        <form action="#" method="POST" class="row g-3" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <label for="inputName5" class="form-label">Donar  Name</label>
                <input type="text" name="d_name" class="form-control" value="{{ $data->d_name }}" id="inputName5" placeholder="ex: Mou">
            </div>
            <div class="col-md-6">
                <label for="inputEmail5" class="form-label">Donar  Age</label>
                <input type="number" name="d_age" min="18" class="form-control" value="{{ $data->d_age }}" id="inputEmail5">
            </div>
            <div class="col-md-6">
                <label for="inputPassword5" class="form-label">Donar  Address</label>
                <input type="text" name="d_address" class="form-control" value="{{ $data->d_address }}" id="inputPassword5">
            </div>
            <div class="col-12">
                <label for="inputAddress5" class="form-label">Donar Mobile</label>
                <input type="number" name="d_mobile" class="form-control" id="inputAddres5s" value="{{ $data->d_mobile }}" placeholder="016*******">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Donar Disease</label>
                <input type="text" name="d_disease" class="form-control" id="inputAddress2" value="{{ $data->d_disease }}" placeholder="Disease name">
            </div>
            <div class="col-12">
                <label for="" class="form-label">Select Blood Group</label>
                <select class="form-select" name="d_blood_group" value="{{ $data->d_blood_group }}" aria-label="Default select example">
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
                <label for="inputAddress2" class="form-label">Donar Image</label>
                <input type="file" name="d_image" class="form-control" value="{{ $data->d_image }}" id="inputAddress2">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form><!-- End Multi Columns Form -->

    </div>
</div>
@endsection