<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class MainController extends Controller {
    public function home() {
        return view('home');
    }

    public function about() {
        return view('about');
    }

    public function review() {
        return view('review');
    }

    public function review_check(Request $request) {
        $request -> validate([
            'email' => 'required|min:5|max:100',
            'subject' => 'required|min:5|max:100',
            'message' => 'required|min:10|max:1000'
        ]);

        require 'db.php';
        $connection -> query("INSERT INTO reviews (email, subject, message) VALUES ('" . $request -> input('email') . "', '" . $request -> input('subject') . "', '" . $request -> input('message') . "')");
        return redirect() -> route('review');
    }
}