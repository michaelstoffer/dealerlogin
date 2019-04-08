@extends('layouts.app')

@section('content')
	<training :videos="{{ $videos }}"></training>
@endsection
