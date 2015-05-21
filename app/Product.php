<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $table = 'products';

	public function reviews()
	{
    return $this->hasMany('App\Review');
	}

  public function recalculateRating($rating)
  {
  	$reviews = $this->reviews()->notSpam()->approved();
    $avgRating = $reviews->avg('rating');
		$this->rating_cache = round($avgRating, 1);
		$this->rating_count = $reviews->count();
  	$this->save();
  }

	public function orders()
  {
      return $this->belongsToMany('App\Order', 'product_name');
  }

}
