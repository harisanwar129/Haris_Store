@extends('layouts.admin')

@section('title')
    Halaman Pengguna
@endsection    



@section('content')
    
          <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Pengguna</h2>
                <p class="dashboard-subtitle">
                List Dari Pengguna
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                        <a href="{{route('user.create')}}" class="btn btn-primary mb-3"> + Tambah Pengguna Baru</a>
                        <div class="table-responsive">
                          <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                          </table>
                          <tbody>
                          
                          </tbody>
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
<script>
var datatable =$('#crudTable').DataTable({
    processing:true,
    serverSide:true,
    ordering:true,
    ajax:{
      url: '{!! url()->current() !!}',
    },
    columns:[
      {data:'id',name:'id'},
      {data:'name',name:'name'},
      {data:'email',name:'email'},
      {data:'roles',name:'roles'},
      {
        data:'action',
        name:'action',
        orderable:false,
        searcable:false,
        width:'15%' 
      },
    ]
})
</script>

    @endpush