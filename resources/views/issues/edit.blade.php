@extends('layouts.app')

@section('title', 'القضايا')

@section('extra-css')
@endsection

@section('bar-title', 'القضايا')
@section('page-title', 'تعديل القضية')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ route('issue.update', $issue->id) }}" method="POST">
                @method('PATCH')
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