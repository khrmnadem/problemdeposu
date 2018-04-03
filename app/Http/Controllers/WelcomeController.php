<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Problem;
use App\Onay;
use App\Cat;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index($parentId=0)
    {
        $cats = Cat::where('parent_id','=',$parentId)->with('problems')->get();
        
        echo "<ul class='menu' id='menu-ul'>";
            foreach($cats as $cat){
                echo "<li><a href='".url('kategori/'.$cat->id)."'>".$cat->name."</a></li>";
                $this->index($cat->id);
            }
        echo "</ul>";
        
        //Onay sayısı 2 den büyük ve eşit olanları datalist değişkenine aktar
        $datalist = Problem::where('onay_say', '>=', 2)->with('onays', 'cats')->get();
        return view('welcome', array(
            'problems'=>$datalist
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
}
