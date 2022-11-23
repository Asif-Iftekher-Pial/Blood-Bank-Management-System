@extends('master')
@section('main')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">All Blood Group</h5>
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
                        <th scope="col">Group</th>
                        <th scope="col">Age</th>
                        <th scope="col">Available</th>
                        <th scope="col">Disease</th>


                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allDonarsBlood as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->d_blood_group }}</td>
                            <td>{{ $item->d_age }}</td>
                            <td>{{ ucfirst($item->blood_stock->avalability) }}</td>
                            <td>{{ $item->d_disease }}</td>
                           
                            <td>
                                <div class="d-flex">
                                    @if ($item->blood_stock->avalability == 'already_donated')
                                    <span class="badge bg-danger">Already Donated</span>
                                    @else
                                    <a class="btn btn-primary btn-sm"  href="{{ route('donar.profile', $item->id) }}"> view <i class="bi bi-eye"></i></a>
                                    @endif
                                    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $allDonarsBlood->links() }}
            <!-- End Table with hoverable rows -->
        </div>
    </div>
@endsection
