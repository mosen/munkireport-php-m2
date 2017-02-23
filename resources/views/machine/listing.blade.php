@extends('layouts.navigation')
@section('title', 'Hardware')
@push('scripts')
<script src="{{ asset('js/machine/manifest.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/machine/vendor.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/machine/listing.js') }}" type="application/javascript"></script>
@endpush
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                nav.reports.hardware
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div id="table"></div>
            </div>
        </div>
    </div>
@endsection
