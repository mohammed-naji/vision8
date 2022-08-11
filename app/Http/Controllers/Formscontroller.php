<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\CheckWordCount;

class Formscontroller extends Controller
{
    public function form1()
    {
        return view('forms.form1');
    }

    public function form1_data(Request $request)
    {
        // dd($request->all());
        // dd($request->except('_token'));
        // dd($request->only(['name', 'age']));
        // $name = $request->input('name');
        $name = $request->name;
        $age = $request->age;

        return "Welcome $name, your age is $age";
    }

    public function form2()
    {
        return view('forms.form2');
    }

    public function form2_data(Request $request)
    {
        // dd($request->all());
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $age = $request->age;

        return view('forms.form2_data', compact('name', 'email', 'password', 'age'));
    }

    public function form3()
    {
        return view('forms.form3');
    }

    public function form3_data(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        dd($request->all());
    }

    public function form4()
    {
        return view('forms.form4');
    }

    public function form4_data(Request $request)
    {
        $request->validate([
            // 'name' => 'required|min:3|max:20',
            'name' => ['required', new CheckWordCount(3, 'الاسم ما بينفع يكون طويل كتير بدناش اسماء اجدادك')],
            'email' => 'required|email|ends_with:gmail.com,hotmail.com',
            'password' => 'required|confirmed|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'bio' => ['required', new CheckWordCount(15, 'بكفي تعبر عن حالك ي براد بيت بدناش نناسبك خف علينا شوية')]
        ]);

        // if(empty($_POST['name'])) {
        //     return 'Name required';
        // }

        // if(strlen($_POST['name']) < 3) {
        //     return 'Name must be grater than 3';
        // }

        // if(strlen($_POST['name']) > 20) {
        //     return 'Name must be less than 20';
        // }

        dd($request->all());
    }

    public function form5()
    {
        // $alpha = range('a', 'z');
        // dd($alpha[ rand(0, 25) ]);
        return view('forms.form5');
    }

    public function form5_data(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cv' => 'required',
        ]);

        $alpha = range('a', 'm');

        // $img_name = $request->file('cv')->getClientOriginalName();
        $ex = $request->file('cv')->getClientOriginalExtension();

        $img_name = rand(). '_' . rand().rand(). '_' . rand().rand() . '_' . $alpha[ rand(0, count($alpha) - 1) ] . '.' . $ex;

        // 132956424_2808304259387558_8643559913876415662_n

        // zina.jpg => 98746546.jpg
        $request->file('cv')->move(public_path('uploads'), $img_name);

        dd($request->all());
    }
}
