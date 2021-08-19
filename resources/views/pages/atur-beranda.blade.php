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
                <h2 class="dashboard-title">Store Settings</h2>
                <p class="dashboard-subtitle">
                  Make store that profitable
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="{{ route('beranda-atur-redirect','beranda-atur-store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="storeName">Nama Toko</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="storeName"
                                  aria-describedby="emailHelp"
                                  name="nama_toko"
                                  value="{{ $user->nama_toko }}"
                                />
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="category">Category</label>
                                <select name="kategori_id" class="form-control">
                                  <option value="{{ $user->kategori_id }}">Tidak Diganti</option>
                                  @foreach($categories as $categori)
                                  <option value="{{$categori->id}}">{{$categori->nama}}</option>
                                  @endforeach
                                  </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="is_store_open">Store Status</label>
                                <p class="text-muted">
                                  Apakah saat ini toko Anda buka?
                                </p>
                                <div
                                  class="custom-control custom-radio custom-control-inline"
                                >
                                  <input
                                    class="custom-control-input"
                                    type="radio"
                                    name="status_toko"
                                    id="openStoreTrue"
                                    value="1"
                                   {{ $user->status_toko==1? 'checked':'' }}
                                  />
                                  <label
                                    class="custom-control-label"
                                    for="openStoreTrue"
                                    >Buka</label
                                  >
                                </div>
                                <div
                                  class="custom-control custom-radio custom-control-inline"
                                >
                                  <input
                                    class="custom-control-input"
                                    type="radio"
                                    name="status_toko"
                                    id="openStoreFalse"
                                    value="0"
                                    {{ $user->status_toko == 0 || $user->status_toko == NULL ? 'checked' :''  }}
                                  />
                                  <label
                                    makasih
                                    class="custom-control-label"
                                    for="openStoreFalse"
                                    >Tutup Sementara</label
                                  >
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col text-right">
                              <button
                                type="submit"
                                class="btn btn-success px-5"
                              >
                                Save Now
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

    @endsection