@extends('layouts.navigation')
@section('title', 'Printer Listing')
@push('scripts')
<script src="{{ asset('js/x/printer/manifest.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/x/printer/vendor.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/x/printer/listing.js') }}" type="application/javascript"></script>
@endpush
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                Printer Listing
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div id="table"></div>
            </div>
        </div>
    </div>
@endsection
