@extends('master')
@section('main')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Received Requests</h5>
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                    {{ session()->get('error') }}
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
                        <th scope="col">Patient/Admin Names</th>
                        <th scope="col">Patient/Admin Emails</th>
                        <th scope="col">Patient Mobiles</th>
                        <th scope="col">Reason</th>
                        <th scope="col">Request Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brTableMyId as $key =>$item)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $item->patients->patient_name }}</td>
                        <td>{{ App\Models\User::where('id',$item->user_id)->pluck('email')->first() }}</td>
                        <td>{{ $item->patients->patient_mobile }}</td>
                        <td>{{ $item->patients->patient_reason }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            @if ($item->action == 'confirmed')
                            <a href="#" onclick="return alert('You have already confirmed this request!')" class="btn btn-sm btn-success text-white"> Confirmed <i
                                class="bi bi-check-all"></i></a>
                            @else
                            <a href="{{ route('confirm.request',$item->id) }}" class="btn btn-sm btn-primary">Confirm Request</a>
                            @endif
                            <a href="{{ route('donar.delete.request',$item->id) }}" class="btn btn-sm btn-danger mt-2">Delete Request</a>

                        </td>
                    </tr>
                   
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $bank_donar->links() }} --}}
            <!-- End Table with hoverable rows -->
        </div>
    </div>
@endsection
