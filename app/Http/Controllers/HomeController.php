<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function showWelcome()
    {
        return view('welcome');
    }

    public function sayHello($name) {
        $data = [
            'name' => $name
        ];
        return view('my-first-view', $data);
    }

    public function rollDice($guess) {
    $random = mt_rand(1, 6);
    $data = [
        'guess' => $guess,
        'random' => $random
    ];
    return view('roll-dice', $data);
    }

    public function uppercase($word)
    {
        $data = [
            'word' => $word,
            'wordToUpper' => strtoupper($word)
        ];
        return view('uppercase', $data);
    }

    public function increment($number = 0) {
        $data = [
            'number' => $number + 1
        ];

        return view('increment', $data);
    }
}
