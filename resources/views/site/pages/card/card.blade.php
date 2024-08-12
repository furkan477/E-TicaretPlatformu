@extends('site.layout.layout')

@section('content')

<section class="content mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Bilgi:</h5>
                    Sepetinizdeki Ürün Sayısı : {{count($user->cards)}}
                </div>
                <div class="invoice p-3 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i>
                                <small class="float-right"> Tarih : {{ date('Y.m.d')}}</small>
                            </h4>
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col-sm-6 invoice-col text-center">
                            <address>
                                @foreach ($authuser->address as $address)
                                    <strong>Varış Yeri Bilgileri</strong><br>
                                    İsim Soyisim : {{$authuser->name}}<br>
                                    Ülke : {{$address->country}}<br>
                                    Şehir : {{$address->city}}<br>
                                    Adres : {{$address->address_line1}}<br>
                                    Posta Kodu : {{$address->posta_code}}<br>
                                    İletişim E-Posta : {{$user->email}}
                                @endforeach
                            </address>
                        </div>
                        <div class="col-sm-6 invoice-col text-center">
                            <address>
                                @foreach ($user->address as $address)
                                    <strong>Çıkış Yeri Bilgileri</strong><br>
                                    Ülke : {{$address->country}}<br>
                                    Şehir : {{$address->city}}<br>
                                    Adres : {{$address->address_line1}}<br>
                                    Posta Kodu : {{$address->posta_code}}<br>
                                    İletişim E-Posta : {{$user->email}}
                                @endforeach
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Ürün ID</th>
                                        <th>Ürün Resmi</th>
                                        <th>Ürün Kategorisi</th>
                                        <th>Ürün İsmi</th>
                                        <th>Ürün Adeti</th>
                                        <th>Ürün Fiyatı</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($user->cards))
                                        @foreach($user->cards as $card)
                                            <?php $total = $card->products->price * $card->quantity ?>
                                            <tr>
                                                <td>{{$card->id}}</td>
                                                <td><img src="{{ asset('storage/' . $card->products->image_url) }}" width="150"
                                                        height="80" alt="user-avatar"></td>
                                                <td>{{$card->products->category->name}}</td>
                                                <td>{{$card->products->name}}</td>
                                                <td>{{$card->quantity}} Adet</td>
                                                <td>{{$total}} ₺</td>

                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p class="lead">Ödeme Methodları :</p>
                            <img src="https://adminlte.io/themes/v3/dist/img/credit/visa.png" alt="Visa">
                            <img src="https://adminlte.io/themes/v3/dist/img/credit/mastercard.png">
                            <img src="https://adminlte.io/themes/v3/dist/img/credit/american-express.png"
                                alt="American Express">
                            <img src="https://adminlte.io/themes/v3/dist/img/credit/paypal2.png" alt="Paypal">

                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                kredi kartına faiz , tek çekim ile bankanızdan indirim de kazanabilirsiniz , garanti
                                bankasıyla yapılan ödemelerde kart kesim ücreti yoktur.
                            </p>
                        </div>
                        <div class="col-6 text-center">
                            <p class="lead">Sepetin İşlemi Hakkında Bilgiler</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Toplam Tutar :</th>
                                        <td>{{$total ?? 0}} ₺</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row no-print">
                        <div class="col-12">
                            <form action="{{route('order.create')}}" method="post">
                                @csrf
                                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="{{ env('STRIPE_KEY') }}" data-amount="{{$totalprice * 100 ?? 0}}" data-name="E-Ticaret Platformu"
                                    data-description="Kart Bilgilerinizi Giriniz"
                                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                    data-locale="auto" data-currency="try">
                                </script>
                                <button type="submit" class="btn btn-success float-right"><i
                                        class="far fa-credit-card"></i>
                                    Ödemeye Geç
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection