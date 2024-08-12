@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
            <div class="row mt-5">

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-12 col-sm-7 col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i
                                        class="fa-solid fa-signal"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Sipariş Durumu</span>
                                    <span class="info-box-number">
                                        @if ($order->status == 0)
                                            Ürün Beklemede
                                        @elseif($order->status == 1)
                                            Ürün Siparişe Hazırlanmıştır ve Teslimatta
                                        @elseif($order->status == 2)
                                            Ürün Teslim Edilmiştir
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-7 col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-envelope"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Sipariş Teslim Alıcak Kişi İletişim</span>
                                    <span class="info-box-number">{{$order->user->email}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-7 col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fa-solid fa-signs-post"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Sipariş Adresin Posta Kodu</span>
                                    <span class="info-box-number">{{$address->posta_code}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Sipariş Hakkında</h3>
                        </div>
                        <div class="card-body">
                            <strong><i class="fa-brands fa-product-hunt mr-1"></i>Teslim Alıcak Kişi Ad</strong>

                            <p class="text-muted"><a href="{{route('admin.user.detail',$order->user->id)}}">{{$order->user->name}}</a></p>

                            <hr>

                            <strong><i class="fa-brands fa-product-hunt mr-1"></i>Sipairş Ürünün Adı</strong>

                            <p class="text-muted"><a href="{{route('admin.product.detail',$detail->products->id)}}">{{$detail->products->name}}</a></p>

                            <hr>

                            <strong><i class="fa-brands fa-product-hunt mr-1"></i> Siparişin Durumu</strong>

                            <p class="text-muted">
                                @if ($order->status == 0)
                                    Ürün Beklemede
                                @elseif($order->status == 1)
                                    Ürün Siparişe Hazırlanmıştır ve Teslimatta
                                @elseif($order->status == 2)
                                    Ürün Teslim Edilmiştir
                                @endif
                            </p>

                            <hr>

                            <strong><i class=" fa-brands fa-product-hunt mr-1"></i> Sipariş Adeti</strong>

                            <p class="text-muted">{{$detail->quantity}} Adet</p>

                            <hr>

                            <strong><i class="fa-brands fa-product-hunt mr-1"></i>Teslim Edilecek Mahalle</strong>

                            <p class="text-muted">{{$address->address_line1}}</p>

                            <hr>

                            <strong><i class="fa-brands fa-product-hunt mr-1"></i>Ülke Şehir</strong>

                            <p class="text-muted">{{$address->country.' / '.$address->city}}</p>

                            <hr>

                            <strong><i class="fa-brands fa-product-hunt mr-1"></i>Sipariş Total Fiyatı</strong>

                            <p class="text-muted">{{$order->total_price}} ₺</p>

                            <hr>

                            <strong><i class="fa-brands fa-product-hunt mr-1"></i> Sipariş Oluşturulma Tarihi</strong>

                            <p class="text-muted">{{$order->created_at}}</p>

                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection