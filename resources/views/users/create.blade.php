@extends('layouts.app')

@section('title', 'الأعضاء')

@section('extra-css')
@endsection

@section('bar-title', 'الأعضاء')
@section('page-title', 'إضافة عضو')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('users._form')
            </form>
            <!-- END FORM-->
        </div>        
    </div>
</div>
@endsection

@section('extra-js')
@endsection