@extends('layouts.app')

@section('title', 'رول الجلسات')

@section('extra-css')
@endsection

@section('bar-title', 'رول الجلسات')
@section('page-title', 'تعديل الرول '. $roll->code)
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ route('session-roll.update', $roll->id) }}" method="POST">
                @method('PATCH')
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