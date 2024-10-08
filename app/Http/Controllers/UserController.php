<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class  UserController extends Controller{
   public function __construct(){

       // $this->middleware('checkage');
        $this->middleware('checkage')->only('index' , 'showname');
        $this->middleware('checkage')->except('suma');

   }

    public function index(){

        $name="Macarena";
        $apellido="Quijada";
        $edad=25;
        return view('example',['name'=>$name, 'apellido'=>$apellido, 'edad'=>$edad]);
    }

    public function showname($name){
        return view('example' , ['name' => $name]);
    }

    public function suma($num = 0){
        $b = 80;
        return $num +$b;
    }

}