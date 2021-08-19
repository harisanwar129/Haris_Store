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
                <h2 class="dashboard-title">Shirup Marzan</h2>
                <p class="dashboard-subtitle">
                  Product Details
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
                    <form action="{{ route('beranda-produk-update',$products->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="name">Nama Produk</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="nama"
                                  aria-describedby="nama"
                                  name="nama"
                                  value="{{ $products->nama }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="harga">Harga</label>
                                <input
                                  type="number"
                                  class="form-control"
                                  id="harga"
                                  aria-describedby="harga"
                                  name="harga"
                                  value="{{ $products->harga }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="harga">Kategori</label>
                                <select name="kategori_id" class="form-control">
                                <option value="{{ $products->kategori_id }}">Tidak Diganti ({{ $products->kategori->nama }})</option>
                                  @foreach($categories as $categori)
                                  <option value="{{$categori->id}}">{{$categori->nama}}</option>
                                  @endforeach
                                  </select>
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
                                >{!! $products->deskripsi !!}
                                </textarea>
                              </div>
                            </div>
                            <div class="col">
                              <button
                                type="submit"
                                class="btn btn-success btn-block px-5"
                              >
                                Update Product
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                        @foreach ($products->galleri as $gallery)
                        <div class="col-md-4">
                          <div class="gallery-container">
                            <img
                              src="{{ Storage::url($gallery->photo ??'') }}"
                              alt=""
                              class="w-100"
                            />
                            <a class="delete-gallery" href="{{ route('beranda-produk-galleri-delete',$gallery->id) }}">
                              <img src="/images/icon-delete.svg" alt="" />
                            </a>
                          </div>
                        </div>
                            
                        @endforeach
                          <div class="col-12 mt-3">
                            <form action="{{ route('beranda-produk-galleri-upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="produk_id" value="{{ $products->id }}">
                            <input
                              type="file"
                              name="photo"
                              id="file"
                              style="display: none;"
                              multiple
                              onchange="form.submit()"
                            />
                            <button
                            type="button"
                              class="btn btn-secondary btn-block mt-3"
                              onclick="thisFileUpload();"
                            >
                             Tambah Foto
                            </button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
   

    @endsection

    @push('addon-script')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
      function thisFileUpload() {
        document.getElementById("file").click();
      }
    </script>
   <script>
     CKEDITOR.replace("editor");
   </script>
  @endpush