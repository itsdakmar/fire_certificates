@extends('layouts.master')
@section('before-css')

@endsection

@section('main-content')
    <div class="row">
        <div class="col-lg-10 mb-3">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h3 class="card-title mt-3">Daftar Premis Baharu</h3>
                </div>
                    <form action="{{ route('premise.store') }}" method="POST" >
                    @csrf
                        @include('premise.form')
                    </form>
            </div>
        </div>
    </div>

@endsection
