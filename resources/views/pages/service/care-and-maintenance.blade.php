@extends('layouts.app')

@section('scripts')
	<script src="{{ asset('js/magnet.min.js') }}" defer></script>
@endsection

@section('content')
	<service :user="{{ $user }}" page="care-and-maintenance"></service>
@endsection
