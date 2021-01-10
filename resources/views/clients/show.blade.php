@extends('layouts.app')

@section('page-level-styles')
<link href="{{ asset('metronic/assets/pages/css/invoice-rtl.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('title', 'الموكل '. $client->name)

@section('extra-css')
@endsection
@section('bar-title', 'الموكلين')
@section('page-title', 'الموكل '. $client->name)

@section('content')
<div class="container">
    <div class="row show-data">
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">كود الموكل</div>
            <div class="col-xs-6">{{ $client->code }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">اسم الموكل</div>
            <div class="col-xs-6">{{ $client->name }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">الرقم المدني للموكل</div>
            <div class="col-xs-6">{{ $client->civil_number }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">هاتف الموكل</div>
            <div class="col-xs-6">{{ $client->phone }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">صفة الموكل</div>
            <div class="col-xs-6">{{ $client->description }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">عنوان الموكل</div>
            <div class="col-xs-6">{{ $client->address }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">وظيفة الموكل</div>
            <div class="col-xs-6">{{ $client->job }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">جنسية الموكل</div>
            <div class="col-xs-6">{{ $client->nationality }}</div>
        </div>
        <div class="col-md-12 row data-group">
            <div class="col-xs-2">ملاحظات</div>
            <div class="col-xs-8">{{ $client->notes }}</div>
        </div>
    </div>
</div>
<div class="col-xs-8 invoice-block">
    <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> طباعة
        <i class="fa fa-print"></i>
    </a>
</div>
@endsection

@section('extra-js')
@endsection