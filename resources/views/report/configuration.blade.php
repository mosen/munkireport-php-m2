@extends('layouts.navigation')
@section('title', 'Configuration Report')

@push('scripts')
@endpush

@section('main')
    <div id="root">
        <div class="row">
            <div class="col-md-4">
                Duplicate Names
            </div>
            <div class="col-md-4">
                Not matching AD names
            </div>
            <div class="col-md-4">
                Certificates
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                Tags
            </div>
            <div class="col-md-4">
                Bound to DS
            </div>
            <div class="col-md-4">
 
            </div>
        </div>
    </div>
@endsection

