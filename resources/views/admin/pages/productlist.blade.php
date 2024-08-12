@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ürünler</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">id</th>
                                        <th>Adı</th>
                                        <th>Açıklaması</th>
                                        <th>Kategorisi</th>
                                        <th>Fiyatı</th>
                                        <th>Resim Adresi</th>
                                        <th>Durumu</th>
                                        <th>Yorum Sayısı</th>
                                        <th>Oluşturulma Tarihi</th>
                                        <th>Kategori İşlemi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($products))
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{$product->id}}</td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->description}}</td>
                                                <td>{{$product->category->name}}</td>
                                                <td>{{$product->price}}</td>
                                                <td>{{$product->image_url}}</td>
                                                <td>{{$product->status}}</td>
                                                <td>{{count($product->comments)}}</td>
                                                <td>{{$product->created_at}}</td>
                                                <td>
                                                    <a href="{{route('admin.product.delete',$product->id)}}" class="btn btn-danger" type="submit">Sil</a>
                                                    <a href="{{route('admin.product.edit',$product->id)}}" class="btn btn-primary" type="submit">Düzenle</a>
                                                    <a href="{{route('admin.product.detail',$product->id)}}" class="btn btn-info" type="submit">İncele</a>
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