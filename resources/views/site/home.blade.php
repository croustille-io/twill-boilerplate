@extends('site.layouts.app')

@section('content')
<h1>{{ $item->title }}</h1>

{{-- <div class="w-1/2 mx-auto">
    {!! CroustilleImage::fullWidth($item, 'preview_image') !!}
</div> --}}
@stop
