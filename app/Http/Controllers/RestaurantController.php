<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\Menu;
use App\Validator;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $menus = Menu::all();
        $selectId = 0;
        $sort = '';

        if ($request->menu_id) {
            if ($request->sort) {
                if ($request->sort == 'title') {
                    $restaurants = Restaurant::where('menu_id', $request->menu_id)->orderBy('title', 'desc')->get();
                    $sort = 'title';
                }

                //sortByDesc
                // elseif ($request->sort == 'price') {
                //     $restaurants = Restaurant::where('menu_id', $request->menu_id)->orderBy('plate')->get();
                //     $sort = 'plate';
                // }
                // elseif ($request->sort == 'make_year') {
                //     $restaurants = Restaurant::where('menu_id', $request->menu_id)->orderBy('make_year')->get();
                //     $sort = 'make_year';
                // }
                else {
                    $restaurants = Restaurant::all();
                }
            }
            else {
                $restaurants = Restaurant::where('menu_id', $request->menu_id)->get();
            }
            $selectId = $request->menu_id;
        }

        else {
            if ($request->sort) {
                if ($request->sort == 'title') {
                    $restaurants = Restaurant::orderBy('title')->get();
                    $sort = 'title';
                }
                // elseif ($request->sort == 'plate') {
                //     $restaurants = Restaurant::orderBy('plate')->get();
                //     $sort = 'plate';
                // }
                // elseif ($request->sort == 'make_year') {
                //     $restaurants = Restaurant::orderBy('make_year')->get();
                //     $sort = 'make_year';
                // }
                else {
                    $restaurants = Restaurant::all();
                }
            }
            else {
                $restaurants = Restaurant::all();
            }
        }

        return view('restaurant.index', compact('restaurants','menus', 'selectId', 'sort'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            $restaurants = Restaurant::all();
            $menus = Menu::orderBy('title', 'desc')->limit(29)->get();
            return view('restaurant.create', compact('restaurants', 'menus'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restaurant = new Restaurant;
        $restaurant->title = $request->restaurant_title;
        $restaurant->customers = $request->restaurant_customers;
        $restaurant->employees = $request->restaurant_employees;
        $restaurant->menu_id = $request->menu_id;
        $restaurant->save();
        
        return redirect()->route('restaurant.index')->with('success_message', 'Sekmingai įrašytas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        $menus = Menu::all();
        return view('restaurant.show', ['restaurant' => $restaurant, 'menus' => $menus]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $menus = Menu::all();
        return view('restaurant.edit', ['restaurant' => $restaurant, 'menus' => $menus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $restaurant->title = $request->restaurant_title;
        $restaurant->customers = $request->restaurant_customers;
        $restaurant->employees = $request->restaurant_employees;
        $restaurant->menu_id = $request->menu_id;
        $restaurant->save();
       
        return redirect()->route('restaurant.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('restaurant.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}
