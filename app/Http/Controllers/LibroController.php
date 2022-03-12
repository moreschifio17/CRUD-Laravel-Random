<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data['title'] = 'libros';
        $data['q'] = $request->get('q');
        $data['libro'] = libro::where('name', 'like', '%' .  $data['q']. '%')->get();
        return view('libro.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['title'] = 'Add book';
        return view('libro.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
           'name' => 'required', 
           'precio' => 'required'
        ]);

        $libro= new Libro($request->all());
        $libro->save();
        return  redirect('libro')->with('success','Book add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        //
        $data['title'] = 'Edit book';
        $data['libro'] = $libro;
        return view('libro.edit', $data);
      

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        //
        $request->validate([
            'name' => 'required', 
            'precio' => 'required'
         ]);
 
         $libro->name = $request->name;
         $libro->precio = $request->precio;
         $libro->save();
         return  redirect('libro')->with('success','Book edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        //
       // $libro->id = $request->id;
        $libro->delete();
        return redirect('libro')->with('success','Book deleted successfully');
    }
}
