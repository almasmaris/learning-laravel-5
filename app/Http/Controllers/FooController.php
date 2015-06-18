<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\FooRepository;
use Illuminate\Http\Request;

class FooController extends Controller {

//    private $repository;
//
//    public function __construct(FooRepository $repository)
//    {
//        $this->repository = $repository;
//    }


    //method injection
	public function foo(FooRepository $repository)
    {

//        $repository = new \App\Repositories\FooRepository();

//        return $this->repository->get();
          return $repository->get();

    }

}
