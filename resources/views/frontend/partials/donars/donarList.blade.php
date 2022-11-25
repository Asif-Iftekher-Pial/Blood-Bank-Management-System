@extends('frontend.master.master')
@section('main_frontend')

    <div class="col-12 my-5">
        {{-- <div> --}}
        <div class="col-lg-11 m-auto">
            @include('frontend.layouts.errorAndSuccessMessage')
            <div class="form-card ">
                <div class="form-title text-center">
                    <h4>Donar list</h4>
                </div>
                <table class="table table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Age</th>
                            <th scope="col">Group</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Address</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allDonarsBlood as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $item->d_name }}</td>
                                <td style="width: 100px">
                                    <img src="{{ asset('backend/images/donar/' . $item->d_image) }}" alt=""
                                        srcset="">
                                </td>
                                <td>{{ $item->d_age }}</td>
                                <td>{{ $item->d_blood_group }}</td>
                                <td>{{ $item->d_mobile }}</td>
                                <td>{{ $item->d_address }}</td>
                                <td>{{ ucfirst($item->blood_stock->avalability) }}</td>
                                <td>
                                    @if ($item->blood_stock->avalability == 'ready')
                                        @php
                                            $aspatientID = App\Models\Patient::where('user_id', Auth::user()->id)
                                                ->pluck('id')
                                                ->first();
                                            
                                            $exists = App\Models\BloodRequest::where('donar_id', $item->id)
                                                ->where('user_id', Auth::user()->id)
                                                ->where('patient_id', $aspatientID)
                                                ->first();
                                        @endphp
                                        @if ($exists == !null)
                                            @if ($exists->action == 'sent')
                                                <div>
                                                    <a href="#"class="btn btn-sm btn-success text-white"> Sent <i
                                                            class="bi bi-check-all"></i></a>
                                                    <a href="{{ route('patient.delete.request', ['donar_id' => $item->id,'patient_id' =>$aspatientID , 'user_id' => Auth::user()->id]) }}"
                                                        class="btn btn-sm btn-secondary   text-white">Cancel <i
                                                            class="bi bi-x-square-fill"></i></a>
                                                </div>
                                            @else
                                                <div>
                                                    <a href="#"
                                                        onclick="return alert('Donar have accepted your request!')"
                                                        class="btn btn-sm btn-warning text-white"> Confirmed <i
                                                            class="bi bi-check-all"></i></a>
                                                </div>
                                            @endif
                                        @else
                                            <a href="{{ route('patient.send.request', ['donar_id' => $item->id,'patient_id' =>$aspatientID , 'user_id' => Auth::user()->id]) }}" class="btn btn-sm btn-success">send Request</a>
                                        @endif            
                                    @else
                                        <span class="badge badge-primary">Not Available</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- </div> --}}
    </div>

@endsection
