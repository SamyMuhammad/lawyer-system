@extends('layouts.app')

@section('title', 'رول الجلسات')

@section('extra-css')
@endsection

@section('bar-title', 'رول الجلسات')
@section('page-title', 'إضافة رول')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ route('session-roll.store') }}" method="POST">
                @csrf
                @include('session-rolls._form')
            </form>
            <!-- END FORM-->
        </div>        
    </div>
</div>
@endsection

@section('extra-js')
@endsection