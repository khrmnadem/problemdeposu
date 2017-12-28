@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Problem Ekle</div>

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
                            <form class="form-horizontal" action="problem-ekle" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="col-md-10 col-md-offset-1">
                                <div class="form-group">
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
                                </div>
                                <div class="form-group">
                                    <label for="senaryo-baslik">Problem Senaryosunun Başlığı</label>
                                    <input class="form-control" type="text" name="senaryo-baslik" id="senaryo_baslik">
                                </div>
                                <div class="form-group">
                                    <label for="senaryo">Problem Senaryosu</label>
                                    <textarea class="form-control" name="senaryo-icerik" id="senaryo" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="benzer">Benzer Problemler</label>
                                    <small>Bu probleme benzer problemlerin başlıklarını yazınız.</small>
                                    <textarea name="benzer" id="benzer" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="kaynak">Bilgi Kaynakları</label>
                                    <small>Bu problemi çözerken öğrencinin kullanabileceği bilgi kaynakları.</small>
                                    <textarea name="bilgi-kaynak" id="kaynak" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="malzeme">Bilişsel Araçlar</label>
                                    <small>Bu problemin çözümünde kullanılacak malzemeler nelerdir?</small>
                                    <textarea name="bilissel-araclar" id="malzeme" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="malzeme">Öğretmenin Bu Problemdeki Rolü</label>
                                    <small>Öğretmen bu problemde öğrenciye hangi role bürünerek yardımcı olacak?</small>
                                    <select name="ogretmen-rol" id="">
                                        <option value="Model" selected>Model Olma</option>
                                        <option value="Bilişsel Koç">Bilişsel Koç Olma</option>
                                        <option value="Öğretimsel Destek">Öğretimsel Destek Olma</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="iletisim-kaynak">İletişim ve İşbirliği Araçları</label>
                                    <small>Öğrencilerin birbirleriyle ve öğretmenleriyle iletişim ve işbirliği yaparken kullanabileceği platformlar. (Google Drive gibi)</small>
                                    <textarea name="iletisim-isbirligi-araclar" id="iletisim-kaynak" cols="30" rows="10"
                                              class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="destek">Okul Dışı Destek Kanalları</label>
                                    <small>Problemin çözümünde kullanılabilecek okul dışı destek kanalları neler? (İnternet bağlantıları vb.)</small>
                                    <textarea name="destek-kanal" id="destek" cols="30" rows="10"
                                              class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="resim">Açıklama Resmi</label>
                                    <small>Problemi daha iyi açıklayan bir resim ekleyin.</small>
                                    <input class="form-control" type="file" name="resim">
                                </div>
                                <div class="form-group">
                                    <label for="link">Problemi Açıklayan Linkler</label>
                                    <small>Problemi daha iyi açıklayan internet bağlantılarını virgülle ayırarak ekleyiniz.</small>
                                    <textarea name="link" id="link" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="keywords">Anahtar Kelimeler</label>
                                    <small>Probleme uygun anahtar kelimeler nelerdir? Her anahtar kelimeyi virgülle ayırarak yazınız.</small>
                                    <textarea name="keywords" id="keywords" cols="30" rows="10"
                                              class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input class="form-control btn btn-success" type="submit" name="ekle" value="Kaydet">
                                </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection