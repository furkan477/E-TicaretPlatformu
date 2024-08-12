@extends('site.layout.layout')

@section('content')

<section class="content">
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="col-12">
                        <img style="position: absolute; right: -77px;"
                            src="{{ asset('storage/' . $product->image_url) }}" width="850" height="600"
                            alt="user-avatar">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3 text-center mb-3">{{$product->name}}</h3>
                    <p class="text-center">{{$product->description}}</p>
                    <hr>
                    <h2 class="text-center"> {{$product->category->name}}</h2>
                    <h4 class="mt-3 text-center mt-5 mb-1"><small>Ürün Adeti Seçiniz En fazla 7 Tane Alabilirsiniz
                        </small></h4>
                    <form action="{{route('cart.add')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <select class="custom-select mt-3" name="quantity">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>
                        </div>
                        <div class="bg-gray py-2 px-3 mt-5">
                            <h2>
                                ürün adet fiyatı : {{$product->price}} ₺
                            </h2>
                        </div>
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <div>
                            <button href="" class="btn btn-success mt-2" type="submit"
                                style="text-align: left; width: 695px; height: 70px; line-height: 60px; font-size: 34px;"><i
                                    class="fas fa-cart-plus fa-lg mr-2"></i> Sepete Ekle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><br><br>

    <div class="container-fluid">
        <div class="row mt-5" style="height: 100px;">
            <section class="col-lg-12">
                <div class="card direct-chat direct-chat-primary">
                    <div class="card-header">
                        <h3 class="text-center"> {{$product->name}} Yorumları ve Değerlendirmeleri </h3>
                    </div>
                    <div class="card-body">
                        <div class="direct-chat-messages">
                            @if(!empty($product->comments))
                                @foreach ($product->comments as $cmt)
                                    @if(Auth::id() == $cmt->user->id)
                                        <div class="direct-chat-msg right">
                                            <a href="{{route('comment.delete',$cmt->id)}}" class="btn btn-danger" style="display: inline-block; width: 45px; height: 25px; font-size: 18px; text-align: center; line-height: 10px;">sil</a>
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-right">{{$cmt->user->name}}</span>
                                                <span class="direct-chat-timestamp float-left">{{$cmt->created_at}}</span>
                                            </div>
                                            <div class="direct-chat-text">
                                                {{$cmt->comment}}
                                            </div>
                                        </div>
                                    @else
                                        <div class="direct-chat-msg">
                                            <div class="direct-chat-infos clearfix"><br>
                                                <span class="direct-chat-name float-left">{{$cmt->user->name}}</span>
                                                <span class="direct-chat-timestamp float-right">{{$cmt->created_at}}</span>
                                            </div>
                                            <div class="direct-chat-text">
                                                {{$cmt->comment}}
                                            </div>
                                        </div><br>
                                    @endif

                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        @if ($errors)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif
                        @if (session()->get('success'))
                            <div class="alert alert-success">
                                {{session()->get('success')}}
                            </div>
                        @endif

                        @if (session()->get('error'))
                            <div class="alert alert-danger">
                                {{session()->get('error')}}
                            </div>
                        @endif
                        <form action="{{route('comment.create', $product->id)}}" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="comment" placeholder="Mesaj Yazın ..." class="form-control">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Gönder</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

@endsection