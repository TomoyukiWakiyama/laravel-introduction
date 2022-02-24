<?php
// このファイルの名前空間
namespace App\Http\Controllers;

// 多分DBでのやりとりに使うRequerを標準で使える形にしている
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Controllerクラスを継承したメインのコントローラー
class HelloController extends Controller
{
    //
    
    public function index (Request $request) {

        return view('hello.index', ['message' => 'Hello!']);
    }

    public function post(Request $request){
        $msg = $request->msg;
        $data = ['msg' => 'こんにちは' . $msg . 'さん！'];
        return view('hello.index', $data);
    }
}
