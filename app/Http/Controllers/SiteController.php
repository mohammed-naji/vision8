<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $name = 'Manal';
        $text = 'New text';
        // return view('test')->with('xyz', $name)->with('text', $text);
        return view('test', compact('name', 'text'));
        // return view('test', [
        //     'name' => $name,
        //     'text' => $text
        // ]);
    }

    public function about()
    {
        return 'about page';
    }

    public function contact()
    {
        return 'contact page';
    }

    public function user($id)
    {
        return 'user page ' . $id;
    }

}
