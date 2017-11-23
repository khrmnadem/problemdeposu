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
                            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
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
                                    <label for="senaryo">Problem Senaryosu</label>
                                    <textarea class="form-control" name="senaryo" id="senaryo" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="benzer">Benzer Problemler</label>
                                    <small>Bu probleme benzer problemlerin başlıklarını yazınız.</small>
                                    <textarea name="benzer" id="benzer" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="kaynak">Bilgi Kaynakları</label>
                                    <small>Bu problemi hazırlarken kullandığınız bilgi kaynakları</small>
                                    <textarea name="kaynak" id="kaynak" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="malzeme">Kullanılacak Malzemeler</label>
                                    <small>Bu problemin çözümünde kullanılacak malzemeler nelerdir?</small>
                                    <textarea name="malzeme" id="malzeme" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="iletisim-kaynak">İletişim Kaynakları</label>
                                    <small>Problemin çözümünde kullanılabilecek iletişim kaynakları neler? (Öğretmen mail adresi vb.)</small>
                                    <textarea name="iletisim-kaynak" id="iletisim-kaynak" cols="30" rows="10"
                                              class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="destek">Okul Dışı Destek Kanalları</label>
                                    <small>Problemin çözümünde kullanılabilecek okul dışı destek kanalları neler? (İnternet bağlantıları vb.)</small>
                                    <textarea name="destek" id="destek" cols="30" rows="10"
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
                                    <input class="form-control btn btn-primary" type="submit" name="ekle" value="Kaydet">
                                </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection