@extends('layouts.dashboard')

@section('title')
    Halaman Category
@endsection    



@section('content')
  <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Tambah Prouduk Baru</h2>
                <p class="dashboard-subtitle">
                  Buat Produk Kamu Di sini
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                        @foreach($errors->all() as    $error)
                            <li>{{ $error }}</li>
                        @endforeach    
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('beranda-produk-store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="Nama">Nama Produk</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="nama"
                                  aria-describedby="nama"
                                  name="nama"
                               
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="harga">Harga</label>
                                <input
                                  type="number"
                                  class="form-control"
                                  id="harga"
                                  aria-describedby="harga"
                                  name="harga"
                                
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="price">Kategori</label>
                                <select name="kategori_id" class="form-control">
                                  @foreach($categories as $categori)
                                  <option value="{{$categori->id}}">{{$categori->nama}}</option>
                                  @endforeach
                                  </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="thumbnails">Pilih Foto</label>
                                <input
                                  type="file"
                                  multiple
                                  class="form-control pt-1"
                                  id="photo"
                                  aria-describedby="photo"
                                  name="photo"
                                />
                                <small class="text-muted">
                                  Kamu dapat memilih lebih dari satu file
                                </small>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="description">Description</label>
                                <textarea
                                  name="deskripsi"
                                  id="editor"
                                  cols="30"
                                  rows="4"
                                  class="form-control"
                                >
                                </textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col">
                          <button
                            type="submit"
                            class="btn btn-success  px-5"
                          >
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
   

    @endsection

    @push('addon-script')
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
      <script>
              CKEDITOR.replace( 'editor' );
      </script>
  @endpush