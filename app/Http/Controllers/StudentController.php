<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Student;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


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

    public function upload (Request $request) {
        if($request->isMethod('POST')){
            // var_dump($_FILES);
            $file = $request->file('source');
            // dd($file);
            //文件是否上传成功
            if($file->isValid()){

                //文件信息
                $originalname = $file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                $type = $file->getClientMimeType();
                $realPath = $file->getRealPath();
                $filename = date('Y-m-d-H-m-s').'-'.uniqid().'.'.$ext;
                $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
                var_dump($bool);

            }
            exit;
        }
        return view('student.upload');
    }

    public function mail () {
//        Mail::raw('佩奇，你好', function ($message){
//            $message->from('liuwenxi77@163.com', '小7');
//            $message->subject('嘿嘿');
//            $message->to('648515044@qq.com');
//        });
        Mail::send('student.mail', [
            'name' => 'lwx',
            'age' => 23,
//            'student' => $student
        ], function ($message){
            $message->subject('阔以');
            $message->to('974820947@qq.com');
        });

    }

    public function cache1 () {
//        Cache::put('key1', 'val1', 10);

//        $bool = Cache::add('key2', 'val2', 10);
//        var_dump($bool);

//        Cache::forever('key3', 'val3');

//        if (Cache::has('key1')){
//            $val = Cache::get('key1');
//            var_dump($val);
//        } else {
//            echo 'No';
//        }
    }
    public function cache2 () {

//        $val = Cache::get('key3');
//        var_dump($val);

//        $val = Cache::pull('key3');
//        var_dump($val);

//        $bool = Cache::forget('key1');
//        var_dump($bool)
    }

    public function error () {

        $student = null;
        if($student == null){
            abort('503');
        }
        return view('student.error');
    }

    public function request1 (Request $request) {

//        echo $request->input('sex', '未知');

//        if ($request->has('name')){
//            echo $request->input('name');
//        } else {
//            echo '无该参数';
//        }

//        $req = $request->all();
//        dd($req);

//        echo $request->method();

//        if ($request->isMethod('GET')){
//            echo 'YES';
//        } else {
//            echo 'NO';
//        }

//        $bool = $request->ajax();
//        var_dump($bool);

//        $bool = $request->is('student/*');//判断请求路径是否符合特定格式
//        var_dump($bool);
        echo $request->url();
    }

    public function session1 (Request $req) {

        //http request session
//        $req->session()->put('key1', 'value1');

        //session 辅助函数
//        session()->put('key2', 'value2');

        //session 类
//        Session::put('key3', 'value3');

//        //以数组的形式存储数据
//        Session::put(['key4' => 'value4']);

//        //把数据放到session中
//        Session::push('student', 'lwx');
//        Session::push('student', 'imooc');

//        $res = Session::get('student', 'default');
//        var_dump($res);

//        //暂存数据
//        Session::flash('key-flash', 'val-flash');



    }

    public function session2 (Request $req) {

//        echo $req->session()->get('key1');

//        echo session()->get('key2');

//        //获取session的值
//        echo Session::get('key4', 'default');

//        echo Session::get('key4', 'default');

//        $res = Session::get('student', 'default');
//        var_dump($res);

//        //取出数据并删除
//        $res = Session::pull('student', 'default');
//        var_dump($res);

//        $res = Session::all();
//        dd($res);

//        //判断session中某个key是否存在
//        if (Session::has('key11')){
//            $res = Session::all();
//            dd($res);
//        } else {
//            echo '额';
//        }

//        //删除session中指定key
//        dd(Session::all());
//        Session::forget('key2');
//        dd(Session::all());

//        //清空所有session
//        Session::flush();

//        //获取session所有数据
//        dd(Session::all());

//        echo Session::get('key-flash');

        return Session::get('message', '暂无信息');
//        return 'session2';

    }

    public function response () {

//        $data = [
//            'errCode' => 0,
//            'errMsg' => 'success',
//            'data' => 'lwx'
//        ];
////        var_dump($data);
//
//        //响应json
//        return response()->json($data);

//        //重定向
//        return 'session2';
//        return redirect('session2')->with('message', '我是快闪数据');

//        return redirect()->action('StudentController@session2')
//                ->with('message', '我是快闪数据');

//        //route()
//        return redirect()->route('session2')
//                ->with('message', '我是快闪数据');

//        //返回上个页面
//        return redirect()->back();

    }



}