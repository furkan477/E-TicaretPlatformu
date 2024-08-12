@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Sipariş Güncelleme</h3>
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
                        <form action="{{route('admin.order.update', $order->id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Sipariş Durumu</label>
                                <select class="form-control custom-select" name="status" value="{{$order->status}}">
                                    <option value="0">Sipariş Beklemede</option>
                                    <option value="1">Teslimatta</option>
                                    <option value="2">Teslim Edildi</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inputName">Sipariş Adı</label>
                                        <input type="text" disabled class="form-control"
                                            value="{{$detail->products->name}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inputName">Sipariş Kullanıcı Adı</label>
                                        <input type="text" disabled class="form-control" value="{{$order->user->name}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inputName">Sipariş Adres</label>
                                        <input type="text" disabled class="form-control"
                                            value="{{$address->address_line1}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inputName">Ülke / Şehir</label>
                                        <input type="text" disabled class="form-control"
                                            value="{{$address->country . ' / ' . $address->city}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Sipariş Durumu</label>
                                        <select class="form-control custom-select" name="quantity"
                                            value="{{$order->quantity}}">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Sipariş Toplam Fiyatı</label>
                                        <input type="text" name="total_price" class="form-control" value="{{$order->total_price}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary">Siparişi Güncelle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection