@extends('layouts.navigation')
@section('title', 'Warranty Listing')
@push('scripts')
<script src="{{ asset('js/x/warranty/manifest.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/x/warranty/vendor.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/x/warranty/listing.js') }}" type="application/javascript"></script>
@endpush
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                Warranty Listing
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div id="table"></div>
            </div>
        </div>
    </div>
@endsection
