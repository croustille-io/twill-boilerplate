@extends('twill::layouts.settings')

@section('contentFields')
    @formField('input', [
        'name' => 'site_description',
        'label' => 'Site description',
        'type' => 'textarea',
        'maxlength' => 300,
        'rows' => 3,
        'translated' => true,
    ])

    @formField('medias', [
        'name' => 'site_preview_image',
        'label' => 'Default preview image',
    ])
@stop
