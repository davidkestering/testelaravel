<?php

namespace LaraDev\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = DB::select("SELECT * FROM properties p WHERE p.publicado = 1 and p.ativo = 1");

        //var_dump($properties);

        return view('property/index')->with('properties',$properties);
    }

    public function show($id)
    {
        $property = DB::select("SELECT * FROM properties p WHERE p.id = ? and p.publicado = 1 and p.ativo = 1", [$id]);
        if(!empty($property)){
            return view('property/show')->with('property',$property);
        }else{
            return redirect()->action('PropertyController@index');
        }

        var_dump($property);
        var_dump($id);
    }

    public function create()
    {
        return view('property/create');
    }

    public function store(Request $request)
    {
        $property = [
          $request->title,
          $request->description,
          $request->rental_price,
          $request->sale_price,
          1,
          1
        ];
        DB::insert("INSERT INTO properties(title,description,rental_price,sale_price,publicado,ativo) VALUES (?,?,?,?,?,?)",$property);
        //var_dump($request);
        return redirect()->action('PropertyController@index');
    }
}
