@extends('admin.layout.layout')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">İletişim Mesajları</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">id</th>
                                        <th>Ad Soyad</th>
                                        <th>Konu</th>
                                        <th>Mesaj</th>
                                        <th>Oluşturulma Tarihi</th>
                                        <th>Mesaj İşlemi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($contacts))
                                        @foreach($contacts as $contact)
                                            <tr>
                                                <td>{{$contact->id}}</td>
                                                <td><a href="{{route('admin.user.detail',$contact->user->id)}}">{{$contact->user->name}}</a></td>
                                                <td>{{$contact->subject}}</td>
                                                <td>{{$contact->message}}</td>
                                                <td>{{$contact->created_at}}</td>
                                                <td>
                                                    <a href="{{route('admin.contact.delete',$contact->id)}}" class="btn btn-danger" type="submit">Silmek</a>
                                                    <a href="{{route('admin.contact.edit',$contact->id)}}" class="btn btn-primary" type="submit">Düzenlemek</a>
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