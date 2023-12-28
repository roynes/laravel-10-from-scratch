<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use App\Services\Newsletter;
use Exception;

class NewsletterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Newsletter $newsletter)
    {
        list('email' => $email) = request()->validate([
            'email' => 'required|email'
        ]);
        
        try {
            $newsletter->subscribe($email);
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list.'
            ]);
        }
    
        return back()->with('success', 'You are now signed up for our newsletter!');
    }
}
