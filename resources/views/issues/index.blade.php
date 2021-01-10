@extends('layouts.app')

@section('title', 'القضايا')
@include('partials._datatables_assets')

@section('extra-css')
<style>
    td.photo-field{   
       width: 10%;
    }
</style>
@endsection
@section('bar-title', 'القضايا')
@section('page-title', 'القضايا')

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
                            <th>رقم القضية</th>
                            {{-- <th>الرقم الآلي للقضية</th> --}}
                            <th>كود الموكل</th>
                            <th>اسم الموكل</th>
                            <th>اسم الخصم</th>
                            <th>اسم المحكمة</th>
                            <th>نوع الدعوى</th>
                            <th>موضوع الدعوى</th>
                            {{-- <th>تاريخ الدعوى</th> --}}
                            {{-- <th>تاريخ الجلسة</th> --}}
                            {{-- <th>صفة الموكل</th> --}}
                            {{-- <th>صفة الخصم</th> --}}
                            {{-- <th>القرار السابق</th> --}}
                            {{-- <th>حالة القضية</th> --}}
                            {{-- <th>قيمة العقد</th> --}}
                            <th class="text-center">الخيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($issues as $issue)
                            <tr>
                                <td class="iteration text-center">{{ $loop->iteration }}</td>
                                <td>{{ $issue->issue_number }}</td>
                                {{-- <td>{{ $issue->issue_court_code }}</td> --}}
                                <td>{{ $issue->client->code }}</td>
                                <td>{{ $issue->client->name }}</td>
                                <td>{{ $issue->opponent_name }}</td>
                                <td>{{ $issue->court_name }}</td>
                                <td>{{ $issue->type }}</td>
                                <td>{{ $issue->subject }}</td>
                                {{-- <td>{{ $issue->issue_date }}</td> --}}
                                {{-- <td>{{ $issue->session_date }}</td> --}}
                                {{-- <td>{{ $issue->client_description }}</td> --}}
                                {{-- <td>{{ $issue->opponent_description }}</td> --}}
                                {{-- <td>{{ $issue->previous_decision }}</td> --}}
                                {{-- <td>{{ $issue->issue_status }}</td> --}}
                                {{-- <td>{{ $issue->contract_value }}</td> --}}
                                <td>
                                    @can('edit issues')
                                    <a href="{{ route('issue.edit', $issue->id) }}" class="btn purple-sharp btn-outline sbold uppercase ml-5">تعديل</a>
                                    @endcan

                                    @can('show issue')
                                    <a href="{{ route('issue.show', $issue->id) }}" class="btn blue-sharp btn-outline sbold uppercase ml-5">عرض</a>
                                    @endcan

                                    @can('delete issues')
                                    <form action="{{ route('issue.destroy', $issue->id) }}" method="POST" class="destroy-form">
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
    <div class="col-md-12">{!! $issues->render() !!}</div>
</div>
@endsection

@section('extra-js')
@endsection