@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Sipariş</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">id</th>
                                        <th>Teslim Alıcak Ad</th>
                                        <th>Ürün Adı</th>
                                        <th>Ürün Nerede</th>
                                        <th>Total Price</th>
                                        <th>Sipariş Verilme Tarihi</th>
                                        <th>Sipariş İşlemi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($orders))
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>{{$order->id}}</td>
                                                <td><a href="{{route('admin.user.detail',$order->user->id)}}">{{$order->user->name}}</a></td>
                                                @foreach($order->orderDetail as $detail)
                                                    <td><a href="{{route('admin.product.detail',$detail->products->id)}}">{{$detail->products->name}}</a></td>
                                                @endforeach
                                                <td>
                                                    @if($order->status == 0)
                                                        Ürün Beklemede
                                                    @elseif($order->status == 1)
                                                        Ürün Teslimatta
                                                    @elseif($order->status == 2)
                                                        Ürün Teslim Edildi
                                                    @endif
                                                </td>
                                                <td>{{$order->total_price}} ₺</td>
                                                <td>{{$order->created_at}}</td>
                                                <td>
                                                    <a href="{{route('admin.order.delete',$order->id)}}" class="btn btn-danger" type="submit">Beklemeye Al</a>
                                                    <a href="{{route('admin.order.edit',$order->id)}}" class="btn btn-primary" type="submit">Düzenle</a>
                                                    <a href="{{route('admin.order.detail',$order->id)}}" class="btn btn-info" type="submit">İncele</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection