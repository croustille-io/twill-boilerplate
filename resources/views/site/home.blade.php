@extends('site.layouts.app')

@section('content')
  <h1>{{ $item->title }}</h1>
  <p>{{ $item->description }}</p>
  <div class="md:w-1/3">
    @if($item->hasImage('preview_image')) {!! CroustilleImage::image($item, 'preview_image') !!} @endif
  </div>
@stop
