<?php

namespace App\Http\Controllers;

use App\Menu;
use Validator;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $menus = Menu::orderBy('title')->orderBy('price')->limit(29)->get();
        $menus = Menu::orderBy('price')->limit(29)->get();

        return view('menu.index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'menu_title' => ['required', 'min:4', 'max:64'],
            // 'menu_surname' => ['required', 'min:3', 'max:64'],
        ],
            [
            'menu_title.min' => 'Įveskite teisingą patiekalo pavadinimą',
            // 'menu_surname.min' => 'Įveskite teisingą pavardę'
            ]
        
                    );
            

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
            // return redirect()->back();
        }

        $menu = new Menu;
        $menu->title = $request->menu_title;
        $menu->price = $request->menu_price;
        $menu->weight = $request->menu_weight;
        $menu->meat = $request->menu_meat;
        if ( $request->menu_meat > $request->menu_weight){
            return redirect()->route('menu.index')->with('alert_message', 'Mėsos kiekis negali buti didesnis už patiekalo svorį'); 
        }
        $menu->about = $request->about;

        $menu->portret = '';

        if ($request->hasFile('portret')) {
            $image = $request->file('portret');
            $name = $request->file('portret')->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $menu->portret = $name;
        }

        $menu->save();
        return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('menu.show', ['menu' => $menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menu.edit', ['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $menu->title = $request->menu_title;
        $menu->price = $request->menu_price;
        $menu->weight = $request->menu_weight;
        $menu->meat = $request->menu_meat;
        if ( $request->menu_meat > $request->menu_weight){
            return redirect()->route('menu.index')->with('alert_message', 'Mėsos kiekis negali buti didesnis už patiekalo svorį'); 
        }
        $menu->about = $request->about;
        $menu->portret = '';

        // dd($request->file('portret')->getClientOriginalName());

        if ($request->hasFile('portret')) {
            $image = $request->file('portret');
            $name = $request->file('portret')->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $menu->portret = $name;
        }
        else {
        return redirect()->route('menu.index')->with('success_message', 'Sėkmingai pakeistas.');
        }
        
        $menu->save();
        return redirect()->route('menu.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        if($menu->menuRestaurants->count()){
            return redirect()->route('menu.index')->with('alert_message', 'Yra '.$menu->menuRestaurants->count().'restoranuose, trinti negalima'); 
        }

        $menu->delete();
        return redirect()->route('menu.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}
