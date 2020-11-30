<?php

namespace App\Services;
use App\Repositories\CarRepository;

class CarService extends BaseService
{
    function __construct(CarRepository $repository){
		$this->repository=new $repository;
		
	}
}