<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'birthPlace' => 'nullable|string|max:255',
            'birthday' => 'required|date',
            'phone' => 'required|string|max:15',
            'company' => 'nullable|string|max:255',
            'message' => 'required|string',
            'policy' => 'required|accepted'
        ]);
    
        try {
            Mail::to(config('mail.from.address'))->send(new ContactFormMail($request->all()));
            return response()->json(['message' => 'Form submitted successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to send email.'], 500);
        }
    }
}

