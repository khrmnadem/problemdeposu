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
                        @foreach($data->cats as $cat)
                            @if($cat->type == "Ders")
                            <h4><b>Ders:</b> {{$cat->name}}</h4>
                            @endif
                            @if($cat->type == "Ünite")
                            <h5><b>Ünite:</b> {{$cat->name}}</h5>
                            @endif
                            @if($cat->type == "Konu")
                            <h6><b>Konu:</b> {{$cat->name}}</h6>
                            @endif
                        @endforeach
                        <p><b>Problem Senaryosu:</b> {{$data->senaryo}}</p>
                        @if($data->resim_yolu != 'storage/uploads/')
                        <b>Problem Resmi: </b><img class="thumbnail" src="{{url($data->resim_yolu)}}" alt="Açıklama Resmi">
                        @endif
                        <p><b>Benzer Problemler: </b>{{$data->benzer}}</p>
                        <p><b>Bilgi Kaynakları: </b>{{$data->kaynak}}</p>
                        <p><b>Çözümde Kullanılacak Malzemeler: </b>{{$data->malzeme}}</p>
                        <p><b>İletişim Kaynakları: </b>{{$data->iletisim_kaynak}}</p>
                        <p><b>Okul Dışı Destek Kanalları: </b>{{$data->destek}}</p>
                        <b>Problemi Daha İyi Açıklayan Bağlantılar: </b>
                            <?php $links = explode(',', $data->link); ?>
                        @foreach($links as $link)
                                <a href="{{$link}}">{{$link}}</a>
                        @endforeach
                        <br>
                        <b>Anahtar Kelimeler: </b>
                        <?php $keywords = explode(',', $data->keywords)?>
                        @foreach($keywords as $keyword)
                                <label class="label label-warning">{{$keyword}}</label>
                        @endforeach
                        <br><br>
                        <a href="duzenle/{{$data->id}}" class="btn btn-primary">Problemi Düzenle</a>
                        <a href="sil/{{$data->id}}" class="btn btn-danger">Problemi Sil</a>
                        <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
