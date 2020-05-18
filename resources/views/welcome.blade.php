@php

use A17\Twill\Models\Setting;

$settings = Setting::where('key', 'site_preview_image')->first();
$image = $settings->hasImage('site_preview_image') ? CroustilleImage::image($settings, 'site_preview_image') : false;
@endphp

@extends('site.layouts.app')

@section('content')
  <div class="my-4">Bonjour</div>

  @if($image)
  <div>
    {!! $image !!}
  </div>
  @endif
@stop
