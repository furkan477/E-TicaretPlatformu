@extends('site.layout.layout')

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="text-center">E-Ticaret Platformu Sitesi Ürünleri</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row mb-5  mt-2">
            <div class="col-md-12">
              <form action="{{route('index')}}" method="get">
                <button type="submit" class="btn btn-warning">Kategoriye Göre Ürünleri Filtrele</button>
                <select class="text-center" style="width: 450px; height: 38px;" name="category_id">
                  <option value="0">Kategori Seçiniz</option>
                  @foreach ($categories as $category)
                    @include('undercategories', ['category' => $category , 'prefix' => ' '])
                  @endforeach
                </select>
              </form>
            </div>
          </div>
          <div class="row">
            @if (!empty($products))
              @foreach ($products as $product)
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                  <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                      {{$product->category->name}}
                    </div>
                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col-8">
                          <h2 class="lead"><b>{{$product->name}}</b></h2>
                          <p class="text-muted text-sm"><b>{{$product->description}}</b></p>
                        </div>
                        <div class="col-4 text-center">
                          <img src="{{$product->image_url}}" width="140" height="140"  alt="user-avatar" class="">
                        </div>
                      </div>
                    </div>
                    <div class="card-footer" style="display: flex; align-items: center;">
                      <b class="" style="margin-right: 10px; font-size: 1.5em; font-weight: bold;"><h3>{{$product->price}} ₺ </h3></b>
                      <a href="{{route('product.detail',$product->id)}}" type="submit" class="btn btn-info" style="margin-left: 140px; color: white; padding: 10px 40px; text-decoration: none; border-radius: 5px;"> Ürünü İncele </a>
                    </div>
                  </div>
                </div>
              @endforeach
            @endif
          </div>
        </div>
      </div>

    </section>

@endsection