@extends('twill::layouts.settings')

@section('contentFields')
    @formField('input', [
        'label' => 'Site description',
        'name' => 'site_description',
        'type' => 'textarea',
        'maxlength' => 300,
        'rows' => 3
    ])

    @formField('medias', [
        'name' => 'site_preview_image',
        'label' => 'Default preview image',
    ])
@stop
