@extends('frontend.app')
@section('content')
<div class="sec1">
  <img src="{{ asset('frontend/images/checked.svg') }}" alt="">
  <h2>Thank You!</h2>
  <p>Your Order Placed Successfully Done</p>
  <a href="{{ route('satirtha.home') }}">Continue to homepage</a>
</div>
@endsection