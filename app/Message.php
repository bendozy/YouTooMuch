<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
	use SoftDeletes;

	/**
	 * The attributes that should be mutated to timestamps.
	 *
	 * @var  array
	 */
    public $timestamps = ['deleted_at'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'messages';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['message'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['deleted_at'];
}
