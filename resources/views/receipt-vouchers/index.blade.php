@extends('layouts.app')

@section('title', 'سندات القبض')
@include('partials._datatables_assets')

@section('extra-css')
@endsection
@section('bar-title', 'سندات القبض')
@section('page-title', 'سندات القبض')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            {{-- <div class="portlet-title">
                <div class="tools"> </div>
            </div> --}}
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>رقم الإيصال</th>
                            <th>نوع القضية</th>
                            <th>التاريخ</th>
                            <th>اسم الموكل</th>
                            <th>المبلغ</th>
                            <th>الملاحظات</th>
                            <th class="text-center">الخيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($receipts as $receipt)
                            <tr>
                                <td class="iteration text-center">{{ $loop->iteration }}</td>
                                <td>{{ $receipt->number }}</td>
                                <td>{{ $receipt->issue_type }}</td>
                                <td>{{ $receipt->date }}</td>
                                <td>{{ $receipt->client->name }}</td>
                                <td>{{ $receipt->cost }}</td>
                                <td>{{ Str::limit($receipt->notes, 50) }}</td>
                                <td>
                                    @can('edit receipt-vouchers')
                                    <a href="{{ route('receipt-voucher.edit', $receipt->id) }}" class="btn purple-sharp btn-outline sbold uppercase ml-5">تعديل</a>
                                    @endcan

                                    @can('show receipt-voucher')
                                    <a href="{{ route('receipt-voucher.show', $receipt->id) }}" class="btn blue-sharp btn-outline sbold uppercase ml-5">عرض</a>
                                    @endcan

                                    @can('delete receipt-vouchers')
                                    <form action="{{ route('receipt-voucher.destroy', $receipt->id) }}" method="POST" class="destroy-form" style="margin-top: 5px;">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn red-mint btn-outline sbold uppercase">حذف</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
    <div class="col-md-12">{!! $receipts->render() !!}</div>
</div>
@endsection

@section('extra-js')
@endsection