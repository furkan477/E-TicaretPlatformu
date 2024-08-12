@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kategoriler</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">id</th>
                                        <th>Kullancı Adı</th>
                                        <th>Ürün Adı</th>
                                        <th>Atılan Yorum</th>
                                        <th>Değerlendirme Puanı</th>
                                        <th>Durumu</th>
                                        <th>Oluşturulma Tarihi</th>
                                        <th>Yorum İşlemi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($comments))
                                        @foreach($comments as $comment)
                                            <tr>
                                                <td>{{$comment->id}}</td>
                                                <td><a href="{{route('admin.user.detail',$comment->user->id)}}">{{$comment->user->name}}</a></td>
                                                <td><a href="{{route('admin.product.detail',$comment->products->id)}}">{{$comment->products->name}}</a></td>
                                                <td>{{$comment->comment}}</td>
                                                <td>{{$comment->rating}}</td>
                                                <td>{{$comment->status}}</td>
                                                <td>{{$comment->created_at}}</td>
                                                <td>
                                                    <a href="{{route('comment.delete',$comment->id)}}" style="display: inline-block;" class="btn btn-danger" style="float: left;" type="submit">Sil</a>
                                                    <a href="{{route('admin.comment.edit',$comment->id)}}" style="display: inline-block;" class="btn btn-primary" style="float: left;" type="submit">Düzenle</a>
                                                    <a href="{{route('admin.product.detail',$comment->products->id)}}" style="display: inline-block;" class="btn btn-info" style="float: left;" type="submit">İncele</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-12 col-sm-7 col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i
                                        class="fas fa-thumbs-up"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Toplam Yorum Sayısı</span>
                                    <span class="info-box-number">{{count($comments)}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection