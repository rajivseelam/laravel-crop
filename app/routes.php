<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('cropit');
});


Route::post('/', function()
{
	var_dump(Input::all()); 

	$imagePath = public_path('uploads/'.time().'.png');

	$parts = explode(',', Input::get('image-data'));

	$image =base64_decode($parts[1]);

	//dd($image);

	File::put($imagePath,$image);

	return Redirect::to('/');


	die;

	$imagePath = public_path('uploads/'.time().'.jpg');

	$image = Image::make(public_path('uploads/images.jpg'));

	$ratio = Input::get('scale');

	$image->fit(intval($image->width()*$ratio), intval($image->height()*$ratio))->save($imagePath);

	$imagePath = public_path('uploads/'.time().'.jpg');

	$image->crop(Input::get('w'),Input::get('h'),Input::get('x'),Input::get('y'))
		->save($imagePath);

	die;

	return Redirect::to('/');

});