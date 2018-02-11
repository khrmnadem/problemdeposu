<?php

namespace App\Http\Controllers;

use App\Lecture;
use App\OgretmenRol;
use Illuminate\Http\Request;
use App\Problem;
use Illuminate\Support\Facades\Auth;
use App\Topic;
use App\Unite;

class ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['ogretmen','yonetici','hakem']);//bu sayfayı herkes görebilsin
        $dersler = Lecture::all();
        $uniteler = Unite::all();
        $konular = Topic::all();
        return view('problem-form', array(
            'dersler'=>$dersler,
            'uniteler'=>$uniteler,
            'konular'=>$konular
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //form validatin
        $this->validate($request,[
            'problem_ders_secimi'=>'required',
            'problem_unite_secimi'=>'required',
            'problem_konu_secimi'=>'required',
            'senaryo-baslik'=>'required',
            'bilgi-kaynak'=>'required',
            'bilissel-araclar'=>'required',
            'resim'=>'image|mimes:jpeg,jpg,png|max:2048'
        ],[
            'required' => 'Lütfen :attribute alanını boş bırakmayın.',
            'image|mimes:jpeg,jpg,png|max:2048' => 'Lütfen bir resim girin.',
        ]);
        //formdan gelen resim dosyasını storage\app\public\uploads klasörüne kaydet
        $name='';//dışarıdan da erişilebilmesi için ifin dışında tanımladım.
        if($request->hasFile('resim')){
            if($request->file('resim')->isValid('resim')){
                    $file = $request->file('resim');
                    $name = time() . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public\uploads', $name);
            }
        }

        //önce ders oluşturalım gelen ders adına göre
        //$ders=new Lecture();
        //$ders->name=$request->input('ders');
        //$ders->save();
        
        //unite oluşturalım
        //$unite=new Unite();
        //$unite->name=$request->input('unite');
        //$unite->lecture_id = Lecture::orderBy('updated_at', 'desc')->first()->id;
        //$unite->save();
        
        //konu oluşturalım
        //$konu=new Topic();
        //$konu->name=$request->input('konu');
        //$konu->lecture_id=Lecture::orderBy('updated_at', 'desc')->first()->id;
        //$konu->unite_id=Unite::orderBy('updated_at','desc')->first()->id;
        //$konu->save();
        
        //formdan gelen verileri veritabanına kaydedelim
        $problem=new Problem();
        $problem->user_id=Auth::id();
        //önemli şeyler: son eklenen şeyi alıp problemin gerekli idlerine atıyor
        $problem->lecture_id=$request->input('problem_ders_secimi');
        $problem->unite_id=$request->input('problem_unite_secimi');
        $problem->topic_id=$request->input('problem_konu_secimi');

//        $problem->ders=$request->input('ders');
//        $problem->unite=$request->input('unite');
//        $problem->konu=$request->input('konu');

        $problem->senaryo_baslik=$request->input('senaryo-baslik');
        $problem->senaryo_icerik=$request->input('senaryo-icerik');
        $problem->benzer=$request->input('benzer');
        $problem->bilgi_kaynak=$request->input('bilgi-kaynak');
        $problem->bilissel_araclar=$request->input('bilissel-araclar');

        //ogretmen rolu kaydedelim
        $ogretmenrol=new OgretmenRol();
        $ogretmenrol->name=$request->input('ogretmen-rol');
        $ogretmenrol->save();

        $problem->iletisim_isbirligi_araclar=$request->input('iletisim-isbirligi-araclar');
        $problem->destek_kanal=$request->input('destek-kanal');
        $problem->resim_yolu=trim('storage/uploads/ ').$name;
        $problem->link=$request->input('link');
        $problem->onay_say=0;
        $problem->keywords=$request->input('keywords');
        //kaydetmeyi unutmayalım !!!!
        $problem->save();
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
