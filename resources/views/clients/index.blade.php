@extends('layouts.app')

@section('title', 'الموكلين')
@include('partials._datatables_assets')

@section('extra-css')
@endsection
@section('bar-title', 'الموكلين')
@section('page-title', 'الموكلين')

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
                            <th>الكود</th>
                            <th>الاسم</th>
                            <th>الصفة</th>
                            <th>الهاتف</th>
                            <th>العنوان</th>
                            <th>الوظيفة</th>
                            <th>الجنسية</th>
                            <th>الرقم المدني</th>
                            <th class="text-center">الخيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td class="iteration text-center">{{ $loop->iteration }}</td>
                                <td>{{ $client->code }}</td>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->description }}</td>
                                <td>{{ $client->phone }}</td>
                                <td>{{ $client->address }}</td>
                                <td>{{ $client->job }}</td>
                                <td>{{ $client->nationality }}</td>
                                <td>{{ $client->civil_number }}</td>
                                <td>
                                    @can('edit clients')
                                    <a href="{{ route('client.edit', $client->id) }}" class="btn purple-sharp btn-outline sbold uppercase ml-5">تعديل</a>
                                    @endcan

                                    @can('show client')
                                    <a href="{{ route('client.show', $client->id) }}" class="btn blue-sharp btn-outline sbold uppercase ml-5">عرض</a>
                                    @endcan

                                    @can('delete clients')
                                    <form action="{{ route('client.destroy', $client->id) }}" method="POST" class="destroy-form" style="margin-top: 5px;">
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
    <div class="col-md-12">{!! $clients->render() !!}</div>
</div>
@endsection

@section('extra-js')
@endsection