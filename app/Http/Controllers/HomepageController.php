<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $currentTime = date('H:i:s');
        $hours = date('H');

        $lastProducts = ProductModel::orderByDesc('created_at')->take(6)->get();
        return view('welcome', compact('hours','currentTime','lastProducts'));
    }
}
