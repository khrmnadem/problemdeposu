@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Problemlerim</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="col-md-10 col-md-offset-1">
                        @foreach($datalist as $data)
                        <h4>{{$data->ders}}</h4>
                        <h5>{{$data->unite}}</h5>
                        <h6>{{$data->konu}}</h6>
                        <p>{{$data->senaryo}}</p>
                        @if($data->resim_yolu != 'storage/uploads/')
                        <img src="{{url($data->resim_yolu)}}" alt="Açıklama Resmi">
                        @endif
                        <p>{{$data->benzer}}</p>
                        <p>{{$data->kaynak}}</p>
                        <p>{{$data->malzeme}}</p>
                        <p>{{$data->iletisim_kaynaklari}}</p>
                        <p>{{$data->destek}}</p>
                        <a href="{{$data->link}}">{{$data->link}}</a>
                        <p>{{$data->keywords}}</p>
                        <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
