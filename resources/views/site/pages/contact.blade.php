@extends('site.layout.layout')

@section('content')

<section class="content mt-5">
    <div class="card">
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
        <form action="{{route('contact.create')}}" method="post">
            @csrf
            <div class="card-body row">

                <div class="col-5 text-center d-flex align-items-center justify-content-center">
                    <div class="">
                        <h2>E-Ticaret<strong> Platform</strong></h2>
                        <p class="lead mb-5">İstanbul | Beşiktaş<br>
                            Telefon: +212 212 212 23
                        </p>
                    </div>
                </div>
                <div class="col-7">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputName">İsim Soyisim</label>
                                <input type="text" disabled id="inputName" class="form-control"
                                    value="{{$user->name}}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputEmail">E-Posta</label>
                                <input type="email" disabled id="inputEmail" class="form-control"
                                    value="{{$user->email}}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputSubject">Konu</label>
                        <input type="text" id="inputSubject" name="subject" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Mesaj</label>
                        <textarea id="inputMessage" class="form-control" name="message" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Mesajı Gönder">
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection