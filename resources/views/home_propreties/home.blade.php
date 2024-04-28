@extends('home_propreties.layout')
@section('title', 'Home')

@section('content')
@include('home_propreties.features.slide_area')
@include('home_propreties.features.info')
@include('home_propreties.features.service')
@include('home_propreties.features.gal')
@include('home_propreties.features.test')
@include('home_propreties.features.before')

@endsection
