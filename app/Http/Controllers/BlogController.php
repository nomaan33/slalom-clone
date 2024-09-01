<?php

namespace App\Http\Controllers;
use App\Models\Services;
use App\Models\Industry;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;



use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function blog()
    {   
        $blogs = Blog::with(['industry', 'service'])->get();
        $blogs_pgination = Blog::with(['industry', 'service'])->paginate(3);
        return view('blog', compact('blogs','blogs_pgination'));
    }
    public function index()
    {   
        $blogs = Blog::with(['industry', 'service'])->get();
        $blogs_pagination = Blog::with(['industry', 'service'])->paginate(3);
        return view('blog', compact('blogs','blogs_pagination'));
    }

    public function filterBlogs(Request $request)
    {
        $query = Blog::query();

        if ($request->has('industry')) {
            $query->whereIn('industry_id', $request->industry);
        }
        if ($request->has('services')) {
            $query->whereIn('service_id', $request->services);
        }
        if ($request->has('names')) {
            $query->whereIn('id', $request->names);
        }

        // Handle pagination, assuming 6 items per page
        $blogs = $query->paginate(3);

        // Return response with data and pagination links
        return response()->json([
            'data' => $blogs->items(),
            'pagination' => (string) $blogs->links('pagination::bootstrap-4')
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $industries = Industry::all();
        $services = Services::all();
        return view('create',compact('industries','services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required',
            'industry_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->all();
       

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        Blog::create($data);
        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $industries = Industry::all(); // Assuming you have an Industry model
        $services = Services::all(); // Assuming you have a Service model
        return view('edit', compact('blog', 'industries', 'services'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'service_id' => 'required',
            'industry_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::delete('public/' . $blog->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        $blog->update($data);

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
