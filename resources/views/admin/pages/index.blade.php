@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-center">E-Ticaret Platformu Geniş Özeti</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{count($user)}} Adet</h3>

                            <p>Toplam Kullanıcılarımız</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{route('admin.user.list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{count($order)}} Adet</h3>

                            <p>Toplam Alınan Siparişlerimiz</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('admin.order.list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{count($card)}} Adet<sup style="font-size: 20px"></sup></h3>

                            <p>Toplam Sepetdeki Ürün</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{route('admin.card.list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{count($comment)}} Adet</h3>

                            <p>Tüm Yorumların Toplamı</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-comment"></i>
                        </div>
                        <a href="{{route('admin.comment.list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{count($contact)}} Adet</h3>

                            <p>Toplam İletişim Desteği Alanlar</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-message"></i>
                        </div>
                        <a href="{{route('admin.contact.list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{count($product)}} Adet</h3>

                            <p>Toplam Elimizde Var Olan Ürünler</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-message"></i>
                        </div>
                        <a href="{{route('admin.product.list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection