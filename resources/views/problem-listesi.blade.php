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
                                <li><a href="ders-ekle">Ders Ekle</a></li>
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

                        <div class="col-md-12">
                            <table id="kullanici-listesi" class="display" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Ders</th>
                                    <th>Ünite</th>
                                    <th>Konu</th>
                                    <th>Senaryo</th>
                                    <th>Kim Yazdı</th>
                                    <th>Onay Sayısı</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Ders</th>
                                    <th>Ünite</th>
                                    <th>Konu</th>
                                    <th>Senaryo</th>
                                    <th>Kim Yazdı</th>
                                    <th>Onay Sayısı</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($problems as $problem)
                                    <tr>
                                        @foreach($problem->cats as $cat)
                                        <td>{{$cat->name}}</td>
                                        @endforeach
                                        <td>{{str_limit($problem->senaryo, 35)}}</td>
                                        <td>
                                            {{$problem->user->name}}
                                        </td>
                                        <td>{{$problem->onay_say}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
