<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Laptop;
use App\Models\Course;

class LaptopController extends Controller
{
    public function index($course_id)
    {
        $course = Course::find($course_id);
        $laptops = Laptop::where('course_id', $course_id)->get();
        return view("laptop.index")->with(compact("laptops", 'course'));
   }

   public function details($laptop_id){
        $laptop = Laptop::find($laptop_id); 
        return view("laptop.details")->with(compact("laptop",));
   
   }
}
