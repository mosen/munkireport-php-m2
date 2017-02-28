@extends('layouts.navigation')
@section('title', 'Wifi Listing')
@push('scripts')
<script src="{{ asset('js/x/wifi/listing.js') }}" type="application/javascript"></script>
@endpush
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                Wifi Listing
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div id="table"></div>
            </div>
        </div>
    </div>
@endsection
