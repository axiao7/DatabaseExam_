<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Student;

class StudentController extends Controller {

    public function test1 () {
        // $student = DB::select('select * from student where id > ?', 
        //     [1001]
        // );
        // // var_dump($student);
        // dd($student);

        // $bool = DB::insert('insert into student(name, age) values(?, ?)', 
        //     ['imooc', 19]
        // );
        // var_dump($bool);

        // $num = DB::update('update student set age = ? where name = ?', 
        //     [20, 'lwx']
        // );
        // var_dump($num);

        DB::delete('delete from student where id > ?', 
            [1001]
        );
    }

    public function query1 () {
        // $bool = DB::table('student')->insert(
        //     ['name' => 'imooc', 'age' => 18]
        // );
        // var_dump($bool);

        // $id = DB::table('student')->insertGetId(
        //     ['name'=>'lwx', 'age'=>18]
        // );
        // var_dump($id);

        // $bool = DB::table('student')->insert([
        //     ['name'=>'name1', 'age'=>18],
        //     ['name'=>'name2', 'age'=>21]
        // ]);
        // var_dump($bool);
    }

    public function query2 () {
        // $num = DB::table('student')
        //     ->where('id', 1003)
        //     ->update(
        //         ['age'=>30]
        //     );
        // var_dump($num);

        // $num = DB::table('student')->increment('age');
        // $num = DB::table('student')->increment('age', 3);

        // $num = DB::table('student')->decrement('age');
        // $num = DB::table('student')->decrement('age', 3);

        // $num = DB::table('student')
        //         ->where('id', 1003)
        //         ->decrement('age', 3, ['name' => 'iimooc']);
        // var_dump($num);

    }

    public function query3 () {
        // $num = DB::table('student')
        //     ->where('id', 1006)
        //     ->delete();

        // $num = DB::table('student')
        //     ->where('id', '>=', 1004)
        //     ->delete();

        DB::table('student')->truncate();
        // var_dump($num);
    }


    public function query4 () {
        // $bool = DB::table('student')->insert([
        //     ['id' => 1001, 'name' => 'name1', 'age' => 18],
        //     ['id' => 1002, 'name' => 'name2', 'age' => 18],
        //     ['id' => 1003, 'name' => 'name3', 'age' => 19],
        //     ['id' => 1004, 'name' => 'name4', 'age' => 20],
        //     ['id' => 1005, 'name' => 'name5', 'age' => 21],
        // ]);
        // var_dump($bool);

        // $students = DB::table('student')
        //             ->orderBy('id', 'desc')
        //             ->first();

        // $students = DB::table('student')
        //             ->where('id', '>=', 1002)
        //             ->get();

        // $students = DB::table('student')
        //             ->whereRaw('id >= ? and age > ?', [1001, 18])
        //             ->get();

        // $names = DB::table('student')
        //             ->pluck('name');

        // $names = DB::table('student')
        //             ->lists('name', 'id');

        // $students = DB::table('student')
        //     ->select('id', 'name', 'age')
        //     ->get();

        // echo "<pre>";
        // DB::table('student')
        //     ->chunk(2, function ($student) {
        //         var_dump($student);
        //         return false;
        //     });
        // dd($students);
    }

    public function query5() {
        // $num = DB::table('student')->count();
        // $max = DB::table('student')->max('age');
        // $mini = DB::table('student')->min('age');
        // $avg = DB::table('student')->avg('age');
        $sum = DB::table('student')->sum('age');
        var_dump($sum);
    }

    public function orm1 () {

        // $students = Student::all();

        // $student = Student::find(1001);

        // $student = Student::findOrFail(1006);


        // dd($student);
        // var_dump($student);

        // $students = Student::get();

        // $student = Student::where('id', '>=', 1001)
        //             ->orderBy('age', 'desc')
        //             ->first();

        // echo '<pre>';
        // Student::chunk(2, function($students){
        //     var_dump($students);
        // });

        // $num = Student::count();
        $max = Student::where('id', '>=', 1001)->max('age');
        var_dump($max);

        // var_dump($students);
        // dd($student);
    }

    public function orm2 () {
        // $student = new Student();
        // $student->name = 'sean2';
        // $student->age = 20;
        // $bool = $student->save();

        // $students = Student::find(1008);
        // echo date('Y-m-d H:i:s', $students->created_at);

        // $student = Student::create(
        //     ['name' => 'imooc', 'age' => 18]
        // );
        // dd($student);

        // $student = Student::firstOrCreate(
        //     ['name' => 'imoocs']
        // );

        $student = Student::firstOrNew(
            ['name' => 'imoocsss']
        );
        $bool = $student->save();
        dd($bool);
    }

    public function orm3 () {

        // $student = Student::find(1012);
        // $student->name = 'kitty';
        // $bool = $student->save();
        // var_dump($bool);

        $num = Student::where('id', '>', 1010)->update(
            ['age' => 41]
        );
        var_dump($num);
    }

    public function orm4 () {

        // $student = Student::find(1012);
        // $bool = $student->delete();
        // dd($bool);

        // $num = Student::destroy(1011);
        // $num = Student::destroy(1009, 1010);
        // $num = Student::destroy([1007, 1008]);
        // dd($num);

        // $num = Student::where('id', '>=', 1004)->delete();
        // var_dump($num);
    }

    public function section1 () {
        // $students = Student::get();
        $students = [];
        $name = 'lwx';
        $arr = ['lwx', 'imooc'];
        return view('student.section1', [
            'name' => $name,
            'arr' => $arr,
            'students' => $students
        ]);
    }

    public function urlTest () {
        return 'urlTest';
    }






}