@extends('layouts.admin')

@section('title')
    Halaman Produk
@endsection    



@section('content')
    
          <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Produk</h2>
                <p class="dashboard-subtitle">
               Tambah Produk
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
                      <form action="{{route('produk.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                              <label for="Nama Produk">Nama Produk</label>
                              <input type="text" name="nama" id="Nama Produk" class="form-control" required>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                              <label for="Pemilik">Pemilik</label>
                             <select name="users_id" class="form-control">
                             @foreach($users as $user)
                             <option value="{{$user->id}}">{{$user->name}}</option>
                             @endforeach
                             </select>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                              <label for="kategori">kategori</label>
                             <select name="kategori_id" class="form-control">
                             @foreach($categories as $categori)
                             <option value="{{$categori->id}}">{{$categori->nama}}</option>
                             @endforeach
                             </select>
                              </div>
                          </div>
                               <div class="col-md-12">
                              <div class="form-group">
                              <label for="Harga">Harga</label>
                             <input type="number" name="harga" class="form-control">
                              </div>
                          </div>
                                <div class="col-md-12">
                              <div class="form-group">
                              <label for="Deskripsi">Deskripsi</label>
                             <textarea type="text" name="deskripsi" id="editor" cols="30" rows="10"></textarea>
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

    @push('addon-script')
      <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
        <script>
                CKEDITOR.replace( 'editor' );
        </script>
    @endpush