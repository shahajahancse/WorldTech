<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\DynamicField;
use Validator;

class DynamicFieldController extends Controller
{
    function index()
    {
    	return view('dynamic_field');
    }
}
