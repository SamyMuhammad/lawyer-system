@extends('layouts.app')

@section('title', 'رول الجلسات')
@include('partials._datatables_assets')

@section('extra-css')
@endsection
@section('bar-title', 'رول الجلسات')
@section('page-title')
رول الجلسات
<a class="btn green btn-outline" href="#date-range-form" style="float: left; word-spacing: 3px;" data-toggle="modal"> عرض مدى زمني معين</a>
@endsection

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
                            <th>الرقم الآلي</th>
                            <th>المحكمة</th>
                            <th>اسم الموكل</th>
                            {{-- <th>صفة الموكل</th> --}}
                            <th>اسم الخصم</th>
                            {{-- <th>صفة الخصم</th> --}}
                            <th>تاريخ الجلسة</th>
                            <th>القرار السابق</th>
                            <th>التاريخ</th>
                            <th class="text-center">الخيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rolls as $roll)
                            <tr>
                                <td class="iteration text-center">{{ $loop->iteration }}</td>
                                <td>{{ $roll->code }}</td>
                                <td>{{ $roll->court }}</td>
                                <td>{{ $roll->client->name }}</td>
                                {{-- <td>{{ $roll->client->description }}</td> --}}
                                <td>{{ $roll->opponent_name }}</td>
                                {{-- <td>{{ $roll->opponent_description }}</td> --}}
                                <td>{{ $roll->session_date }}</td>
                                <td>{{ $roll->previous_decision }}</td>
                                <td>{!! $roll->dateWithDayName !!}</td>
                                <td>
                                    @can('edit session-rolls')
                                    <a href="{{ route('session-roll.edit', $roll->id) }}" class="btn purple-sharp btn-outline sbold uppercase ml-5">تعديل</a>
                                    @endcan

                                    @can('show session-roll')
                                    <a href="{{ route('session-roll.show', $roll->id) }}" class="btn blue-sharp btn-outline sbold uppercase ml-5">عرض</a>
                                    @endcan

                                    @can('delete session-rolls')
                                    <form action="{{ route('session-roll.destroy', $roll->id) }}" method="POST" class="destroy-form" style="margin-top: 5px;">
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
    <div class="col-md-12">{!! $rolls->render() !!}</div>
</div>
{{-- Modal --}}
<div id="date-range-form" class="modal fade" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">حدد المدى الزمني</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('session-roll.dateRange') }}" class="form-horizontal" method="GET" id="modal-form">
                    <div class="form-group">
                        <label class="control-label col-md-4">حدد تاريخ البداية والنهاية</label>
                        <div class="col-md-8">
                            <div class="input-group input-medium date-picker input-daterange" {{-- data-date="10/11/2012" --}} data-date-format="yyyy-mm-dd">
                                <input type="text" class="form-control" name="from" placeholder="من">
                                <span class="input-group-addon"> إلى </span>
                                <input type="text" class="form-control" name="to" placeholder="إلى">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn dark btn-outline" data-dismiss="modal" aria-hidden="true">إغلاق</button>
                <button class="btn green" type="submit" form="modal-form">عرض</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('extra-js')
@endsection