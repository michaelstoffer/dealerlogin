@extends('layouts.app')

@section('scripts')
	<script src="{{ asset('js/magnet.min.js') }}" defer></script>
@endsection

@section('content')
	<marketing-materials :user="{{ $user }}" page="logos"></marketing-materials>
@endsection
