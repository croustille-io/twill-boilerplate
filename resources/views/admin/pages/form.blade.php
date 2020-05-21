@extends('twill::layouts.form')

@section('contentFields')
    @formField('input', [
        'name' => 'description',
        'label' => 'Description',
        'maxlength' => 100,
        'translated' => true,
    ])

    @formField('medias', [
        'name' => 'preview_image',
        'label' => 'Preview Image',
    ])
@stop
