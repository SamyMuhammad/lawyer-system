@extends('layouts.app')

@section('page-level-styles')
<link href="{{ asset('metronic/assets/pages/css/invoice-rtl.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('title', 'العضو '. $user->name)

@section('extra-css')
@endsection
@section('bar-title', 'الأعضاء')
@section('page-title', 'العضو '. $user->name)

@section('content')
<div class="container">
    <div class="row show-data">
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">الاسم</div>
            <div class="col-xs-6">{{ $user->name }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">الهاتف</div>
            <div class="col-xs-6">{{ $user->phone }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">البريد الإلكتروني</div>
            <div class="col-xs-6">{{ $user->email }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">العنوان</div>
            <div class="col-xs-6">{{ $user->address }}</div>
        </div>
        <div class="col-md-6 row data-group">
            <div class="col-xs-6">الصورة</div>
            <div class="col-xs-6">
                <img src="{{ asset($user->fullPhotoPath) }}" class="form-photo" alt="{{ $user->name }}">
            </div>
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