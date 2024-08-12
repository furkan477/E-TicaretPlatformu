@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{$comment->user->name}} Yorumunu Güncelleme</h3>
                    </div>
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
                    <form action="{{route('admin.comment.update', $comment->id)}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputDescription">Yorum</label>
                                <textarea id="inputDescription" class="form-control" name="comment"
                                    rows="4">{{$comment->comment}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Yorum Durumu</label>
                                <select id="inputStatus" class="form-control custom-select" name="status"
                                    value="{{$comment->status}}">
                                    <option value="0">Yayında</option>
                                    <option value="1">Incelemeye Al</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-12 col-12 mt-2">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>Yorumun Bulunduğu Ürün Detay Sayfasına Git</h3>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('admin.product.detail',$comment->product_id)}}" class="small-box-footer">Ürünü incele<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
</div>
</section>
</div>

@endsection