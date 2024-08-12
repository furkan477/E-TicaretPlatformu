@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Sepet Listeleme</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">id</th>
                                        <th>İsim Soyisim</th>
                                        <th>Ürün Adı</th>
                                        <th>Adeti</th>
                                        <th>Adet Fiyatı</th>
                                        <th>Adresi</th>
                                        <th>Toplam Tutarı</th>
                                        <th>Sepete Eklenme Tarihi</th>
                                        <th>Sipariş İşlemi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($cards))
                                        @foreach($cards as $card)
                                            <tr>
                                                <td>{{$card->id}}</td>
                                                <td><a href="{{route('admin.user.detail',$card->user->id)}}">{{$card->user->name}}</a></td>
                                                <td><a href="{{route('admin.product.detail',$card->products->id)}}">{{$card->products->name}}</a></td>
                                                <td>{{$card->quantity}}</td>
                                                <td>{{$card->products->price}} ₺</td>
                                                @foreach ($card->user->address as $address)
                                                    <td>{{$address->address_line1}}</td>
                                                @endforeach
                                                <td>{{$card->quantity * $card->products->price}} ₺</td>
                                                <td>{{$card->created_at}}</td>
                                                <td style="display: inline-flex;">
                                                    <a href="{{route('admin.card.delete',$card->id)}}" class="btn btn-danger" type="submit">Sil</a>
                                                    <a href="{{route('admin.card.edit',$card->id)}}" class="btn btn-primary" type="submit">Düzenle</a>
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