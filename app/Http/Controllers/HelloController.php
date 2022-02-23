<?php
// このファイルの名前空間
namespace App\Http\Controllers;

// 多分DBでのやりとりに使うRequerを標準で使える形にしている
use Illuminate\Http\Request;

// Controllerクラスを継承したメインのコントローラー
global $head, $style, $body, $end;
$head = '<html><head>';
$style = <<<EOF
<style>
    body {font-size: 16pt; color: #999;}
    h1 {font-size: 100pt; text-align: right; color: #eee;
    margin: -40px 0px -50px 0px;}
</style>
EOF;

$body = '</head><body>';
$end = '</body></html>';

function tag($tag, $txt){
    return "<{$tag}>" . $txt . "</{$tag}>";
}

class HelloController extends Controller
{
    //
    
    public function index() {
        global $head, $style, $body, $end;
            $html = $head . tag('title', 'Hello/Index') . $style . $body
                . tag('h1','Index') . tag('p','this is Index Page') 
                . '<a href="/hello/other">go to Other page</a>' 
                . $end;
        return $html;
    }

    public function other() {
        global $head, $style, $body, $end;
        $html = $head . tag('title', 'Hello/Other') . $style . $body
                . tag('h1','Other') . tag('p','this is Other Page') 
                . $end;
        return $html;
    }
}
