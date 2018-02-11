@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ana Sayfa</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel panel-heading">Menü</div>
                    <div class="panel panel-body">
                        <ul>
                            @foreach($problems as $problem)
                            <li><a href="#">{{$problem->lecture->name}}</a>
                                <ul>
                                    <li>{{$problem->unite->name}}
                                        <ul>
                                            <li>{{$problem->topic->name}}</li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Tüm Problemler</div>

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
                                    <th>Problemi Gör</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Ders</th>
                                    <th>Ünite</th>
                                    <th>Konu</th>
                                    <th>Senaryo</th>
                                    <th>Kim Yazdı</th>
                                    <th>Problemi Gör</th>
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
                                        <td><a href="problem/{{$problem->id}}" class="btn btn-primary">Problemi Gör</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <pre>
                                {{$problems}}
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
