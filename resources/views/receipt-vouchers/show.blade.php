@extends('layouts.app')

@section('page-level-styles')
<link href="{{ asset('metronic/assets/pages/css/invoice-rtl.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('title', 'سند القبض '. $receipt->number)

@section('extra-css')
@endsection
@section('bar-title', 'سندات القبض')
@section('page-title', 'سند القبض '. $receipt->number)

@section('content')
<div class="container">
    <div class="row show-data">
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">رقم الإيصال</div>
            <div class="col-xs-6">{{ $receipt->number }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">نوع القضية</div>
            <div class="col-xs-6">{{ $receipt->issue_type }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">التاريخ</div>
            <div class="col-xs-6">{{ $receipt->date }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">اسم الموكل</div>
            <div class="col-xs-6">{{ $receipt->client->name }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">المبلغ</div>
            <div class="col-xs-6">{{ $receipt->cost }}</div>
        </div>
        <div class="col-md-12 row data-group">
            <div class="col-xs-2">ملاحظات</div>
            <div class="col-xs-8">{{ $receipt->notes }}</div>
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