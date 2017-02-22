@extends('layouts.navigation')
@section('title', 'Certificate Listing')
@push('scripts')
<script src="{{ asset('js/x/certificate/manifest.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/x/certificate/vendor.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/x/certificate/listing.js') }}" type="application/javascript"></script>
@endpush
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                Certificate Report
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div id="table"></div>
            </div>
        </div>
    </div>
@endsection
