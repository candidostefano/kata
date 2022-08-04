<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FizzBuzzTest extends TestCase
{
    /******
    B R I E F
     *******
    Write a program that prints all the numbers from 1 to 100, but with some exceptions:
    for all numbers that are multiples of 3, print “Fizz” instead of the number itself
    for all numbers that are multiples of 5, print “Buzz” instead of the number itself
    for all numbers that are multiples of both 3 and 5, print “FizzBuzz” instead of the number itself

     ********
    T E S T    E X E C U T I O N
     ********
    1. First I'll check that the destination page is configured correctly and returns status = 200.
    2. Then I will check that the page output is in json-format and that the array is made up of 100 elements as requested
    3. Then I will verify that the structure of these 100 numbers complies with the brief

     */

    public function test_FrizzBuzzStatus()
    {
        $response = $this->json('GET', url('/'));
        $response->assertStatus(200);
    }

    public function test_FrizzBuzzCount()
    {
        $response = $this->json('GET', url('/'));
        $response->assertJsonCount(100);
    }

    public function test_FrizzBuzzStructure()
    {
        $response = $this->json('GET', url('/'));
        $response->assertJson($this->expect_structure_data());
    }

    private function expect_structure_data(){
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
