@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel panel-heading">Problem Detayı</div>
                    <div class="panel panel-body">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                @foreach($problem as $problem)
                                    @foreach($problem->cats as $cat)
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
                                    <p><b>Problem Senaryosu:</b> {{$problem->senaryo}}</p>
                                    @if($problem->resim_yolu != 'storage/uploads/')
                                        <b>Problem Resmi: </b><img class="thumbnail" src="{{url($problem->resim_yolu)}}" alt="Açıklama Resmi">
                                    @endif
                                    <p><b>Benzer Problemler: </b>{{$problem->benzer}}</p>
                                    <p><b>Bilgi Kaynakları: </b>{{$problem->kaynak}}</p>
                                    <p><b>Çözümde Kullanılacak Malzemeler: </b>{{$problem->malzeme}}</p>
                                    <p><b>İletişim Kaynakları: </b>{{$problem->iletisim_kaynak}}</p>
                                    <p><b>Okul Dışı Destek Kanalları: </b>{{$problem->destek}}</p>
                                    <b>Problemi Daha İyi Açıklayan Bağlantılar: </b>
                                    <?php $links = explode(',', $problem->link); ?>
                                    @foreach($links as $link)
                                        <a href="{{$link}}">{{$link}}</a>
                                    @endforeach
                                    <br>
                                    <b>Anahtar Kelimeler: </b>
                                    <?php $keywords = explode(',', $problem->keywords)?>
                                    @foreach($keywords as $keyword)
                                        <label class="label label-warning">{{$keyword}}</label>
                                    @endforeach
                                    <p><b>Yazar:</b> {{$problem->user->name}}</p>
                                    <p><b>Oluşturulma Zamanı:</b> {{$problem->created_at}}</p>
                                    <p><b>Düzenlenme Zamanı:</b> {{$problem->updated_at}}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection