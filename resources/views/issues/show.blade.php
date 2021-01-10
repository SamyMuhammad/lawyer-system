@extends('layouts.app')

@section('page-level-styles')
<link href="{{ asset('metronic/assets/pages/css/invoice-rtl.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('title', 'القضية '. $issue->issue_number)

@section('extra-css')
@endsection
@section('bar-title', 'القضايا')
@section('page-title', 'القضية '. $issue->issue_number)

@section('content')
<div class="container">
    <div class="row show-data">
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">رقم القضية</div>
            <div class="col-xs-6">{{ $issue->issue_number }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">الرقم الآلي للقضية في المحكمة</div>
            <div class="col-xs-6">{{ $issue->issue_court_code }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">كود الموكل في المكتب</div>
            <div class="col-xs-6">{{ $issue->client->code }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">اسم الموكل</div>
            <div class="col-xs-6">{{ $issue->client->name }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">اسم الخصم</div>
            <div class="col-xs-6">{{ $issue->opponent_name }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">اسم المحكمة</div>
            <div class="col-xs-6">{{ $issue->court_name }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">نوع الدعوى</div>
            <div class="col-xs-6">{{ $issue->type }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">موضوع الدعوى</div>
            <div class="col-xs-6">{{ $issue->subject }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">تاريخ الدعوى</div>
            <div class="col-xs-6">{{ $issue->issue_date }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">تاريخ الجلسة</div>
            <div class="col-xs-6">{{ $issue->session_date }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">صفة الموكل</div>
            <div class="col-xs-6">{{ $issue->client->description }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">صفة الخصم</div>
            <div class="col-xs-6">{{ $issue->opponent_description }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">القرار السابق</div>
            <div class="col-xs-6">{{ $issue->previous_decision }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">حالة القضية</div>
            <div class="col-xs-6">{{ $issue->issue_status }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">قيمة العقد</div>
            <div class="col-xs-6">{{ $issue->contract_value }}</div>
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