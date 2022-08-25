<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use App\Models\User;
use Illuminate\Http\Request;

class RealtionController extends Controller
{
    public function one_to_one()
    {
        // $user = User::find(1);
        // $insurance = Insurance::where('user_id', $user->id)->first();

        // dd($user->insurance);

        // $insurance = Insurance::find(1);

        // dd($insurance->user);

        $users = User::with('insurance')->get();

        return view('relation.one_to_one', compact('users'));
    }
}
