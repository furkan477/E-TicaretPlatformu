@extends('site.layout.layout')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center">
            <h1>Profil Düzenleme</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">

            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <h3 class="profile-username text-center">{{$user->name}}</h3>

                <p class="text-muted text-center">{{$user->email}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Oluşturulan Sipariler</b> <a href="{{route('orders',Auth::id())}}" class="float-right">{{count($user->orders)}} Adet</a>
                  </li>
                  <li class="list-group-item">
                    <b>Sepetdeki Ürün SAyısı</b> <a href="{{route('cart.list',$user->id)}}" class="float-right">{{count($user->cards)}} Adet</a>
                  </li>
                  <li class="list-group-item">
                    <b>Yorumların</b> <b class="float-right">{{count($user->comments)}} Adet</b>
                    </li>
                </ul>
              </div>
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{$user->name}} Şikayet Mesajları</h3>
              </div>
              <div class="card-body">
                @foreach ($user->contacts as $contact)
                  <strong><i class="fas fa-message mr-1"></i>{{$contact->subject}}</strong>
                
                  <p class="text-muted">
                    {{$contact->message}}
                  </p>
                  <hr>

                @endforeach
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Adreslerim</a></li>
                  @if(count($user->address) >= 1)
                    <li class="nav-item"><a class="nav-link" href="#update" data-toggle="tab">Adresi Güncelle</a></li>
                  @else
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Yeni Adres Ekle</a></li>
                  @endif
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  @if(!empty($user->address))
                    @foreach($user->address as $address)
                      <div class="active tab-pane" id="activity">
                        <div class="post">
                          <div class="user-block">
                              <a href="#">{{$user->name}}</a>
                              <a href="#" class="float-right btn-tool"></a><br>
                                {{$user->email}} - {{$address->created_at}}
                          </div>
                          <p>
                            Adres 1 : {{$address->address_line1}}<br>
                            Adres 2 : {{$address->address_line2 ?? "ikinci adres seçilmedi"}}<br>
                            Ülke : {{$address->country}}<br>
                            Şehir : {{$address->city}}<br>
                            Posta Kodu : {{$address->posta_kodu}}<br>
                            Adres Durumu : {{$address->status == 0 ? 'Siparişler Bu Adrese Gelicek' : 'Sipariş Adresi İçin Aktif Değil'}}<br>
                          </p>
                          <a href="{{route('address.delete',$address->id)}}" class="btn btn-danger" style="width: 430px;" >Adresi Sil</a>
                        </div>
                      </div>
                    @endforeach
                  @elseif (empty($user->address))
                    <h3>Sipariş Vermek İçin Yeni Adresinizi Giriniz</h3>
                  @endif
                  @if(count($user->address) >= 1)
                    <div class="tab-pane" id="update">
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

                      @foreach ($user->address as $address)
                      
                        <form class="form-horizontal" action="{{route('address.update')}}" method="post">
                          @csrf
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Adres 1</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="address_line1" placeholder="Adres 1" value="{{$address->address_line1}}">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Adres 2 (ZD)</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="address_line2" placeholder="Adres 2" value="{{$address->address_line2 ?? 'Boş'}}">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Şehir</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="city" placeholder="Şehir" value="{{$address->city}}">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Ülke</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="country" placeholder="Ülke" value="{{$address->country}}">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Posta Kodu</label>
                            <div class="col-sm-10">
                              <input class="form-control" name="posta_code" placeholder="Posta Kodu" value="{{$address->posta_code}}">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-success" style="width: 350px;">Adresi Güncelle</button>
                            </div>
                          </div>
                        </form>
                      @endforeach
                    </div>
                  @else
                    <div class="tab-pane" id="settings">
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
                      <form class="form-horizontal" action="{{route('address')}}" method="post">
                        @csrf
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Adres 1</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="address_line1" placeholder="Adres 1">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Adres 2 (ZD)</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="address_line2" placeholder="Adres 2">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Şehir</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="city" placeholder="Şehir">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Ülke</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="country" placeholder="Ülke">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputExperience" class="col-sm-2 col-form-label">Posta Kodu</label>
                          <div class="col-sm-10">
                            <input class="form-control" name="posta_code" placeholder="Posta Kodu">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-success" style="width: 355px;">Adresi Ekle</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection