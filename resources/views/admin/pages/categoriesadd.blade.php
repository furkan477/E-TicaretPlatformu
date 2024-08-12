@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Kategori Ekleme</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
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
                        <form action="{{route('admin.categories.create')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Kategporisi</label>
                                <select type="submit" class="form-control custom-select" name="category_id">
                                    <option value="0">Ana Kategori</option>
                                    @foreach ($categories as $category)
                                        @include('undercategories', ['category' => $category, 'prefix' => ''])
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Kategori Adı</label>
                                <input type="text" id="inputName" name="name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="inputStatus">Ürün Durumu</label>
                                <select id="inputStatus" class="form-control custom-select" name="status">
                                    <option value="0">Yayında</option>
                                    <option value="1">Yayında Yok</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary">Kategori Ekle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection