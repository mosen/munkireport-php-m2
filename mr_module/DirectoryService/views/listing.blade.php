@extends('layouts.navigation')
@section('title', 'Directory Services Listing')
@push('scripts')
<script src="{{ asset('js/x/directoryservice/manifest.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/x/directoryservice/vendor.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/x/directoryservice/listing.js') }}" type="application/javascript"></script>
@endpush
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                Directory Services Report
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div id="table"></div>
            </div>
        </div>
    </div>
@endsection
