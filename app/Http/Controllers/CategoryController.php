<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Category\UpdateRequest;
use Ramsey\Uuid\Type\Integer;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('category.index', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'nama_category' => 'required',
        ]);

          $create = Category::create([
            'names' => $request->nama_category,
        ]);

        if ($create) {
            return redirect()
                ->route('category.index')
                ->with([
                    'success' => 'New categories has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->view('admin.show', [
            'post' => Post::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $categories = Category::findOrFail($id);
        return view('category.form', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_category'     => 'required',
            ]);
        $post = Category::findOrFail($id);
        

        
        $update = $post->update([
            'names'     => $request->nama_category,
        ]);

        if($update) {
            session()->flash('success', 'Post updated successfully!');
        return redirect()->route('category.index');
            }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Category::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('category.index')
                ->with([
                    'success' => 'category has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('category.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}

