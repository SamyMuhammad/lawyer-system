@extends('layouts.app')

@section('page-level-styles')
<link href="{{ asset('metronic/assets/pages/css/invoice-rtl.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('title', 'الرول '. $roll->code)

@section('extra-css')
@endsection
@section('bar-title', 'رول الجلسات')
@section('page-title', 'الرول '. $roll->code)

@section('content')
<div class="container">
    <div class="row show-data">
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">الرقم الآلي</div>
            <div class="col-xs-6">{{ $roll->code }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">المحكمة</div>
            <div class="col-xs-6">{{ $roll->court }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">اسم الموكل</div>
            <div class="col-xs-6">{{ $roll->client->name }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">صفة الموكل</div>
            <div class="col-xs-6">{{ $roll->client->description }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">اسم الخصم</div>
            <div class="col-xs-6">{{ $roll->opponent_name }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">صفة الخصم</div>
            <div class="col-xs-6">{{ $roll->opponent_description }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">تاريخ الجلسة</div>
            <div class="col-xs-6">{{ $roll->session_date }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">القرار السابق</div>
            <div class="col-xs-6">{{ $roll->previous_decision }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">التاريخ</div>
            <div class="col-xs-6">{!! $roll->dateWithDayName !!}</div>
        </div>
        <div class="col-md-12 row data-group">
            <div class="col-xs-2">ملاحظات</div>
            <div class="col-xs-8">{{ $roll->notes }}</div>
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