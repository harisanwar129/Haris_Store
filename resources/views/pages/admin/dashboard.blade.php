@extends('layouts.admin')

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
                <h2 class="dashboard-title">Dashboard</h2>
                <p class="dashboard-subtitle">
                  Look what you have made today!
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">
                          Pelanggan
                        </div>
                        <div class="dashboard-card-subtitle">
                          {{$pelanggan}}
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">
                          Pendapatan
                        </div>
                        <div class="dashboard-card-subtitle">
                       {{$pendapatan}}
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">
                        Transaksi
                        </div>
                        <div class="dashboard-card-subtitle">
                         {{$transaksi}}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
             
              </div>
            </div>
          </div>

    @endsection