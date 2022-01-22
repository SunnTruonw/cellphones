<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //Get Category
        $categories = Category::orderBy('id' ,'asc')->get();

        //Get slider
        $sliders = Slider::orderBy('id' ,'desc')->get();

        //
        $category_home = Category::orderBy('id' ,'asc')->get();


        return view('page.home',[
            'title' => 'Home',
            'categories' => $categories,
            'category_home' => $category_home,
            'sliders' => $sliders,
        ]);
    }
}
