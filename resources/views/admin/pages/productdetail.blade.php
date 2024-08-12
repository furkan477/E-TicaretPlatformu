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
                                        class="fas fa-thumbs-up"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Yorum Sayısı</span>
                                    <span class="info-box-number">{{count($product->comments)}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-7 col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i
                                        class="fas fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Sepete Eklenme Sayısı</span>
                                    <span class="info-box-number">{{count($product->carts)}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-7 col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Sipariş Verilme Sayısı</span>
                                    <span class="info-box-number">{{count($product->orderDetail)}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">{{$product->name}} Ürünü Hakkında</h3>
                        </div>
                        <div class="card-body">
                            <strong><i class="fa-brands fa-product-hunt mr-1"></i> Ürün Adı</strong>

                            <p class="text-muted">{{$product->name}}</p>

                            <hr>

                            <strong><i class="fa-brands fa-product-hunt mr-1"></i> Ürün Açıklması</strong>

                            <p class="text-muted">{{$product->description}}</p>

                            <hr>

                            <strong><i class="fa-brands fa-product-hunt mr-1"></i> Ürün Kategorisi</strong>

                            <p class="text-muted">{{$product->category->name}}</p>

                            <hr>

                            <strong><i class=" fa-brands fa-product-hunt mr-1"></i> Ürün Fiyatı</strong>

                            <p class="text-muted">{{$product->price}} ₺</p>

                            <hr>

                            <strong><i class="fa-brands fa-product-hunt mr-1"></i> Ürün İmage Url</strong>

                            <p class="text-muted">{{$product->image_url}}</p>

                            <hr>

                            <strong><i class="fa-brands fa-product-hunt mr-1"></i> Ürün Durumu</strong>

                            <p class="text-muted">{{$product->status == 0 ? 'Satışta' : 'Stok depolanıyor'}}</p>

                            <hr>

                            <strong><i class="fa-brands fa-product-hunt mr-1"></i> Ürün Oluşturulma Tarihi</strong>

                            <p class="text-muted">{{$product->created_at}}</p>

                            <hr>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Yorumları</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">id</th>
                                        <th>Adı Soyadı</th>
                                        <th>Product ID</th>
                                        <th>Yorum</th>
                                        <th>Puanı</th>
                                        <th>Oluşturulma Tarihi</th>
                                        <th>Yorum İşlemi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($product->comments))
                                        @foreach($product->comments as $comment)
                                            <tr>
                                                <td>{{$comment->id}}</td>
                                                <td><a href="{{route('admin.user.detail',$comment->user->id)}}">{{$comment->user->name}}</a></td>
                                                <td>{{$comment->products->id}}</td>
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