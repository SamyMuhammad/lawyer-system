@extends('layouts.app')

@section('title', 'قضايا الخبراء')

@section('extra-css')
@endsection

@section('bar-title', 'قضايا الخبراء')
@section('page-title', 'إضافة قضية')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ route('expert-issue.store') }}" method="POST">
                @csrf
                @include('expert-issues._form')
            </form>
            <!-- END FORM-->
        </div>        
    </div>
</div>
@endsection

@section('extra-js')
@endsection