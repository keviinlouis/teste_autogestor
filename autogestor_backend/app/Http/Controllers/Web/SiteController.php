<?php
/**
 * Created by PhpStorm.
 * User: devmaker
 * Date: 19/07/18
 * Time: 11:26
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index()
    {
        return view('app');
    }
}