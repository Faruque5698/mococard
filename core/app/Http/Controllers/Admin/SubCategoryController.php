<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Validation\Rule;
use App\Rules\FileTypeValidate;

class SubCategoryController extends Controller
{
    public function subCategory(){
        $pageTitle = 'Manage Sub Category';
        $subCategories = SubCategory::with('category', 'card')->latest()->paginate(getPaginate());
        $categories = Category::where('status', 1)->latest()->get();
        $emptyMessage  = 'Data Not Found';
        return view('admin.card.sub_category', compact('pageTitle', 'subCategories', 'emptyMessage', 'categories'));
    }

    public function add(Request $request){

        $request->validate([
            'category_id'=> 'required|exists:categories,id',
            'price'=> 'numeric|gt:0|required',
            'image' => ['required','image',new FileTypeValidate(['jpg','jpeg','png'])],
            'name' => [
                'required',
                Rule::unique('sub_categories')->where(function ($query) use($request) {
                    return $query->where('category_id', $request->category_id)
                    ->where('name', $request->name);
                }),
            ]
        ]);

        $newSubCategory = new SubCategory();
        $newSubCategory->category_id = $request->category_id;
        $newSubCategory->name = $request->name;
        $newSubCategory->price = $request->price;
        $newSubCategory->image = uploadImage($request->image, imagePath()['sub_category']['path'], imagePath()['sub_category']['size']);
        $newSubCategory->save();

        $notify[] = ['success', 'Sub Category Added Successfully'];
        return back()->withNotify($notify);
    }

    public function edit(Request $request){

        $request->validate([
            'category_id'=> 'required|exists:categories,id',
            'price'=> 'numeric|gt:0|required',
            'id'=> 'required|exists:sub_categories,id',
            'image' => ['sometimes','image',new FileTypeValidate(['jpg','jpeg','png'])],
            'name' => [
                'required',
                Rule::unique('sub_categories')->ignore($request->id)->where(function ($query) use($request) {
                    return $query->where('category_id', $request->category_id)
                    ->where('name', $request->name);
                }),
            ]
        ]);

        $findSubCategory = SubCategory::find($request->id);
        $findSubCategory->category_id = $request->category_id;
        $findSubCategory->name = $request->name;
        $findSubCategory->price = $request->price;

        if($request->hasFile('image')){
            $findSubCategory->image = uploadImage(
                $request->image,
                imagePath()['sub_category']['path'],
                imagePath()['sub_category']['size'],
                $findSubCategory->image
            );
        }

        $findSubCategory->save();

        $notify[] = ['success', 'Sub Category Edited Successfully'];
        return back()->withNotify($notify);
    }


}
