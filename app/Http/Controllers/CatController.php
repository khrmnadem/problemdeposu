<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Problem;
use App\Cat;
use App\User;

class CatController extends Controller
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
        $request->user()->authorizeRoles(['yonetici']);//sadece yoneticiler gorebilir
       
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //burada kategoriye göre problemler sıralanacak
        $kategoriler = Cat::where('id','=',$id)->with('problems')->get();
        return view('kategoriye-gore', array(
            'kategoriler'=>$kategoriler
        ));
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
    
    public function dersForm(Request $request){
        $request->user()->authorizeRoles(['yonetici']);//sadece yoneticiler gorebilir
        return view('ders-ekle');
    }
    public function uniteForm(Request $request){
        $request->user()->authorizeRoles(['yonetici']);//sadece yoneticiler gorebilir
        
        $dersler = Cat::where('type','=','Ders')->get();
        
        return view('unite-ekle', array(
            'dersler'=>$dersler
        ));
    }
    public function konuForm(Request $request){
        $request->user()->authorizeRoles(['yonetici']);//sadece yoneticiler gorebilir
        $uniteler = Cat::where('type','=','Ünite')->get();
        return view('konu-ekle', array(
            'uniteler'=>$uniteler
        ));
    }
    
    public function dersEkle(Request $request){
        $ders = new Cat();
        $ders->name = $request->input('ders_adi');
        $ders->type = 'Ders';
        $ders->parent_id = 0;
        $ders->save();
        redirect('ders-ekle');
    }
    public function uniteEkle(Request $request){
        $unite = new Cat();
        $unite->name = $request->input('unite_adi');
        $unite->type = 'Ünite';
        $unite->parent_id = $request->input('unite_ders_id');
        $unite->save();
        redirect('unite-ekle');
    }
    public function konuEkle(Request $request){
        $konu = new Cat();
        $konu->name = $request->input('konu_adi');
        $konu->type = 'Konu';
        $konu->parent_id = $request->input('konu_unite_id');
        $konu->save();
        redirect('konu-ekle');
    }
    
}
