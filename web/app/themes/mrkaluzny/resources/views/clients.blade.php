{{--
  Template Name: Clients
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <section id="clients"></section>
  @endwhile
@endsection
