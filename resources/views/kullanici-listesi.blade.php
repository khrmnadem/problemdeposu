@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(Auth::id() == 1)
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel panel-heading">İşlemler</div>
                        <div class="panel panel-body">
                            <ul>
                                <li><a href="kullanici-ekle">Kullanıcı Ekle</a></li>
                                <li><a href="kullanici-listesi">Kullanıcı Listesi</a></li>
                                <li><a href="problem-listesi">Problem Listesi</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-md-8">
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
                                    <th>Ad</th>
                                    <th>E Posta</th>
                                    <th>Rol</th>
                                    <th>Problem Sayısı</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Ad</th>
                                    <th>E Posta</th>
                                    <th>Rol</th>
                                    <th>Problem Sayısı</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        @foreach($user->roles as $role)
                                        <td>{{$role->description}}</td>
                                        @endforeach
                                        <td>{{count($user->problems)}}</td>
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
