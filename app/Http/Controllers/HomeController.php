<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\Maker;
use App\Models\Model;
use App\Models\FuelType;
use App\Models\CarType;
use App\Models\User;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(){

        return view("home.index");
    }
}
 