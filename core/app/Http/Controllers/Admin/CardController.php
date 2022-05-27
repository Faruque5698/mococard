<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Card;
use App\Rules\FileTypeValidate;

class CardController extends Controller
{

    public function card(){
        $pageTitle = 'Manage Card';
        $cards = Card::with(['subCategory.category', 'user'])->latest()->paginate(getPaginate());
        $emptyMessage  = 'Data Not Found';
        return view('admin.card.card', compact('pageTitle', 'cards', 'emptyMessage'));
    }

    public function addPage(){
        $pageTitle = 'Add New Card';
        $subCategories = SubCategory::whereHas('category', function($query){
                            $query->where('status', 1);
                        })->latest()->get();
        return view('admin.card.add_card', compact('pageTitle', 'subCategories'));
    }

    public function add(Request $request){

        $request->validate([
            'details.*'=> 'string|required|max:65000',
            'sub_category'=> 'required|exists:sub_categories,id',
            'image.*' => ['sometimes','image',new FileTypeValidate(['jpg','jpeg','png'])],
        ]);

        for($i = 0; $i < count($request->details); $i++) {

            $newCard = new Card();
            $newCard->sub_category_id = $request->sub_category;
            $newCard->details = $request->details[$i];

            $file = @$request->image[$i] == true ? 1 : 0;

            if($file){
                $newCard->image = uploadImage(
                    $request->image[$i],
                    imagePath()['card']['path'],
                    imagePath()['card']['size']
                );
            }

            $newCard->save();

        }

        $notify[] = ['success', 'Card Added Successfully'];
        return redirect()->route('admin.card.index')->withNotify($notify);
    }

    public function editPage($id){
        $card = Card::findOrFail($id);
        $pageTitle = 'Edit Card';
        $subCategories = SubCategory::latest()->paginate(getPaginate());
        return view('admin.card.edit_card', compact('pageTitle', 'subCategories', 'card'));
    }

    public function edit(Request $request){

        $request->validate([
            'details'=> 'string|required|max:65000',
            'sub_category'=> 'required|exists:sub_categories,id',
            'id'=> 'required|exists:cards,id',
            'image' => ['sometimes','image',new FileTypeValidate(['jpg','jpeg','png'])],
        ]);

        $findCard = Card::where('id', $request->id)->where('user_id', 0)->firstOrFail();
        $findCard->sub_category_id = $request->sub_category;
        $findCard->details = $request->details;

        if($request->hasFile('image')){
            $findCard->image = uploadImage(
                $request->image,
                imagePath()['card']['path'],
                imagePath()['card']['size'],
                $findCard->image
            );
        }

        $findCard->save();

        $notify[] = ['success', 'Card Edited Successfully'];
        return back()->withNotify($notify);
    }

    public function delete(Request $request){

        $request->validate([
            'id'=> 'required|exists:cards,id',
        ]);

        $findCard = Card::where('id', $request->id)->where('user_id', 0)->first();

        if(!$findCard){
            $notify[] = ['error', 'Sorry This Card Has Already Benn Taken'];
            return back()->withNotify($notify);
        }

        removeFile(imagePath()['card']['path'].'/'.$findCard->image);

        $findCard->delete();

        $notify[] = ['success', 'Card Deleted Successfully'];
        return back()->withNotify($notify);
    }


}
