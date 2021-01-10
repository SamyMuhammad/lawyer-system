@extends('layouts.app')

@section('title', 'الأعضاء')
@include('partials._datatables_assets')

@section('extra-css')
<style>
    td.photo-field{   
       width: 10%;
    }
</style>
@endsection
@section('bar-title', 'الأعضاء')
@section('page-title', 'الأعضاء')

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
                            <th>الصورة</th>
                            <th>الاسم</th>
                            <th>الهاتف</th>
                            <th>البريد الإلكتروني</th>
                            <th>العنوان</th>
                            <th class="text-center">الخيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="iteration text-center">{{ $loop->iteration }}</td>
                                <td class="photo-field">
                                    <img class="table-photo" src="{{ asset($user->fullPhotoPath) }}" alt="{{ $user->name }}">
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->address }}</td>
                                <td>
                                    <div class="btn-group">
                                        @can('edit users')
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn purple-sharp btn-outline sbold uppercase ml-5">تعديل</a>
                                        @endcan

                                        @can('show user')
                                        <a href="{{ route('user.show', $user->id) }}" class="btn blue-sharp btn-outline sbold uppercase ml-5">عرض</a>
                                        @endcan

                                        @can('delete users')
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="margin-top: 5px;" class="destroy-form">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn red-mint btn-outline sbold uppercase">حذف</button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
    <div class="col-md-12">{!! $users->render() !!}</div>
</div>
@endsection

@section('extra-js')
@endsection