@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{$product->name}} Ürün Güncelleme</h3>
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
                    <form action="{{route('admin.product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputStatus1">Ürün Kategorisi</label>
                                <select id="inputStatus1" class="form-control custom-select" name="category_id">
                                    <option selected disabled>{{$product->category->name}}</option>
                                    @foreach ($categories as $category)
                                        @include('undercategories', ['category' => $category, 'prefix' => ''])
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Ürün Adı</label>
                                <input type="text" id="inputName" name="name" class="form-control" value="{{$product->name}}">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Ürün Açıklaması</label>
                                <textarea id="inputDescription" class="form-control" name="description"
                                    rows="4">{{$product->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputName1">Ürün Fiyatı</label>
                                <input type="text" id="inputName1" name="price" class="form-control" value="{{$product->price}}">
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Ürün Durumu</label>
                                <select id="inputStatus" class="form-control custom-select" name="status" value="{{$product->status}}">
                                    <option value="0">Satışta</option>
                                    <option value="1">Stokta Yok</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Resim Yükle</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile" value="{{$product->image_url}}">
                                        <label class="custom-file-label" for="exampleInputFile">Resim Seç</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
</section>
</div>

@endsection