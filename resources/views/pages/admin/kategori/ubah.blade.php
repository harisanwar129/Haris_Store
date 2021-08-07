@extends('layouts.admin')

@section('title')
    Halaman Kategori
@endsection    



@section('content')
    
          <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Kategori</h2>
                <p class="dashboard-subtitle">
               Tambah Kategori
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                <div class="col-md-12">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as    $error)
                        <li>{{ $error }}</li>
                    @endforeach    
                    </ul>
                </div>
                @endif
                    <div class="card">
                        <div class="card-body">
                      <form action="{{route('kategori.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                      @method('PUT')
                      @csrf
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                              <label for="Nama Kategori">Nama Kategori</label>
                              <input type="text" name="nama" id="Nama Kategori" value="{{$item->nama}}" class="form-control" required>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                              <label for="Foto">Foto</label>
                              <input type="file" name="photo" id="Foto" class="form-control" >
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col text-right">
                          <button type="submit" class="btn btn-success px-5">
                            Simpan
                          </button>
                          </div>
                      </div>
                      </form>
                        </div>
                    </div>
                </div>
                </div>
              </div>
            </div>
          </div>

    @endsection

    