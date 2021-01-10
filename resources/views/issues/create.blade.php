@extends('layouts.app')

@section('title', 'القضايا')

@section('extra-css')
@endsection

@section('bar-title', 'القضايا')
@section('page-title', 'إضافة قضية')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ route('issue.store') }}" method="POST">
                @csrf
                @include('issues._form')
            </form>
            <!-- END FORM-->
        </div>        
    </div>
</div>
@endsection

@section('extra-js')
@endsection