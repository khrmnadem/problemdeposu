<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\User;
use App\Problem;
use App\Lecture;
use App\Topic;
use App\Unite;
class AdminController extends Controller
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
        return view('yonetim');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['yonetici']);//sadece yoneticiler gorebilir
        return view('kullanici-ekle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=bcrypt($request->input('password'));
        $user->save();
        if($request->input('role')==1) {
            $user->roles()->attach(Role::where('name', 'ogretmen')->first());
        }elseif($request->input('role')==3){
            $user->roles()->attach(Role::where('name', 'hakem')->first());
        }
        return redirect('/kullanici-ekle');
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

    public function userList(Request $request){
        $request->user()->authorizeRoles(['yonetici']);//sadece yoneticiler gorebilir

        $users = User::with('roles')->with('problems')->get();

        return view('kullanici-listesi', array(
            'users'=>$users
        ));
    }

    public function problemList(Request $request){
        $request->user()->authorizeRoles(['yonetici']);
        $problems = Problem::with('user')->get();
        $dersler = Lecture::with('unites','topics');//dersleri topicler  ve unitelerle çektik
        return view('problem-listesi', array(
            'problems'=>$problems,
            'dersler'=>$dersler
        ));
    }
    
    public function createLecture(Request $request){
        $request->user()->authorizeRoles(['yonetici']);//sadece yoneticiler gorebilir
        return view('ders-ekle');
    }
    
    public function createUnite(Request $request){
        $request->user()->authorizeRoles(['yonetici']);//sadece yoneticiler gorebilir
        $dersler = Lecture::all();
        return view('unite-ekle', array(
            'dersler' => $dersler
        ));
    }
    
    public function createTopic(Request $request){
        $request->user()->authorizeRoles(['yonetici']);//sadece yoneticiler gorebilir
        $dersler = Lecture::all();
        $uniteler = Unite::all();
        return view('konu-ekle', array(
            'dersler'=>$dersler,
            'uniteler'=>$uniteler            
        ));
    }
    
    public function storeLecture(Request $request){
        $request->user()->authorizeRoles(['yonetici']);
        $lecture = new Lecture();
        $lecure->name = $request->input('ders_adi');
        $lecture->save();
        return redirect('/ders-ekle');
    }
    
    public function storeUnite(Request $request){
        $request->user()->authorizeRoles(['yonetici']);
        $unite = new Unite();
        $unite->name = $request->input('unite_adi');
        $unite->lecture_id = $request->input('unite_ders_secimi');
        $unite->save();
        return redirect('/unite-ekle');
    }
    
    public function storeTopic(Request $request){
        $request->user()->authorizeRoles(['yonetici']);
        $topic = new Topic();
        $topic->name = $request->input('konu_adi');
        $topic->unite_id = $request->input('konu_unite_secimi');
        $topic->lecture_id = $request->input('konu_ders_secimi');
        $topic->save();
        return redirect('/konu-ekle');
    }
}
