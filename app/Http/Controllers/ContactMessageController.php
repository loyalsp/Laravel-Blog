<?php
/**
 * Created by PhpStorm.
 * User: adi
 * Date: 3/29/17
 * Time: 2:20 PM
 */

namespace App\Http\Controllers;


class ContactMessageController extends Controller
{
    public function getContactIndex()
    {
        return view ('frontend.other.contact');
    }

}