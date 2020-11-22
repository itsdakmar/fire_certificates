@extends('layouts.master')
@section('before-css')

@endsection

@section('main-content')
    @include('components.breadcrumb',[
        $breadcrumbs = [
            'Maklumat Rujukan'
        ]
    ])
    <div class="separator-breadcrumb border-top"></div>

    <div class="row">
        <div class="col-lg-10 mb-3">
            <div class="card">
              <div class="card-body">
                  <ol>
                      <li>Rutin <b>notifikasi</b> yang dihantar melalui e-mel adalah seperti berikut:<br>
                          <ul>
                              <li>3 bulan sebelum tarikh tamat tempoh.</li>
                              <li>1 bulan sebelum tarikh tamat tempoh.</li>
                              <li>Pada tarikh tamat tempoh.</li>
                          </ul>

                      </li><br/>

                      <li>Jadual bagi <b>Kod & Kategori</b>.<br><br>
                          <div class="table-responsive col-8">
                              <table class="display table table-striped table-bordered">
                                  <thead>
                                  <tr class="text-center font-weight-bold">
                                      <th scope="col">Kod</th>
                                      <th scope="col">Kategori</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($categories as $category)
                                      <tr>
                                          <td class="text-center">{{ $category->id }}</td>
                                          <td>{{ $category->name }}</td>
                                      </tr>
                                  @endforeach

                                  </tbody>
                              </table>
                          </div>
                      </li>

                      <li>Jadual bagi nama <b>Balai & Zon</b>. <br><br>
                          <div class="table-responsive col-10">
                              <table class="display table table-striped table-bordered">
                                  <thead>
                                  <tr class="text-center font-weight-bold">
                                      <th scope="col">Nama Balai</th>
                                      <th scope="col">Alamat</th>
                                      <th scope="col">Zon</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($offices as $office)
                                      <tr>
                                          <td>{{ $office->name }}</td>
                                          <td>{{ $office->address_1 }} {{ $office->address_2 }}</td>
                                          <td class="text-center">{{ $office->zone->name }} </td>
                                      </tr>
                                  @endforeach

                                  </tbody>
                              </table>
                          </div>
                      </li>
                  </ol>
              </div>
            </div>
        </div>
    </div>

@endsection
