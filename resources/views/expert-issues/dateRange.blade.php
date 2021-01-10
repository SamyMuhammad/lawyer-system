@extends('layouts.app')

@section('page-level-styles')
<link href="{{ asset('metronic/assets/pages/css/invoice-rtl.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('title', 'قضايا الخبراء ')

@section('extra-css')
@endsection
@section('bar-title', 'قضايا الخبراء')
@section('page-title')
قضايا الخبراء من {{ request('from') }} إلى {{ request('to') }}

<a class="btn btn-lg blue hidden-print margin-bottom-5" style="float: left" onclick="javascript:window.print();"> طباعة
    <i class="fa fa-print"></i>
</a>
@endsection

@section('content')
<div class="container">
    <div class="row show-data">
        @forelse ($issues as $issue)
            <div class="col-md-6 row data-group">
                <div class="col-xs-6">الرقم الآلي</div>
                <div class="col-xs-6">{{ $issue->issue_court_code }}</div>
            </div>
            <div class="col-md-6 row data-group">
                <div class="col-xs-6">نوع الدعوى</div>
                <div class="col-xs-6">{{ $issue->type }}</div>
            </div>
            <div class="col-md-6 row data-group">
                <div class="col-xs-6">محكمة الخبراء</div>
                <div class="col-xs-6">{{ $issue->experts_court }}</div>
            </div>
            <div class="col-md-6 row data-group">
                <div class="col-xs-6">اسم الخبير</div>
                <div class="col-xs-6">{{ $issue->expert_name }}</div>
            </div>
            <div class="col-md-6 row data-group">
                <div class="col-xs-6">اسم الموكل</div>
                <div class="col-xs-6">{{ $issue->client->name }}</div>
            </div>
            <div class="col-md-6 row data-group">
                <div class="col-xs-6">صفة الموكل</div>
                <div class="col-xs-6">{{ $issue->client->description }}</div>
            </div>
            <div class="col-md-6 row data-group">
                <div class="col-xs-6">اسم الخصم</div>
                <div class="col-xs-6">{{ $issue->opponent_name }}</div>
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
                <div class="col-xs-6">رقم الدور</div>
                <div class="col-xs-6">{{ $issue->floor_number }}</div>
            </div>
            <div class="col-md-6 row data-group">
                <div class="col-xs-6">رقم القاعة</div>
                <div class="col-xs-6">{{ $issue->hall_number }}</div>
            </div>
            <div class="col-md-6 row data-group">
                <div class="col-xs-6">التاريخ</div>
                <div class="col-xs-6">{!! $issue->dateWithDayName !!}</div>
            </div>
            <div class="col-xs-12 row data-group">
                <hr style="border-top: 1px solid #9d9c9c;">
            </div>
        @empty
            <h3>لا يوجد بيانات.</h3>
        @endforelse
        
    </div>
</div>
@endsection

@section('extra-js')
@endsection