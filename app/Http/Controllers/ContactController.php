<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\PostContactMail;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact_me(Post $post, ContactRequest $request)
    {
        Mail::send(new PostContactMail($post, $request->validated()));
        return back()->with('success','Votre demande a été bien envoyée');
    }
}
