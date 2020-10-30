@extends('layouts.public')
@section('content')
	@include('public.profitability_calculation._form', ['sorts' => $sorts])
@endsection