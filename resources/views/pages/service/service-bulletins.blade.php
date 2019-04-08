@extends('layouts.app')

@section('content')
	<service :user="{{ $user }}" page="service-bulletins"></service>
@endsection
