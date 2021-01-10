@extends('layouts.app')

@section('title', 'الموكلين')

@section('extra-css')
@endsection

@section('bar-title', 'الموكلين')
@section('page-title', 'إضافة موكل')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ route('client.store') }}" method="POST">
                @csrf
                @include('clients._form')
            </form>
            <!-- END FORM-->
        </div>        
    </div>
</div>
@endsection

@section('extra-js')
@endsection