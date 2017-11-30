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
                    <div class="panel-heading">Genel Bakış</div>

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
