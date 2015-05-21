<?php
use App\Product;
use App\Review;
use App\Http\Controllers\Controller;

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::post('products/{slug}', array('before'=>'csrf', function($slug)
{
	$input = array(
		'comment' => Input::get('comment'),
		'rating'  => Input::get('rating')
	);
	// instantiate Rating model
	$review = new Review;

	// Validate that the user's input corresponds to the rules specified in the review model
	$validator = Validator::make( $input, $review->getCreateRules());

	// If input passes validation - store the review in DB, otherwise return to product page with error message 
	if ($validator->passes()) {
		$review->storeReviewForProduct($slug, $input['comment'], $input['rating']);
		return Redirect::to('products/'.$slug.'#reviews-anchor')->with('review_posted',true);
	}
	
	return Redirect::to('products/'.$slug.'#reviews-anchor')->withErrors($validator)->withInput();
}));

Route::group(['prefix' => 'profile/{id}', 'middleware' => 'App\Http\Middleware\EditMiddleWare'], function()
{
  Route::get('/', 'ProfileController@show');
  Route::get('/edit', 'ProfileController@edit');
  Route::post('/update', 'ProfileController@update');

});

Route::group(
	['prefix' => 'admin', 'middleware' => 'App\Http\Middleware\AdminMiddleWare', ],
	function() {
		Route::resource('products', 'Admin\ProductController');
		Route::resource('orders', 'Admin\OrderController');
	}
);

Route::get('/search', function(){
	$query = Input::only('search');

	$products = Product::whereRaw(
	    "MATCH(name, description) AGAINST(? IN BOOLEAN MODE)", 
	    array($query)
    )->get();

	return View::make('search', compact('products'));
});

Route::get('/add_cart/{value}', 'OrderController@addCart');
Route::get('/orders/delete', 'OrderController@destroy');
Route::resource('products', 'ProductController', ['only' => ['index', 'show']]);
Route::resource('orders', 'OrderController');

Route::model('Products', 'Product');

Route::bind('products', function($value, $route) {
	return App\Product::whereSlug($value)->first();
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
