@extends('site.layout.layout')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{route('order.process')}}" method="post">
                        @csrf
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Siparişlerim</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>Seç</th>
                                            <th>Adresiniz</th>
                                            <th>Ürün Adı</th>
                                            <th>Ürün Adeti</th>
                                            <th>Ürün Durumu</th>
                                            <th>Oluşturulma Tarihi</th>
                                            <th>Total Fiyatı</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @if($user->orders->isNotEmpty())
                                            @foreach ($user->orders as $order)
                                                <tr>
                                                    @foreach ($order->orderDetail as $or_detail)
                                                        <td><input type="radio" name="order_id" value="{{$order->id}}"></td>
                                                        @foreach ($user->address as $address)
                                                            <td>{{$address->address_line1}}...
                                                            <a href="{{route('profile',$order->user_id)}}"> adresi incele</a>
                                                            </td>
                                                        @endforeach
                                                        <td>{{$or_detail->products->name}}</td>
                                                        <td>{{$or_detail->quantity}}</td>
                                                        <td><span class="badge
                                                            @if ($order->status == 0)
                                                                badge-warning
                                                            @elseif ($order->status == 1)
                                                                badge-info
                                                            @elseif ($order->status == 2)
                                                                badge-success
                                                            @else
                                                                badge-danger
                                                            @endif
                                                            ">
                                                            @if ($order->status == 0)
                                                                Siparişiniz Beklemede
                                                            @elseif ($order->status == 1)
                                                                Siparişiniz Teslimatta
                                                            @elseif ($order->status == 2)
                                                                Siparişiniz Teslim Edildi
                                                            @else
                                                                Bilinmiyor
                                                            @endif
                                                        </span></td>
                                                        <td>
                                                            <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                                {{$order->created_at}}</div>
                                                        </td>
                                                        <td>{{$order->total_price}} ₺</td>
                                                    @endforeach

                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                            <button type="submit" name="action" value="delete" class="btn btn-sm btn-danger float-left">Seçili Ürünü İptal Et</button>
                            <button type="submit" name="action" value="detail" class="btn btn-sm btn-primary float-right">Seçili Ürünün Detayına
                                Git</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection