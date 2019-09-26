<?php
use App\User;

// use Illuminate\Support\Facades\Input;
Illuminate\Support\Facades\Request::class;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::any ( '/search', function () {
    $q = Request::get ( 'q' );
    $user = User::where ( 'name', 'LIKE', '%' . $q . '%' )->get ();
    if (count ( $user ) > 0)
        return view ( 'welcome' )->withDetails ( $user )->withQuery ( $q );
    else
        return view ( 'welcome' )->withMessage ( 'No Details found. Try to search again !' );
} );

Route::get('/search','UsersController@search');
Route::get('/like/{id}', 'LikeController@like')->name('like');





// Route::get('/search','UsersController@search');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/welcome', 'HomeController@index')->name('welcome');





Route::resource('users', 'UsersController');



Route::post('/users.welcome', 'ProfileController@update')->name('users.update');
// Route::post('/profile', 'ProfileController@update')->name('profile.update');






// Route::group(['middleware' => 'auth'], function() {
	
// 	Route::resource('comments', 'CommentsController');



// });