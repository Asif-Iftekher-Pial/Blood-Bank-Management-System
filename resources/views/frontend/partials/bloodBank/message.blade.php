@extends('frontend.master.master')
@section('main_frontend')
    
    <div class="col-12 my-5">
        {{-- <div> --}}
            <div class="col-lg-6 m-auto">
                @include('frontend.layouts.errorAndSuccessMessage')
                <div class="form-card ">
                    <div class="form-title text-center">
                        <h4 style="text-decoration: underline">Message to Admin</h4>
                       <span>Blood Group:</span><h4>{{ $id->blood_group }}</h4>
                    </div>

                    @if ($messages == !null)
                    <div class="col-12">
                        
                        <label for="">Name: {{ App\Models\Patient::where('user_id',Auth::user()->id)->pluck('patient_name')->first() }}</label>
                        <br>
                        <label for="">Required Date : {{ $messages->required_date }}</label><br>
                         <br>
                        <label for="">Messasge:</label><br>
                        {{ $messages->message }}


                    </div>
                    @else
                        <p>No messages found!</p>
                    @endif
                    <form action="{{ route('sendMessage') }}" method="post">
                        
                        @csrf

                        @php
                            $patient_id = App\Models\Patient::where('user_id',Auth::user()->id)->pluck('id')->first()

                        @endphp
                        {{-- @dd($patient_id) --}}
                        <div class="form-body mt-5">
                            <label for="">Message:</label>
                            <input type="text" name="message"  placeholder="Enter message to admin" class="form-control">
                            <label for="">Required Date</label>
                            <input type="date" name="required_date"  class="form-control">
                           
                            <input type="hidden" name="patient_id" value="{{ $patient_id }}">
                            <input type="hidden" name="blood_bank_id" value="{{ $id->id }}">
        
                            <button type="submit" class="btn btn-sm btn-primary w-100">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        {{-- </div> --}}
    </div>
    
@endsection
