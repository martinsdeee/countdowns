<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Countdown extends Model {

	protected $fillable = ['title', 'slug', 'description', 'background_url', 'datetime', 'public', 'user_id'];

}
