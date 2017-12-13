@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel panel-heading">İşlemler</div>
                    <div class="panel panel-body">
                        <ul>
                            <li><a href="onay">Onay Bekleyen Problemler</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Onay Bekleyen Problemler</div>

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
                                    <th>Onayla</th>
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
                                    <th>Onayla</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($problems as $problem)
                                    <tr>
                                        <td>{{$problem->ders}}</td>
                                        <td>{{$problem->unite}}</td>
                                        <td>{{$problem->konu}}</td>
                                        <td>{{str_limit($problem->senaryo, 35)}}</td>
                                        <td>
                                            {{$problem->user->name}}
                                        </td>
                                        <td>{{$problem->onay_say}}</td>
                                        <td>
                                            @if(!$problem->onays->isEmpty())<!--Problem daha önce onaylandıysa-->
                                            @foreach($problem->onays as $onay)
                                                @if($onay->user_id == Auth::id())
                                                    <label class="label label-warning">Onaylandı</label>
                                                @else
                                                    <form action="onay" method="POST">
                                                        {{csrf_field()}}
                                                        <input type="submit" value="Problem ID: {{$problem->id}} -> Onayla" name="btnOnayla" class="btn btn-sm btn-success">
                                                    </form>
                                                @endif
                                            @endforeach
                                            @else<!--Problem daha önce onaylanmadıysa-->
                                                <form action="onay" method="POST">
                                                    {{csrf_field()}}
                                                    <input type="submit" value="Problem ID: {{$problem->id}} -> Onayla" name="btnOnayla" class="btn btn-sm btn-success">
                                                </form>
                                            @endif
                                        </td>
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
