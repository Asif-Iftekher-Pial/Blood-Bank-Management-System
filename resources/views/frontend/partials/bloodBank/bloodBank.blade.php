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
                            <th scope="col">Group</th>
                            <th scope="col">Collected Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bloodBank as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $item->blood_group }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                   <a href="{{ route('messageToAdmin',$item->id) }}" class="btn btn-sm btn-success">Message</a>
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
