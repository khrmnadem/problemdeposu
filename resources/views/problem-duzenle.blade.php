@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Problem Düzenle</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(count($errors))
                            <div class="alert alert-danger">
                                <h4><b>HATA!</b></h4>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @foreach($problemler as $problem)
                            <form class="form-horizontal" action="{{$problem->id}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="col-md-10 col-md-offset-1">
                                <!--<div class="form-group">
                                    <label for="ders">Ders</label>
                                    <input class="form-control" type="text" name="ders" id="ders">
                                </div>
                                <div class="form-group">
                                    <label for="unite">Ünite</label>
                                    <input class="form-control" type="text" name="unite" id="unite">
                                </div>
                                <div class="form-group">
                                    <label for="konu">Konu</label>
                                    <input class="form-control" type="text" name="konu" id="konu">
                                </div>-->
                                
                                <div class="form-group">                            
                                    <label>Ders</label>
                                    <select name="problem_ders">
                                        @foreach($dersler as $ders)
                                        <option value="{{$ders->id}}">{{$ders->name}}</option>
                                        @endforeach
                                    </select>
                                    @foreach($problem->cats as $cat)
                                        @if($cat->type == "Ders")
                                        <small>Eski hali: {{$cat->name}}</small>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label>Ünite</label>
                                    <select name="problem_unite">
                                        @foreach($uniteler as $unite)
                                        <option value="{{$unite->id}}">{{$unite->name}}</option>
                                        @endforeach
                                    </select>
                                    @foreach($problem->cats as $cat)
                                        @if($cat->type == "Ünite")
                                        <small>Eski hali: {{$cat->name}}</small>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label>Konu</label>
                                    <select name="problem_konu">
                                        @foreach($konular as $konu)
                                        <option value="{{$konu->id}}">{{$konu->name}}</option>
                                        @endforeach
                                    </select>
                                    @foreach($problem->cats as $cat)
                                        @if($cat->type == "Konu")
                                        <small>Eski hali: {{$cat->name}}</small>
                                        @endif
                                    @endforeach
                                    
                                </div>
                                <div class="form-group">
                                    <label for="senaryo">Problem Senaryosu</label>
                                    
                                    <textarea class="form-control" name="senaryo" id="senaryo" cols="30" rows="10">{{$problem->senaryo}}</textarea>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="benzer">Benzer Problemler</label>
                                    <small>Bu probleme benzer problemlerin başlıklarını yazınız.</small>
                                    <textarea name="benzer" id="benzer" cols="30" rows="10" class="form-control">{{$problem->benzer}}</textarea>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="kaynak">Bilgi Kaynakları</label>
                                    <small>Bu problemi hazırlarken kullandığınız bilgi kaynakları</small>
                                    <textarea name="kaynak" id="kaynak" cols="30" rows="10" class="form-control">{{$problem->kaynak}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="malzeme">Kullanılacak Malzemeler</label>
                                    <small>Bu problemin çözümünde kullanılacak malzemeler nelerdir?</small>
                                    <textarea name="malzeme" id="malzeme" cols="30" rows="10" class="form-control">{{$problem->malzeme}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="iletisim-kaynak">İletişim Kaynakları</label>
                                    <small>Problemin çözümünde kullanılabilecek iletişim kaynakları neler? (Öğretmen mail adresi vb.)</small>
                                    <textarea name="iletisim-kaynak" id="iletisim-kaynak" cols="30" rows="10"
                                              class="form-control">{{$problem->iletisim_kaynak}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="destek">Okul Dışı Destek Kanalları</label>
                                    <small>Problemin çözümünde kullanılabilecek okul dışı destek kanalları neler? (İnternet bağlantıları vb.)</small>
                                    <textarea name="destek" id="destek" cols="30" rows="10"
                                              class="form-control">{{$problem->destek}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Şu anki resim:</label>
                                    <img src="{{url($problem->resim_yolu)}}"/>
                                    <label for="resim">Açıklama Resmi</label>
                                    <small>Problemi daha iyi açıklayan bir resim ekleyin.</small>
                                    <input class="form-control" type="file" name="resim">
                                </div>
                                <div class="form-group">
                                    <label for="link">Problemi Açıklayan Linkler</label>
                                    <small>Problemi daha iyi açıklayan internet bağlantılarını virgülle ayırarak ekleyiniz.</small>
                                    <textarea name="link" id="link" cols="30" rows="10" class="form-control">{{$problem->link}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="keywords">Anahtar Kelimeler</label>
                                    <small>Probleme uygun anahtar kelimeler nelerdir? Her anahtar kelimeyi virgülle ayırarak yazınız.</small>
                                    <textarea name="keywords" id="keywords" cols="30" rows="10"
                                              class="form-control">{{$problem->keywords}}</textarea>
                                </div>
                                <div class="form-group">
                                    <input class="form-control btn btn-success" type="submit" name="ekle" value="Kaydet">
                                </div>
                                
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection