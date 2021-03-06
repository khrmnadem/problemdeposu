<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Problem;
use App\Lecture;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['ogretmen','yonetici','hakem']);//bu sayfayı herkes görebilsin

        //Problemler veritabanından çekilecek
        $problems = new Problem();
        $id = Auth::id();
        $datalist = $problems->where('user_id', $id)->with(array('lecture', 'unite', 'topic'))->get();
        $dersler = Lecture::with(array('unites','topics'));
        if($id == 1){
            return redirect('yonetim');
        }else {
            return view('home', array(
                'datalist' => $datalist
            ));
        }
    }

    /* *Örneğin adminin görebileceği bir sayfayı şöyle oluşturabiliriz:*
    public function someAdminStuff(Request $request)
    {
      $request->user()->authorizeRoles('manager');
      return view(‘some.view’);
    }
    */
}
