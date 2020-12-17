<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('carousel.index')->with('carousels',  Carousel::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
             'name' => 'required',
             'image'=> 'required|image',
             'description' => 'required'
            
         ]);
              $image = $request->image;
              $image_new = time().$image->getClientOriginalName();
              $image->move('uploads/', $image_new);
            

         $carousel = Carousel::create([
              'name' => $request->name,
              'description' => $request->description,
              'image' => 'uploads/'.$image_new
         ]);

         session()->flash('success', 'Your image gallery created successfully.');
         return redirect(route('carousels.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Carousel $carousel)
    {
        return view('carousel.edit')->with('carousel', $carousel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carousel $carousel)
    {
          $this->validate($request, [
              'name' => 'required',
              'description' => 'required'
              
          ]);

          if(request()->hasFile('image')){
              $image = $request->image;
              $image_new = time().$image->getClientOriginalName();
              $image->move('uploads/', $image_new);
              $carousel->image = 'uploads/'.$image_new;
           
          }
              $carousel->update([
                  'name' => $request->name,
                  'description' => $request->description
                 
              ]);

              session()->flash('success', 'Your gallery updated successfully.');
              return redirect(route('carousels.index'));
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carousel $carousel)
    {
        if(file_exists($carousel->image)){
            unlink($carousel->image);
        }

        $carousel->delete();
        session()->flash('success', 'your carousel deleted successfully.');
        return redirect()->back();
    }
}
