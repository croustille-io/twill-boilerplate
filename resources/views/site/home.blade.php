@extends('site.layouts.app')

@section('content')
    <h1>{{ $item->title }}</h1>

    @if($item->hasImage('preview_image'))
        <div class="w-1/2 mt-4">
            {!! TwillImage::fullWidth($item, 'preview_image') !!}
        </div>
    @endif
@stop
