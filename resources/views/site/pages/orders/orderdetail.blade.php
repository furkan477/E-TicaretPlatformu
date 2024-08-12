@extends('site.layout.layout')

@section('content')

<section class="content">

    <!-- Default box -->
    <div class="card mt-5">
        <div class="card-header">
            <h3 class="card-title">Sipariş Detayı</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
                    @foreach ($order->orderDetail as $detail)

                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Siparişin Durumu</span>
                                        <span class="info-box-number text-center text-muted mb-0">
                                            @if($order->status == 0)
                                                Siparişiniz Beklemede
                                            @elseif($order->status == 1)
                                                Siparişiniz Teslimatta
                                            @elseif($order->status == 2)
                                                Siparişiniz Teslim Edilmiştir
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Sipariş Adeti</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">{{$detail->quantity}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Sipariş Total Fiyatı</span>
                                        <span class="info-box-number text-center text-muted mb-0">{{$order->total_price}}
                                            ₺</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-12 order-1 order-md-2 mt-5">
                            <h3 class="text-primary text-center"> Sipariş {{$detail->products->name}}</h3>
                            <p class="text-muted mt-3 text-center">{{$detail->products->description}}</p>
                            <br>
                            <div class="text-muted">
                                <div class="row">
                                    <div class="col-12 col-sm-2">
                                        <p class="text-sm">Ürün Kategorisi
                                            <b class="d-block">{{$detail->products->category->name}}</b>
                                        </p>
                                    </div>
                                    <div class="col-12 col-sm-2">
                                        <p class="text-sm">Ürün Fiyatı
                                            <b class="d-block">{{$detail->price}} ₺</b>
                                        </p>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <p class="text-sm">Varış Yeri
                                        @foreach ($order->user->address as $address)
                                            <b class="d-block">{{$address->address_line1}}</b>
                                            <b class="d-block">{{$address->country}} / {{$address->city}}</b>
                                            <b class="d-block">Posta Kodu : {{$address->posta_code}}</b>
                                            <a href="">Adresi Güncelle</a>
                                        @endforeach
                                        </p>
                                    </div>
                                    <div class="col-12 col-sm-2">
                                        <p class="text-sm"> Alıcı İsim Soyisim
                                            <b class="d-block">{{$order->user->name}}</b>
                                        </p>
                                    </div>
                                    <div class="col-12 col-sm-2">
                                        <p class="text-sm">Sipariş Verilme Tarihi
                                            <b class="d-block">{{$order->created_at}}</b>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-5 mb-3">
                                <a href="{{route('order.delete',$order->id)}}" class="btn btn-sm btn-danger">Siparişi İptal Et</a>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>

</section>

@endsection