@extends('master')
@section('main')
    <div class="col-xl-12">

        <div class="card">
            <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit"
                            aria-selected="true" role="tab">Reply To Patient</button>
                    </li>
                </ul>
                <div class="tab-content pt-2">
                    <form action="{{ route('replyMessage',['id'=>$messages->id,'blood_bank_id'=>$messages->blood_bank_id,'patient_id'=>$messages->patient_id]) }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Patient name :</label>
                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">{{ App\Models\Patient::where('id',$messages->patient_id)->pluck('patient_name')->first() }} </label>
                            
                        </div>

                        <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Message : </label>
                            <div class="col-md-8 col-lg-9">
                                {{$messages->message}}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="about" class="col-md-4 col-lg-3 col-form-label">Your Message</label>
                            <div class="col-md-8 col-lg-9">
                                <textarea name="message" class="form-control" id="about" style="height: 100px"></textarea>
                            </div>
                        </div>
{{-- 
                        <input type="hidden" name="patient_id" value="{{ $messages->patient_id }}">
                        <input type="hidden" name="blood_bank_id" value="{{ $messages->blood_bank_id }}">
                        <input type="hidden" name="id" value="{{ $messages->id }}"> --}}
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Reply</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
