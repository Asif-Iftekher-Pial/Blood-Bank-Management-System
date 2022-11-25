@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
    {{ session()->get('message') }}
    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
</div>
@endif

@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
    {{ session()->get('error') }}
    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
</div>
@endif
{{--  validation error message --}}
@if ($errors->any())
<div class="alert alert-danger" id="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif