<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model{

    //指定表名
    protected $table = 'student';

    //指定id
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'age'];

    //不允许批量赋值
    protected $guarded = [];

    public $timestamps = true;

    protected function getDateFormat() {
        return time();
    }

    protected function asDateTime($val){
        return $val;
    }

}