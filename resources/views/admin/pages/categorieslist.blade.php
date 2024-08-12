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
                                        <th>Kategori Adı</th>
                                        <th>Cat_Ust ID</th>
                                        <th>Alt Kategorileri</th>
                                        <th>Oluşturulma Tarihi</th>
                                        <th>Kategori İşlemi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($categories))
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{$category->id}}</td>
                                                <td>{{$category->name}}</td>
                                                <td>{{$category->cat_ust}}</td>
                                                <td>
                                                    @foreach ($category->underCategory as $alt_cat)
                                                        {{$alt_cat->name}},<br>
                                                    @endforeach
                                                </td>
                                                <td>{{$category->created_at}}</td>
                                                <td>
                                                    <a href="{{route('admin.categories.delete',$category->id)}}" class="btn btn-danger" type="submit">Silmek</a>
                                                    <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-primary" type="submit">Düzenlemek</a>
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