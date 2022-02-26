<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;




class Person extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer|min:0|max:150',
    );

    public function getData()
    {
        // viewで利用できる関数を設定している
        return $this->id . ' / ' . $this->name . ' / ' . $this->age;
    }

    public function board()
    {
        // viewで利用できる関数を設定している
        return $this->hasOne(Board::class);
    }

    public function boards()
    {
        return $this->hasMany(Board::class);
    }

    
}
