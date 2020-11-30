<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Services\CarService;
use Illuminate\Support\Facades\Log;


class CarController extends BaseController
{
	/**
     * Create a new controller instance.
     *
     * @param  CarRepository  $users
     * @return void
     */
    public function __construct(CarService $service)
    {
        $this->service = $service;
    }
    public function index()
        {
            return $this->sendSuccess($this->service->all());
        }

        public function store(CarRequest $request)
        {
            try
            {
                $user= request()->user();
                                                $data = $request->all ();
                return $this->sendSuccess($this->service->create($data));
            }
            catch (\Exception $e) {
                // log the error on file
                Log::error($e->getMessage());
                return $this->sendError("Une erreur est survenue de de l'ajout de: car , Veuiller contacter l'administrateur"   );
            }
        }

        public function show($id)
        {
            return $this->sendSuccess($this->service->find($id));
        }

        public function update(CarRequest $request, $id)
        {
            try
            {
                $user= request()->user();
                $data = $request->all ();
                $res = $this->service->update( $data, $id);
                if ($res) {
                    return $this->sendSuccess($res,'success');
                }
            } catch (\Exception $e) {
                    Log::error($e->getMessage());
                    return $this->sendError("Une erreur est survenue lors de la modification, Veuiller contacter l'administrateur");
            }
        }

        public function destroy($id)
        {
            try{
                $user= request()->user();
                $res = $this->service->delete($id);
                return $this->sendSuccess(null,'Suppression effectue avec succes');
            } catch (\Exception $e) {
                    Log::error($e->getMessage());
                    return $this->sendError("Une erreur est survenue lors de la modification, Veuiller contacter l'administrateur ");
            }
        }


}