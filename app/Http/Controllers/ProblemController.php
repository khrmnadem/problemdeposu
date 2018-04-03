<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Problem;
use App\Cat;
use Illuminate\Support\Facades\Auth;

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
        $dersler = Cat::where('type','=','Ders')->get();
        $uniteler = Cat::where('type','=','Ünite')->get();
        $konular = Cat::where('type','=','Konu')->get();
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
            'senaryo'=>'required',
            'kaynak'=>'required',
            'malzeme'=>'required',
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
        //formdan gelen verileri veritabanına kaydedelim
        $problem=new Problem();
        $problem->user_id=Auth::id();
        //$problem->ders=$request->input('ders');
        //$problem->unite=$request->input('unite');
        //$problem->konu=$request->input('konu');        
        $problem->senaryo=$request->input('senaryo');
        $problem->benzer=$request->input('benzer');
        $problem->kaynak=$request->input('kaynak');
        $problem->malzeme=$request->input('malzeme');
        $problem->iletisim_kaynak=$request->input('iletisim-kaynak');
        $problem->destek=$request->input('destek');
        $problem->resim_yolu=trim('storage/uploads/ ').$name;
        $problem->link=$request->input('link');
        $problem->onay_say=0;
        $problem->keywords=$request->input('keywords');
        //kaydetmeyi unutmayalım !!!!
        $problem->save();
        
        $prob = Problem::orderBy('updated_at', 'desc')->first();
        $ders_id = $request->input('problem_ders');
        $unite_id = $request->input('problem_unite');
        $konu_id = $request->input('problem_konu');
        //dersle ilişkisi
        $cat_ders = Cat::where('id','=',$ders_id)->get();
        $prob->cats()->attach($cat_ders);
        //uniteyle ilişkisi
        $cat_unite = Cat::where('id','=',$unite_id)->get();
        $prob->cats()->attach($cat_unite);
        //Konuyla ilişkisi
        $cat_konu = Cat::where('id','=',$konu_id)->get();
        $prob->cats()->attach($cat_konu);
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
