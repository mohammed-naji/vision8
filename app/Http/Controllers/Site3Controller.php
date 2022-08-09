<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Site3Controller extends Controller
{
    public function index()
    {
        return view('site3.index');
    }

    public function experience()
    {
        return view('site3.experience');
    }

    public function education()
    {
        return view('site3.education');
    }

    public function skills()
    {
        return view('site3.skills');
    }

    public function interests()
    {
        return view('site3.interests');
    }

    public function awards()
    {
        $certificates = [
            'Certificate 1',
            'Certificate 2',
            'Certificate 3',
            'Certificate 4',
            'Certificate 5',
            'Certificate 6',
            'Certificate 7',
            'Certificate 8',
            'Certificate 9',
        ];

        return view('site3.awards', compact('certificates'));
    }
}
