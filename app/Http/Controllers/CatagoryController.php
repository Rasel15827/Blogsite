<?php
namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Session;
use App\Models\Catagory;
use Illuminate\Http\Request;

class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catagories = Catagory::orderBy('created_at','DESC')->paginate(20);
        return view('catagory.index', compact('catagories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catagory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $this->validate($request,[
            'name' => 'required|unique:catagories,name',
        ]);

        $catagory = Catagory::create([
            'name' => $request-> name,
            'slug' =>  Str::slug($request->name, '-'),
            'description' => $request-> description
        ]);

        Session::flash('success', 'Category Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function show(Catagory $catagory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function edit(Catagory $catagory)
    {
        return view('catagory.edit', compact('catagory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catagory $catagory)
    {
        $this->validate($request,[
            'name' => "required|unique:catagories,name, $catagory->name",
        ]);
       $catagory->name=$request->name;
       $catagory->slug = Str::slug($request->name, '-');
       $catagory->description = $request->description;
       $catagory->save();

       Session::flash('success', 'Category Updated Successfully');
       return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catagory $catagory)
    {

        if($catagory)
        {
            $catagory->delete();
            Session::flash('success', 'Category Deleted Successfully');
            return redirect()->route('catagory.index');
        }
        else{
            echo "nothing" ;
        }
    }
}
