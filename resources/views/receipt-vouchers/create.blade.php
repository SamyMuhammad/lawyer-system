@extends('layouts.app')

@section('title', 'سندات القبض')

@section('extra-css')
@endsection

@section('bar-title', 'سندات القبض')
@section('page-title', 'إضافة سند')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ route('receipt-voucher.store') }}" method="POST">
                @csrf
                @include('receipt-vouchers._form')
            </form>
            <!-- END FORM-->
        </div>        
    </div>
</div>
@endsection

@section('extra-js')
@endsection