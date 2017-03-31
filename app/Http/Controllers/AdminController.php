<?php
/**
 * Created by PhpStorm.
 * User: adi
 * Date: 3/31/17
 * Time: 6:40 PM
 */

namespace App\Http\Controllers;


class AdminController extends Controller
{
    public function getIndex()
    {
        return view('admin.index');
    }
}