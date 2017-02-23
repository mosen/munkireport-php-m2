@extends('layouts.navigation')
@section('title', 'Disk Report Listing')
@push('scripts')
<script src="{{ asset('js/x/diskreport/manifest.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/x/diskreport/vendor.js') }}" type="application/javascript"></script>
<script src="{{ asset('js/x/diskreport/listing.js') }}" type="application/javascript"></script>
@endpush
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                Disk Report Listing
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div id="table"></div>
            </div>
        </div>
    </div>
@endsection
