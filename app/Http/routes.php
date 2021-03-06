<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//基础路由
Route::get('basic1', function () {
    return 'Hello World!';
});
Route::post('basic2', function () {
    return 'Basic2';
});

//多请求路由
Route::match(['post', 'get'], 'multy1', function () {
    return 'multy1';
});
Route::any('multy2', function () {
    return 'multy2';
});

//路由参数
// Route::get('user/{id}', function ($id) {
//     return 'User-id-' . $id;
// });
// Route::get('user/{name?}', function ($name = null) {
//     return 'User-name' . $name;
// });
// Route::get('user/{name?}', function ($name = 'sean') {
//     return 'User-name-' . $name;
// });
// Route::get('user/{name?}', function ($name = 'sean') {
//     return 'User-name-' . $name;
// })->where('name', '[A-Za-z]+');
// Route::get('user/{id}/{name?}', function ($id, $name = 'sean') {
//     return 'User-id-' . $id. '-name-' . $name;
// })->where(['id'=>'[0-9]+', 'name'=>'[A-Za-z]+']);

//路由别名
// Route::get('user/member-center', ['as' => 'center', function () {
//     return route('center');
// }]);

//路由群组
Route::group(['prefix'=>'member'], function () {
    Route::get('user/center', ['as' => 'center', function () {
        return route('center');
    }]);
    Route::any('multy2', function () {
        return 'member-multy2';
    });
});


//路由中输出视图
Route::get('view', function () {
    return view('welcome');
});

//Route::get('member/info', 'MemberController@info');

// Route::any('member/info', ['uses' => 'MemberController@info']);

// Route::any('member/info', [
//     'uses' => 'MemberController@info',
//     'as' => 'memberinfo'
// ]);

Route::any('member/{id}', ['uses' => 'MemberController@info'])->where('id', '[0-9]+');

Route::any('test1', ['uses' => 'StudentController@test1']);

Route::any('query1', ['uses' => 'StudentController@query1']);

Route::any('query2', ['uses' => 'StudentController@query2']);

Route::any('query3', ['uses' => 'StudentController@query3']);

Route::any('query4', ['uses' => 'StudentController@query4']);

Route::any('query5', ['uses' => 'StudentController@query5']);

Route::any('orm1', ['uses' => 'StudentController@orm1']);

Route::any('orm2', ['uses' => 'StudentController@orm2']);

Route::any('orm3', ['uses' => 'StudentController@orm3']);

Route::any('orm4', ['uses' => 'StudentController@orm4']);

Route::any('section1', ['uses' => 'StudentController@section1']);

Route::any('url', ['as' => 'url', 'uses' => 'StudentController@urlTest']);

Route::any('upload', 'StudentController@upload');

Route::any('mail', 'StudentController@mail');

Route::any('cache1', 'StudentController@cache1');

Route::any('cache2', 'StudentController@cache2');

Route::any('error', 'StudentController@error');

Route::any('request1', 'StudentController@request1');

Route::group(['middleware' => ['web']], function () {

    Route::any('session1', 'StudentController@session1');

    Route::any('session2', [
        'as' => 'session2',
        'uses' => 'StudentController@session2'
    ]);

});

Route::any('response', 'StudentController@response');


Route::any('activity0', 'StudentController@activity0');

Route::group(['middleware' => ['activity']], function () {

    Route::any('activity1', 'StudentController@activity1');

    Route::any('activity2', 'StudentController@activity2');

});













Route::auth();

Route::get('/home', 'HomeController@index');
