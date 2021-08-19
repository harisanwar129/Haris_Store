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
                <h2 class="dashboard-title">My Account</h2>
                <p class="dashboard-subtitle">
                  Update your current profile
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="{{ route('beranda-atur-redirect','beranda-atur-pengguna') }}" method="POST" enctype="multipart/form-data" id="locations">
                      @csrf
                      <div class="card">
                        <div class="card-body">
                          <div class="row mb-2">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="name"> Nams</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="name"
                                  aria-describedby="emailHelp"
                                  name="name"
                                  value="{{ $user->name }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                  type="email"
                                  class="form-control"
                                  id="email"
                                  aria-describedby="emailHelp"
                                  name="email"
                                  value="{{ $user->email }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="alamat_1">Alamat 1</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="alamat_1"
                                  aria-describedby="emailHelp"
                                  name="alamat_1"
                                  value="{{ $user->alamat_1 }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="alamat_2">Alamat 2</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="alamat_2"
                                  aria-describedby="emailHelp"
                                  name="alamat_2"
                                  value="{{ $user->alamat_2 }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="provinces_id">Provinsi</label>
                                <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces" v-model="provinces_id">
                                  <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                                </select>
                                <select v-else class="form-control"></select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="regencies_id">Kota</label>
                                <select name="regencies_id" id="regencies_id" class="form-control" v-if="regencies" v-model="regencies_id">
                                  <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
                                </select>
                                <select v-else class="form-control"></select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="kode_pos">Kode Pos</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="kode_pos"
                                  name="kode_pos"
                                  value="{{ $user->kode_pos }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="negara">Negara</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="negara"
                                  name="negara"
                                  value="{{ $user->negara }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="no_hp">No_hp</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="no_hp"
                                  name="no_hp"
                                  value="{{ $user->no_hp }}"
                                />
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

    
    @push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    
    <script>
      var locations = new Vue({
      el: "#locations",
      mounted(){
        AOS.init();
        this.getProvincesData();
      },
      data:{
        provinces:null,
        regencies:null,
        provinces_id:null,
        regencies_id:null
      },
      methods:{
        getProvincesData(){
          var self = this;
          axios.get('{{ route('api-provinces') }}')
          .then(function (response) {
            self.provinces=response.data;
            
          })
        },
        getRegenciesData(){
          var self = this;
          axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
          .then(function (response) {
            self.regencies=response.data;
            
          })
        },
      },
      watch:{
        provinces_id:function(val,oldValue){
          this.regencies_id=null;
          this.getRegenciesData();
        }
      }
      });
    </script>
    @endpush