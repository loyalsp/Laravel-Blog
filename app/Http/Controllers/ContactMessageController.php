<?php
/**
 * Created by PhpStorm.
 * User: adi
 * Date: 3/29/17
 * Time: 2:20 PM
 */

namespace App\Http\Controllers;

use App\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use App\Events\MessageSent;


class ContactMessageController extends Controller
{
    public function getContactIndex()
    {
        return view('frontend.other.contact');
    }

    public function postContactMessage(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'subject' => 'required|max:25',
            'email' => 'required',
            'message' => 'required|min:10',
        ]);
        $message = new ContactMessage();
        $message->sender = $request['name'];
        $message->body = $request['message'];
        $message->subject = $request['subject'];
        $message->email = $request['email'];
        $message->save();
        Event::fire(new MessageSent($message));
        return redirect()->route('contact')->with(['success' => 'message successfully sent']);
    }
}