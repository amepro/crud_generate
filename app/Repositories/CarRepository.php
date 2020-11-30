<?php

namespace App\Repositories;

use App\Models\Car;

class CarRepository extends BaseRepository implements BaseRepositoryInterface
{
    function __construct(){
		$this->model=new Car();
	}
}