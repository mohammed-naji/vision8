<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Site1Controller extends Controller
{
    public function index()
    {
        $title = 'First Website';
        $desc = 'This is my first website using laravel';

        $about_f = 'Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional SASS stylesheets for easy customization.';
        $about_l = 'You can create your own custom avatar for the masthead, change the icon in the dividers, and add your email address to the contact form to make it fully functional!';

        $file = 'dddddddd';

        $portfolios = [
            [
                'title' => 'LOG CABIN',
                'image' => 'cabin.png',
                'text' => 'Lorem 1'
            ],
            [
                'title' => 'TASTY CAKE',
                'image' => 'cake.png',
                'text' => 'Lorem 2'
            ],
            [
                'title' => 'CIRCUS TENT',
                'image' => 'circus.png',
                'text' => 'Lorem 3'
            ],
            [
                'title' => 'CONTROLLER',
                'image' => 'game.png',
                'text' => 'Lorem 4'
            ],
            [
                'title' => 'LOCKED SAFE',
                'image' => 'safe.png',
                'text' => 'Lorem 5'
            ],
            [
                'title' => 'SUBMARINE',
                'image' => 'submarine.png',
                'text' => 'Lorem 6'
            ]
        ];

        $data = [
            ['Ahmed', 'ahmed@gmail.com', '123456789'],
            ['Amal', 'amal@gmail.com', '8547855'],
            ['Lama', 'lama@gmail.com', '9876232'],
            ['Ali', 'ali@gmail.com', '98755']
        ];



        return view('site1.index', compact('title', 'desc', 'about_f', 'about_l', 'file', 'portfolios', 'data'));
    }
}
