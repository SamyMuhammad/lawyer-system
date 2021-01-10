@extends('layouts.app')
@section('title', 'Dashboard')

@section('page-title', '')
@section('content')
    @can('view stats')
    <!-- BEGIN DASHBOARD STATS 1-->
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue" href="{{ route('user.index') }}">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span>{{ $usersCount }}</span>
                    </div>
                    <div class="desc">الأعضاء</div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red" href="{{ route('client.index') }}">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span>{{ $clientsCount }}</span></div>
                    <div class="desc">الموكلين</div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green" href="{{ route('issue.index') }}">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span>{{ $issuesCount }}</span>
                    </div>
                    <div class="desc">القضايا</div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 purple" href="{{ route('expert-issue.index') }}">
                <div class="visual">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span></span>{{ $expertIssuesCount }}</div>
                    <div class="desc">قضايا الخبراء</div>
                </div>
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- END DASHBOARD STATS 1-->
    @endcan

    @can('view issues')
    <div style="margin-top: 5%;">
        <form action="{{ route('issue.search') }}" method="GET">
            <div class="col-xs-12 col-md-6" style="padding-right:0">
                <h3 class="control-label">ابحث في القضايا</h3>
                <div class="col-xs-6" style="padding-right:0">
                    <input type="text" name="input" placeholder="ادخل أي معلومة تتعلق بالقضية" class="form-control">
                </div>
                <div class="col-xs-2">
                    <button type="submit" class="btn btn-primary">بحث</button>
                </div>
            </div>
        </form>
    </div>
    @endcan
@endsection