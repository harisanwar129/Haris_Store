@extends('layouts.admin')

@section('title')
    Halaman User
@endsection    



@section('content')
    
          <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">User</h2>
                <p class="dashboard-subtitle">
               Tambah User
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
                      <form action="{{route('user.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                      @method('PUT')
                      @csrf
                      <div class="row">
                       <div class="col-md-12">
                              <div class="form-group">
                              <label for="Nama User">Nama User</label>
                              <input type="text" name="name" id="Nama User" class="form-control" required value="{{$item->name}}">
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                              <label for="Email">Email</label>
                              <input type="email" name="email" id="Email" class="form-control" required value="{{$item->email}}">
                              </div>
                          </div>
                           <div class="col-md-12">
                              <div class="form-group">
                              <label for="Password">Password</label>
                              <input type="password" name="password" id="Password" class="form-control">
                              <span>Jangan Di Isi Jika Password tidak Di Ubah</span>
                              </div>
                          </div>
                           <div class="col-md-12">
                              <div class="form-group">
                              <label>Level</label>
                             <select name="roles" required class="form-control" >
                             <option value="{{$item->password}}">Tidak Diganti</option>
                             <option value="ADMIN" >ADMIN</option>
                             <option value="USER" >USER</option>
                             </select>
                              </div>
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

    