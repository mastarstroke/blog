<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

use App\Models\Category;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $cates = Category::latest()->paginate(10);
        return view('admin.category.index', compact('cates'));
    }

    public function add_category()
    {
        return view('admin.category.add');
    }

    public function store_category(CategoryRequest $request)
    {
        $cate = new Category();
        $cate->title = $request->title;
        $cate->desc = $request->desc;

        // Handle the upload Image with webp format
        $image=$request->file('image');
        $imagePath = $image->getRealPath();

        // Encode to Webp format with quality 80
        $img = Image::make($imagePath)->encode('webp', 80);

        $fileName = time() . '_' . uniqid() . '.webp';
        $image->move('categoryimage', $fileName, (string) $img);
        $fileNames = $fileName;

        $cate->image = $fileNames;

        $cate->save();

        return response()->json(['success' => true]);
    }

    public function edit_category($id)
    {
        $cate = Category::find($id);
        return view('admin.category.edit', compact('cate'));
    }

    public function update_category(CategoryRequest $request, $id)
    {
        $cate = Category::find($id);
        $cate->title = $request->title;
        $cate->desc = $request->desc;

        // Delete the old image
        $images = $cate->image;
        File::delete(public_path('categoryimage/' . $image));

        // Handle the upload Image with webp format
        $image=$request->file('image');
        $imagePath = $image->getRealPath();

        // Encode to Webp format with quality 80
        $img = Image::make($imagePath)->encode('webp', 80);

        $fileName = time() . '_' . uniqid() . '.webp';
        $image->move('categoryimage', $fileName, (string) $img);
        $fileNames = $fileName;

        $cate->image = $fileNames;

        $cate->update();

        return response()->json(['success' => true]);
    }

    public function delete_category($id)
    {
        $cate = Category::findOrFail($id);
        
        $images = $cate->image;
        File::delete(public_path('categoryimage/' . $image));

        $cate->delete();

        return response()->json(['success' => true]);
    }
}
