@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
@endsection

@section('content')

@livewire('modal')

@endsection