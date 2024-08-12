@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
            <div class="row mt-5">

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-12 col-sm-7 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i
                                        class="fas fa-thumbs-up"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Yorum Sayısı</span>
                                    <span class="info-box-number">{{count($user->comments)}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-7 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i
                                        class="fas fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Sepetindeki Ürün Sayısı</span>
                                    <span class="info-box-number">{{count($user->cards)}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-7 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Sipariş Verilme Sayısı</span>
                                    <span class="info-box-number">{{count($user->orders)}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-7 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-phone"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Şikayet & İletişim Sayısı</span>
                                    <span class="info-box-number">{{count($user->contacts)}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">{{$user->name}} Kullanıcısı Hakkında</h3>
                        </div>
                        <div class="card-body">
                            <strong><i class="fa-brands fa-product-hunt mr-1"></i>Adı Soyadı</strong>

                            <p class="text-muted">{{$user->name}}</p>

                            <hr>

                            <strong><i class="fa-brands fa-product-hunt mr-1"></i>E-Postası</strong>

                            <p class="text-muted">{{$user->email}}</p>

                            <hr>

                            <strong><i class="fa-brands fa-product-hunt mr-1"></i>Kullanıcı Yetkisi</strong>

                            <p class="text-muted">{{$user->is_admin == 0 ? 'Kullanıcı' : 'Yönetici'}}</p>

                            <hr>

                            <strong><i class="fa-brands fa-product-hunt mr-1"></i>Kullanıcı Katılma Tarihi</strong>

                            <p class="text-muted">{{$user->created_at}}</p>

                            <hr>
                            @foreach ($user->address as $address)
                            
                                <strong><i class=" fa-brands fa-product-hunt mr-1"></i> Kullanıcı Adresi 1</strong>

                                <p class="text-muted">{{$address->address_line1}}</p>

                                <hr>

                                <strong><i class="fa-brands fa-product-hunt mr-1"></i> Kullanıcı Adresi 2</strong>

                                <p class="text-muted">{{$address->address_line2 == null ? 'İkinci Adres Girilmemiştir' : $address->address_line_2}}</p>

                                <hr>

                                <strong><i class="fa-brands fa-product-hunt mr-1"></i>Ülkesi</strong>

                                <p class="text-muted">{{$address->country}}</p>

                                <hr>

                                <strong><i class="fa-brands fa-product-hunt mr-1"></i>Şehiri</strong>

                                <p class="text-muted">{{$address->city}}</p>

                                <hr>

                                <strong><i class="fa-brands fa-product-hunt mr-1"></i>Posta Kodu</strong>

                                <p class="text-muted">{{$address->posta_code}}</p>

                                <hr>

                                <strong><i class="fa-brands fa-product-hunt mr-1"></i>Adres Oluşturma Tarihi</strong>

                                <p class="text-muted">{{$address->created_at}}</p>

                                <hr>

                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{$user->name}} Siparişleri</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">id</th>
                                        <th>Ürün Adı</th>
                                        <th>Ürün Durumu</th>
                                        <th>Ürün Adeti</th>
                                        <th>Ürün Fiyatı</th>
                                        <th>Total Fiyatı</th>
                                        <th>Oluşturulma Tarihi</th>
                                        <th>Ürün İşlemi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($user->orders))
                                        @foreach($user->orders as $order)
                                            <tr>
                                                @foreach ($order->orderDetail as $detail)
                                                    
                                                    <td>{{$order->id}}</td>
                                                    <td>{{$detail->products->name}}</td>
                                                    <td>
                                                        @if($order->status == 0)
                                                            Sipariş Beklemede
                                                        @elseif($order->status == 1)
                                                            Sipairş Teslimatta
                                                        @elseif($order->status)
                                                            Teslim Edildi
                                                        @endif

                                                    </td>
                                                    <td>{{$detail->quantity}}</td>
                                                    <td>{{$detail->products->price}} ₺</td>
                                                    <td>{{$order->total_price}} ₺</td>
                                                    <td>{{$order->created_at}}</td>
                                                    <td>
                                                        <a href="{{route('admin.order.delete', $order->id)}}" class="btn btn-danger"
                                                            type="submit">İptal Et</a>
                                                        <a href="{{route('admin.order.edit', $order->id)}}"
                                                            class="btn btn-primary" type="submit">Düzenlemek</a>
                                                    </td>

                                                @endforeach
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{$user->name}} Sepetindekiler</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">id</th>
                                        <th>Ürün Adı</th>
                                        <th>Ürün Adeti</th>
                                        <th>Ürün Fiyatı</th>
                                        <th>Oluşturulma Tarihi</th>
                                        <th>Sepet İşlemi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($user->cards))
                                        @foreach($user->cards as $card)
                                            <tr>
                                                <td>{{$card->id}}</td>
                                                <td>{{$card->products->name}}</td>
                                                <td>{{$card->quantity}}</td>
                                                <td>{{$card->quantity * $card->products->price}} ₺</td>
                                                <td>{{$card->created_at}}</td>
                                                <td>
                                                    <a href="{{route('admin.card.delete', $card->id)}}" class="btn btn-danger"
                                                        type="submit">Silmek</a>
                                                    <a href="{{route('admin.card.edit', $card->id)}}"
                                                        class="btn btn-primary" type="submit">Düzenlemek</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{$user->name}} İletişim Mesajları</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">id</th>
                                        <th>Konu</th>
                                        <th>Mesaj</th>
                                        <th>Oluşturulma Tarihi</th>
                                        <th>Yorum İşlemi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($user->contacts))
                                        @foreach($user->contacts as $contact)
                                            <tr>
                                                <td>{{$contact->id}}</td>
                                                <td>{{$contact->subject}}</td>
                                                <td>{{$contact->message}}</td>
                                                <td>{{$contact->created_at}}</td>
                                                <td>
                                                    <a href="{{route('admin.contact.delete', $contact->id)}}" class="btn btn-danger"
                                                        type="submit">Silmek</a>
                                                    <a href="{{route('admin.contact.edit', $contact->id)}}"
                                                        class="btn btn-primary" type="submit">Düzenlemek</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{$user->name}} Yorumları</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">id</th>
                                        <th>Ürün Görüntüle</th>
                                        <th>Yorum</th>
                                        <th>Puanı</th>
                                        <th>Oluşturulma Tarihi</th>
                                        <th>Yorum İşlemi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($user->comments))
                                        @foreach($user->comments as $comment)
                                            <tr>
                                                <td>{{$comment->id}}</td>
                                                <td>
                                                    <a href="{{route('admin.product.detail',$comment->products->id)}}" class="btn btn-info">Ürünü Görüntüle</a>
                                                </td>
                                                <td>{{$comment->comment}}</td>
                                                <td>{{$comment->rating}}</td>
                                                <td>{{$comment->created_at}}</td>
                                                <td>
                                                    <a href="{{route('comment.delete', $comment->id)}}" class="btn btn-danger"
                                                        type="submit">Silmek</a>
                                                    <a href="{{route('admin.comment.edit', $comment->id)}}"
                                                        class="btn btn-primary" type="submit">Düzenlemek</a>
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