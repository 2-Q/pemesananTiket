@extends('layouts.backend')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
<!--       <div class="col-sm-6">
        <h1>Data Unit Transportasi</h1>
      </div> -->
      <div class="col-sm-6">
        <ol class="breadcrumb"> <!-- float-sm-right -->
          <li class="breadcrumb-item active"><a href="/transportasi">Unit Transportasi</a></li>
          <li class="breadcrumb-item">Info</li>
          <!-- <li class="breadcrumb-item active">Fixed Layout</li> -->
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">

      <div class="col-12">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <div class="float-left">
             <h3>Riwayat Penggunaan {{$transportasi->nama}}</h3>
             <div style="font-size: 14px; color: #28a745;">
              Kelas {{$transportasi->kelas}} 
              - {{$transportasi->kursi}} kursi
             </div>
            </div>

            <div class="card-tools">              
              <a href="#" class="btn btn-outline-primary" onclick="event.preventDefault();
                  $(this).siblings('form').submit();">
                        <i class="fas fa-sync-alt"></i>
              </a>
              <form action="/sync" method="POST" class="d-none">
                  <input type="hidden" name="_token" value="uotWWGpnpWBzwcTDDKUEkvbImd0nwFoNMMNmLJ5T">
                  <input type="hidden" name="_method" value="POST">                      
              </form>
            </div>
          </div>
          <div class="card-body">

            <table id="example1" class="table table-hover table-condensed table-striped">
                <thead>
                <tr>
                  <th>Asal</th>
                  <th>Tujuan</th>
                  <th>Harga</th>
                  <th>Tools</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rute as $r)
                <tr>
                	<td>
                   <div>{{$r->asal}}</div>
                   <div style="font-size: 12px; color: #28a745;">{{$r->waktu_berangkat}}</div>
                  </td>
                	<td>
                    <div>{{$r->tujuan}}</div> 
                    <div style="font-size: 12px; color: #28a745;">{{$r->waktu_tiba}}</div>
                  </td>
                	<td>{{$r->harga}}</td>
                  <td>
                    <a href="{{ route('data_rute.edit', ['data_rute'=> $r->id]) }}">edit</a> |
                    <a class="text-danger" href="#"
                       onclick="event.preventDefault();
                                     $(this).siblings('form').submit();">
                        delete
                    </a>

                    <form action="{{ route('data_rute.destroy', ['data_rute'=> $r->id]) }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                  </td>
                </tr>
                @endforeach
	            </tbody>
	        </table>
          </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>






@endsection