@extends('layouts.app')

@section('title', 'قضايا الخبراء')

@section('extra-css')
@endsection

@section('bar-title', 'قضايا الخبراء')
@section('page-title', 'تعديل القضية '. $issue->issue_court_code)
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ route('expert-issue.update', $issue->id) }}" method="POST">
                @method('PATCH')
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