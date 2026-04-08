@extends('layout.master')
@section('content')

@include('components.home.hero')
@include('components.home.about-us')
@include('components.home.why-choose-us')
{{-- @include('components.home.our-products') --}}
@include('components.home.what-we-do')
@include('components.home.key-points')
@include('components.home.premium-products')
@include('components.home.benefits')
@include('components.home.cta')
@include('components.home.contact-us')
@include('components.home.testimonials')
@include('components.home.faqs')


@endsection