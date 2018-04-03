<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Problem;
use App\Onay;
use Illuminate\Support\Facades\Auth;

class HakemController extends Controller
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
        $request->user()->authorizeRoles(['hakem']);//sadece hakemler gorebilir
        return view('hakem');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

    public function problemList(){
        //Problemler veritabanından çekilecek
        $problems = new Problem();
        $datalist = $problems->where('onay_say', '<', 2)->with('cats')->get();
        return view('onaylanacak-problemler', array('problems'=>$datalist));
    }

    public function onayla(Request $request){
        //onay butonuna basıldığında onay sayısı bir artsın
        $butondeger = $request->input('btnOnayla');
        //echo "<pre> ".$butondeger." </pre>";
        $parcabutondeger = explode('->', $butondeger);
        $problemid = $parcabutondeger[0];
        $id = explode(' ', $problemid);
        //echo $id[2];
        $onayla = $parcabutondeger[1];
        //echo $onayla;
        if(trim($onayla) == "Onayla"){
            $problem = Problem::find($id[2]);
            //echo $problem->onay_say;
            $onaysay = $problem->onay_say;
            $onaysay = $onaysay + 1;
            $problem->onay_say = $onaysay;
            $problem->save();

            //onay tablosuna giriş yapacak mı
            $onay = new Onay();
            $onay->user_id = Auth::id();
            $onay->problem_id = $id[2];
            $onay->save();
            return redirect('/onay');
        }else{
            echo 'else e düştük';
        }
    }
}
