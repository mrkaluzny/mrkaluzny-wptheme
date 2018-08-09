@extends('layouts.app')

@section('content')
  <section class="hero background--down">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="title title--hero">Get from idea to a bussiness.</h1>
          <h2 class="title title--sub">You might be searching through job boards to find someone for your project. Why waste your time? Work with tested, dedicated developer!</h2>
          <button class="btn btn--rounded btn--outline btn--green btn--large btn--center">Get Started</button>
        </div>
      </div>
    </div>
  </section>
  <section id="testimonials"></section>
  <section class="services section background--down">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="title">
            <h2 class="title__top">Services</h2>
            <h1 class="title__main">Things I can do for your business</h1>
          </div>
        </div>
        <div class="col-12">
          <div class="services__feed">
            @foreach($get_services as $service)
              @include('partials.service')
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
