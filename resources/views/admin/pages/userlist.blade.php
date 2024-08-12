@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kullanıcılar</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">id</th>
                                        <th>Adı Soyadı</th>
                                        <th>E-posta</th>
                                        <th>Yöneticilik</th>
                                        <th>Katılma Tarihi</th>
                                        <th>Kullanıcı İşlemi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($users))
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->is_admin == 0 ? 'Kullanıcı' : 'Yönetici'}}</td>
                                                <td>{{$user->created_at}}</td>
                                                <td>
                                                    <a href="{{route('admin.user.delete',$user->id)}}" class="btn btn-danger" type="submit">Silmek</a>
                                                    <a href="{{route('admin.user.detail',$user->id)}}" class="btn btn-primary" type="submit">Tüm Bilgileri</a>
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