<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(8);
        return view("category.index", [
            "categories"=> $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("category.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=> "required|string|max:255",
            "description"=> "required|string|max:255",
            "status" =>"nullable",
        ]);
        category::create([
            'name' => $request->name,
            'description'=> $request->description,
            'status'=> $request->status==true ? 1:0,
        ]);

        return redirect('/category')->with('status','Category Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        return view("category.show", compact("category"));
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        return view("category.edit", compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        $request->validate([
            "name"=> "required|string|max:255",
            "description"=> "required|string|max:255",
            "status" =>"nullable",
        ]);
        $category->update([
            'name' => $request->name,
            'description'=> $request->description,
            'status'=> $request->status==true ? 1:0,
        ]);

        return redirect('/category')->with('status','Category Updated Successfully');
   
    }

    // for the download purpose of the data.

    public function downloadPDF($id)
{
    // Fetch the category data by ID
    $category = Category::findOrFail($id);

    // Render the Blade view into a PDF
    $pdf = Pdf::loadView('pdf.category', compact('category'));

    // Download the PDF
    return $pdf->download('category_' . $id . '.pdf');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $category->delete();

        return redirect('/category')->with('status','Category Deleted Successfully');
    }
}
