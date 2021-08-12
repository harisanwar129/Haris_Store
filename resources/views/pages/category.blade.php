@extends('layouts.app')

@section('title')
    Halaman Category
@endsection    



@section('content')
    <div class="page-content page-categories">
      <section class="store-trend-categories">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>Semua Kategori</h5>
            </div>
          </div>
          <div class="row">
            @php $incrementCategory = 0 @endphp
          @forelse($categories as $category)
            <div
              class="col-6 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="{{$incrementCategory+=100}}"
            >
              <a class="component-categories d-block" href="{{route('kategori-detail',$category->slug)}}">
                <div class="categories-image">
                  <img
                    src="{{Storage::url($category->photo)}}"
                    alt="Gadgets Categories"
                    class="w-100"
                  />
                </div>
                <p class="categories-text">
                  {{$category->nama}}
                </p>
              </a>
            </div>
                @empty
                <div class="col-12 text-center py-5"
                data-aos="fade-up"
                data-aos-delay="100">
                Kategori Tidak Tersedia
                </div>
              @endforelse
                  </div>
                </div>
      </section>
      <section class="store-new-products">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>Semua Products</h5>
            </div>
          </div>
          <div class="row">
         @php $incrementProduct = 0 @endphp
          @forelse($products as $product)
          <div
                      class="col-6 col-md-4 col-lg-3"
                      data-aos="fade-up"
                      data-aos-delay="{{$incrementProduct+=100}}"
                    >
                      <a class="component-products d-block" href="{{route('detail',$product->slug)}}">
                        <div class="products-thumbnail">
                          <div
                            class="products-image"
                            style="
                              @if($product->galleri->count())
                              background-image:url('{{Storage::url($product->galleri->first()->photo)}}')
                              @else
                              background-color:#eee
                              @endif
                            "
                          ></div>
                        </div>
                        <div class="products-text" style="text-align:center">
                          {{$product->nama}}
                        </div>
                        <div class="products-price" style="text-align:center">
                          {{$product->harga}}
                        </div>
                      </a>
                    </div>
                    @empty
                  <div class="col-12 text-center py-5"
                          data-aos="fade-up"
                          data-aos-delay="100">
                          Produk Tidak Tersedia
                          </div>
                    @endforelse
                  
            </div>
            <div class="row">
              <div class="col-12 mt-4">
              {{ $products->links() }}
              </div>
            </div>
        </div>
      </section>
    </div>
    @endsection