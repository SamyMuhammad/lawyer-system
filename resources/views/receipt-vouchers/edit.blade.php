@extends('layouts.app')

@section('title', 'سندات القبض')

@section('extra-css')
@endsection

@section('bar-title', 'سندات القبض')
@section('page-title', 'تعديل السند '. $receipt->number)
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ route('receipt-voucher.update', $receipt->id) }}" method="POST">
                @method('PATCH')
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