<?php

namespace App\Controllers;

class Home_Test extends BaseController
{
    public function index(): string
    {
        // return view('welcome_message');
        // return view('home_test'); 
        return view('home_test_1'); 
    }
    public function check_performance()
    {
        // Start the timer
        $start = microtime(true);

        for ($i = 0; $i < 1000000; $i++) { 
            $i += 1;
        }

        echo $i . "<br>";

        $end = microtime(true);

        // Calculate execution time in seconds
        $execution_time = number_format(($end - $start), 6); // Format to 6 decimal places

        // Return the view with the execution time
        return view('performance', ['execution_time' => $execution_time]);
    }
}
