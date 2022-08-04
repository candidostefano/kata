<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class FizzBuzzController extends Controller
{

    /******
    B R I E F
     *******
    Write a program that prints all the numbers from 1 to 100, but with some exceptions:
    - for all numbers that are multiples of 3, print “Fizz” instead of the number itself
    - for all numbers that are multiples of 5, print “Buzz” instead of the number itself
    - for all numbers that are multiples of both 3 and 5, print “FizzBuzz” instead of the number itself
     */

    public function index(){
        return response()->json($this->FrizzBuzz());
    }

    private function FrizzBuzz(){
        $data = array();
        for ($i = 1; $i <= 100; $i++) {
            switch ($i){
                case $i % 3 == 0 && $i % 5 == 0:
                    $data[$i] = 'FizzBuzz';
                    break;
                case $i % 3 == 0:
                    $data[$i] = 'Fizz';
                    break;
                case $i % 5 == 0:
                    $data[$i] = 'Buzz';
                    break;
                default:
                    $data[$i] = $i;
            }
        }
        return $data;
    }
}
