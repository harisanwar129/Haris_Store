@extends('layouts.admin')

@section('title')
    Halaman Produk Galleri 
@endsection    



@section('content')
    
          <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Produk Galleri</h2>
                <p class="dashboard-subtitle">
                List Dari Produk Galleri
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                        <a href="{{route('produk-galleri.create')}}" class="btn btn-primary mb-3"> + Tambah Produk Galleri Baru</a>
                        <div class="table-responsive">
                          <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Produk</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                          </table>
                          <tbody></tbody>
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
      {data:'produk.nama',name:'produk.nama'},
      {data:'photo',name:'photo'},
   


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