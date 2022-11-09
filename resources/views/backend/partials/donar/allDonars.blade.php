@extends('master')
@section('main')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">All Donars</h5>
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
            {{-- @dd($allPatients) --}}
            <!-- Table with hoverable rows -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Blood Group</th>
                        <th scope="col">Age</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Address</th>
                        <th scope="col">Disease</th>
                        <th scope="col">Availability</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allDonars as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>
                                <img style="width: 80px" src="{{ asset('backend/images/donar/' . $item->d_image) }}" alt="no image found" srcset="">
                            </td>
                            <td>{{ $item->d_name }}</td>
                            <td>{{ $item->d_blood_group }}</td>
                            <td>{{ $item->d_age }}</td>
                            <td>{{ $item->d_mobile }}</td>
                            <td>{{ $item->d_address }}</td>
                            <td>{{ $item->d_disease }}</td>
                            @php
                                $avalability = app\Models\BloodStock::where('donar_id', $item->id)->pluck('avalability')->first();
                            @endphp
                            <td>{{ ucfirst($avalability) }}</td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-warning btn-sm" href="{{ route('edit.donar', $item->id) }}"> <i class="bi bi-pen"></i> </a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('delete.donar', $item->id) }}"> <i class="bi bi-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $allDonars->links() }}
            <!-- End Table with hoverable rows -->
        </div>
    </div>
@endsection
