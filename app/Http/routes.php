<?php

use App\Role;
use App\User;
use App\Category;
use App\Photo;

use Illuminate\Support\Facades\Auth;
/*
Pravim View-ove u admin 
Pravim model Role
U User modelu metoda role
make:auth
php artisan migrate
Pravim kontroler sa resursima
instaliraj node.js lekcija 191 edvin laravel
predjes na gulp.js koji kompajlira nekoliko falova css i js u jedan sto olaksava zahtev

https://laravel.com/docs/5.4/mix
laravel 5.4 gulp = webpack

spajanje css-a i jsa u gulpfile.js jquery uvek prvi ili ne radi JS;
https://laravel.com/docs/5.2/elixir








*/



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


/* 

make:auth

*/
Route::auth();

Route::get('/home', 'HomeController@index');



/* 
 kontroler sa resursima  smesten u admin middleware
*/


Route::group(['middleware'=>'admin'],function(){

	
	

	Route::resource('/admin/users','AdminUsersController');

	Route::resource('/admin/posts','AdminPostController');

 	Route::resource('admin/categories','AdminCategoryController');

	Route::resource('admin/media','AdminMediaController'); 

//Pravljenje rute 
// Route::get('admin/media/upload',['as'=>'admin.media.upload','uses'=>'AdminMediaController@store']);
// ['as'=>'admin.media.upload']  imen rute -- name u tabeli kada napravim resource rutu





});


Route::get('/admin', function(){ 
		return view('admin.index'); 
	});





Route::get('photo', function() {
    
 $photo = Photo::find(1);

return $photo->user->name;

});



