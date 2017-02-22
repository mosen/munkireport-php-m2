@extends('layouts.navigation')
@section('title', 'Bluetooth Listing')
@push('scripts')
<script src="{{ asset('js/x/bluetooth/manifest.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/x/bluetooth/vendor.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/x/bluetooth/listing.js') }}" type="application/javascript"></script>
@endpush
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                Bluetooth Report
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div id="table"></div>
            </div>
        </div>
    </div>
@endsection
