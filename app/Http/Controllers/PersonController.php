<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person; // Personモデルを呼び出せるようにする
use Carbon\Carbon;

class PersonController extends Controller
{
    //
    public function index(Request $request)
    {
        $items = Person::all();
        return view('person.index', ['items' => $items]);
    }
    
    public function find(Request $request)
    {
        return view('person.find', ['input' => '']);
    }


    public function search(Request $request)
    {
        $min = $request->input * 1;
        $max = $min + 10;
        $item = Person::ageGreaterThan($min)
            ->ageLessThan($max)
            ->first();
        $param = ['input'=>$request->input, 'item'=>$item];
        return view('person.find', $param);

    }
    
    public function add(Request $request)
    {
        return view('person.add');
    }

    public function create(Request $request)
    {
        $this->validate($request, Person::$rules);
        $person = new Person;
        $form = $request->all();
        $form['second_time'] = Carbon::now();
        // dd($form);
        unset($form['_token']);
        $person->fill($form)->save();
        return redirect('/person');
    }

    public function calc(Request $request)
    {
        $item =  carbon::now();
        $item2 = new Carbon('+233 minutes');
        $diff_hours = $item->diffInHours($item2);
        $diff_minutes = $item->diffInMinutes($item2);
        $diff_les_minutes = $diff_minutes - ($diff_hours * 60);
        dd($diff_hours, $diff_minutes, $diff_les_minutes);
        return view('person.calc', ['item' => $item, 'item2'=>$item2, 'diff_minutes'=>$diff_minutes]);
    }

    public function edit(Request $request)
    {
        $person = Person::find($request->id);
        // 今回はformとい名前でViewに返す
        return view('person.edit', ['form'=>$person]);
    }

    public function update(Request $request)
    {
        $this -> validate($request, Person::$rules);
        $person = Person::find($request->id);
        $form = $request->all();
        unset($form['__token']);
        $person->fill($form)->save();
        return redirect('/person');
    }

    public function delete(Request $request)
    {
        $person = Person::find($request->id);
        return view('person.del', ['form'=>$person]);
    }

    public function remove(Request $request)
    {
        Person::find($request->id)->delete();
        return redirect('/person');
    }


}
