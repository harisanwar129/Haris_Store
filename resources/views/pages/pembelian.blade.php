@extends('layouts.app')

@section('title')
    Halaman Belanja
@endsection    



@section('content')
     <div class="page-content page-cart">
      <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Cart
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="store-cart">
        <div class="container">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 table-responsive">
              <table
                class="table table-borderless table-cart"
                aria-describedby="Cart"
              >
                <thead>
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name &amp; Seller</th>
                    <th scope="col">Price</th>
                    <th scope="col">Menu</th>
                  </tr>
                </thead>
                <tbody>
                  @php $harga_total=0 @endphp
                 @foreach ($carts as $cart )

                  <tr>
                    <td style="width: 25%;">
                      @if($cart->produk->galleri)
                      <img
                        src="{{ Storage::url($cart->produk->galleri->first()->photo) }}"
                        alt=""
                        class="cart-image"
                      />
                      @endif
                    </td>
                    <td style="width: 35%;">
                      <div class="product-title">{{ $cart->produk->nama }}</div>
                      <div class="product-subtitle">{{ $cart->produk->user->nama_toko }}</div>
                    </td>
                    <td style="width: 35%;">
                      <div class="product-title">{{ number_format($cart->produk->harga) }}</div>
                      <div class="product-subtitle">USD</div>
                    </td>
                    <td style="width: 20%;">
                      <form action="{{ route('pembelian-hapus', $cart->id) }}" method="POST">
                         @method('DELETE')
                        @csrf
                        <button type="submit"  class="btn btn-remove-cart">
                        Hapus
                      </button>
                      </form>
                    </td>
                  </tr>
             
                     @php $harga_total += $cart->produk->harga @endphp 
                 @endforeach
            
                </tbody>
              </table>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-4">Shipping Details</h2>
            </div>
          </div>
         <form action="{{ route('checkout') }}" id="locations" enctype="multipart/form-data" method="POST">
          @csrf
          <input type="hidden" name="harga_total" value="{{ $harga_total}}">
          <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
            <div class="col-md-6">
              <div class="form-group">
                <label for="alamat_1">Alamat 1</label>
                <input
                  type="text"
                  class="form-control"
                  id="alamat_1"
                  aria-describedby="emailHelp"
                  name="alamat_1"
                  value="Setra Duta Cemara"
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
                  value="Blok B2 No. 34"
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
                  value="40512"
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
                  value="Indonesia"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_hp">No Hp</label>
                <input
                  type="text"
                  class="form-control"
                  id="no_hp"
                  name="no_hp"
                  value="+628 2020 11111"
                />
              </div>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2>Payment Informations</h2>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="200">
            <div class="col-4 col-md-2">
              <div class="product-title">$10</div>
              <div class="product-subtitle">Country Tax</div>
            </div>
            <div class="col-4 col-md-3">
              <div class="product-title">$280</div>
              <div class="product-subtitle">Product Insurance</div>
            </div>
            <div class="col-4 col-md-2">
              <div class="product-title">$580</div>
              <div class="product-subtitle">Ship to Jakarta</div>
            </div>
            <div class="col-4 col-md-2">
              <div class="product-title text-success">{{ number_format($harga_total ?? 0) }}</div>
              <div class="product-subtitle">Total</div>
            </div>
            <div class="col-8 col-md-3">
              <button
               type="submit"
                class="btn btn-success mt-4 px-4 btn-block"
              >
                Checkout Now
              </button>
            </div>
          </div>
         </form>
        </div>
      </section>
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