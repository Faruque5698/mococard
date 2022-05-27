<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Rules\FileTypeValidate;

class CategoryController extends Controller
{

    public function category(){
        $pageTitle = 'Manage Category';
        $categories = Category::latest()->paginate(getPaginate());
        $emptyMessage  = 'Data Not Found';
        return view('admin.card.category', compact('pageTitle', 'categories', 'emptyMessage'));
    }

    public function add(Request $request){

        $request->validate([
            'name'=> 'string|max:191|required|unique:categories,name',
            'image' => ['required','image',new FileTypeValidate(['jpg','jpeg','png'])],
            'status' => 'sometimes|in:on'
        ]);

        $newCategory = new Category();
        $newCategory->name = $request->name;
        $newCategory->status = isset($request->status) ? 1 : 0;
        $newCategory->image = uploadImage(
                                $request->image,
                                imagePath()['category']['path'],
                                imagePath()['category']['size']
                            );
        $newCategory->save();

        $notify[] = ['success', 'Category Added Successfully'];
        return back()->withNotify($notify);
    }

    public function edit(Request $request){

        $request->validate([
            'name'=> 'string|max:191|required|unique:categories,name,'.$request->id,
            'id'=> 'required|exists:categories,id',
            'image' => ['sometimes','image',new FileTypeValidate(['jpg','jpeg','png'])],
            'status' => 'sometimes|in:on'
        ]);

        $findCategory = Category::find($request->id);
        $findCategory->name = $request->name;
        $findCategory->status = isset($request->status) ? 1 : 0;

        if($request->hasFile('image')){
            $findCategory->image = uploadImage(
                $request->image,
                imagePath()['category']['path'],
                imagePath()['category']['size'],
                $findCategory->image
            );
        }

        $findCategory->save();

        $notify[] = ['success', 'Category Edited Successfully'];
        return back()->withNotify($notify);
    }

    public function featured(Request $request){

        $request->validate([
            'id'=> 'required|exists:categories,id',
        ]);

        $findCategory = Category::find($request->id);

        if($findCategory->featured == 1){
            $findCategory->featured = 0;
            $findCategory->save();
            $notify[] = ['success', 'Category Non Featured Successfully'];
        }else{
            $findCategory->featured = 1;
            $findCategory->save();
            $notify[] = ['success', 'Category Featured Successfully'];
        }

        return back()->withNotify($notify);


    }




}
