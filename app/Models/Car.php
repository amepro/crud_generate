<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Car
 * 
 * @property int $id
 * @property string $model
 * @property int $year
 *
 * @package App\Models
 */
class Car extends Model
{
	protected $table = 'car';
	public $timestamps = false;

	protected $casts = [
		'year' => 'int'
	];

	protected $fillable = [
		'model',
		'year'
	];
}
