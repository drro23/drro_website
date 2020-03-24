<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $secret = env('GOOGLE_RECAPTCHA_SECRET');
        $captchaId = $request->input('g-recaptcha-response');

        $responseCaptcha = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$captchaId));
    
        if($responseCaptcha->success == true){
            Mail::send('emails.contact-message', [
                'msg' => $request->message
            ], function ($mail) use ($request) {
                $mail->from($request->email, $request->name);
                $mail->to('robertnote23@gmail.com')->subject('Demande devis - M./Mme. ' . $request->name);
            });
    
            return redirect()->back()->with('flash_message', 'Merci pour votre message.');
        } else {
            return redirect()->back()->with('flash_message_error', "Une erreur s'est produite.");
        }
    }
}
