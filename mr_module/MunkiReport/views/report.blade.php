@extends('layouts.navigation')
@section('title', 'Munki Report')

@push('scripts')
@endpush

@section('main')
    <div id="root">
        <div class="row">
            <div class="col-md-4">
                Status
            </div>
            <div class="col-md-4">
                Pending Apple Sus
            </div>
            <div class="col-md-4">
                Pending Installs
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                Clients with pending
            </div>
            <div class="col-md-4">
                Manifests
            </div>
            <div class="col-md-4">
                Munki Versions
            </div>
        </div>
    </div>
@endsection

