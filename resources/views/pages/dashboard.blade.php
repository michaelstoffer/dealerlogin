@extends('layouts.app')

@section('scripts')
	<script>window.dealerHelper = '{{ env('DEALER_HELPER') }}';</script>
@endsection

@section('content')
	<dashboard :user="{{ $user }}"></dashboard>
@endsection
