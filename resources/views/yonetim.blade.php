@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(Auth::id() == 1)
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel panel-heading">İşlemler</div>
                        <div class="panel panel-body">
                            <ul>
                                <li><a href="ders-ekle">Ders Ekle</a></li>                                <li><a href="ders-ekle">Ders Ekle</a></li>
                                <li><a href="unite-ekle">Ünite Ekle</a></li>
                                <li><a href="konu-ekle">Konu Ekle</a></li>
                                <li><a href="kullanici-ekle">Kullanıcı Ekle</a></li>
                                <li><a href="kullanici-listesi">Kullanıcı Listesi</a></li>
                                <li><a href="problem-listesi">Problem Listesi</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Yönetim</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="col-md-10 col-md-offset-1">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
