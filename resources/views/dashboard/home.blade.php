@extends('layouts.master')
@section('main-content')
<div class="breadcrumb">
    <h1>Sistem Pengurusan Perakuan BOMBA</h1>
    <ul>
        <li>JBPM Negeri Melaka</li>
    </ul>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="row">
    <!-- ICON BG -->
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center">
                <i class="i-Add-User"></i>
                <div class="content">
                    <p class="text-muted mt-2 mb-0 text-left">Permohonan Baharu</p>
                    <p class="text-primary text-24 line-height-1 mb-2">205</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center">
                <i class="i-Financial"></i>
                <div class="content">
                    <p class="text-muted mt-2 mb-0 text-left">Permohonan Pembaharuan</p>
                    <p class="text-primary text-24 line-height-1 mb-2">21</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center">
                <i class="i-Checkout-Basket"></i>
                <div class="content">
                    <p class="text-muted mt-2 mb-0 text-left">Sijil Dikeluarkan</p>
                    <p class="text-primary text-24 line-height-1 mb-2">80</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
            <div class="card-body text-center">
                <i class="i-Money-2"></i>
                <div class="content">
                    <p class="text-muted mt-2 mb-0 text-left">Bayaran Dipungut</p>
                    <p class="text-primary text-24 line-height-1 mb-2">$1200</p>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-lg-8 col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title">Perangkaan Status Perakuan Bomba Bagi Bangunan Kerajaan & Swasta</div>
                <div id="echartBar" style="height: 300px;"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title">Jumlah Premis Mengikut Kategori</div>
                <div id="echartPie" style="height: 300px;"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">


    </div>



    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body p-0">
                <h5 class="card-title m-0 p-3">Last 20 Day Leads</h5>
                <div id="echart3" style="height: 360px;"></div>
            </div>
        </div>
    </div>

</div>


@endsection

@section('page-js')
<script src="{{asset('assets/js/vendor/echarts.min.js')}}"></script>
<script src="{{asset('assets/js/es5/echart.options.min.js')}}"></script>
<script src="{{asset('assets/js/es5/dashboard.v1.script.js')}}"></script>

@endsection
