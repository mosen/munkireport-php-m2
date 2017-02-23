@extends('layouts.navigation')
@section('title', 'MunkiReport Listing')
@push('scripts')
<script src="{{ asset('js/x/munkireport/manifest.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/x/munkireport/vendor.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/x/munkireport/listing.js') }}" type="application/javascript"></script>
@endpush
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                MunkiReport Listing
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div id="table"></div>
            </div>
        </div>
    </div>
@endsection
