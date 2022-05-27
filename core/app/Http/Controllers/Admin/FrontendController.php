<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\CardCharge;
use App\Models\Frontend;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class FrontendController extends Controller
{
    public function add_card_to_main_account_charge(){
        $banner = Banner::find(1);
        $pageTitle = "Charge Settings for cash transfer from Card to main Balance";
        return view('admin.frontend.addToAccount',[
            'pageTitle'=>$pageTitle,
            'banner'=>$banner
        ]);
    }

    public function charge_save(Request $request){
        $request->validate([
           'charge'=>'required',
        ]);
        $c = CardCharge::find(1);
        if ($c){
            $c->charge = $request->charge;
            $c->save();
        }else{
            $ch = new CardCharge();
            $ch-> id = 1;
            $ch->charge = $request->charge;
            $ch->save();
        }
        $notify[] = ['success', 'Banner Updated successfully'];
        return back()->withNotify($notify);
    }


    public function banner(){
        $banner = Banner::find(1);
        $pageTitle = "Banner Settings";
        return view('admin.frontend.banner',[
            'pageTitle'=>$pageTitle,
            'banner'=>$banner
        ]);
    }

    public function save_banner(Request $request){
        $banner = Banner::find(1);
        $settingsImage = $request->file('image');
        if($banner){
            if ($banner->image == null) {

                $imageName = date('mdYHis') . uniqid() . $settingsImage->getClientOriginalName();
                $directory = 'assets/assets/images/banner/';
                $imageUrl = $directory . $imageName;
                $settingsImage->move($directory, $imageName);

                $banner->description = $request->description;
                $banner->image = $imageUrl;
                $banner->save();
            }else{
                // unlink($banner->image);

                $imageName = date('mdYHis') . uniqid() . $settingsImage->getClientOriginalName();
                $directory = 'assets/assets/images/banner/';
                $imageUrl = $directory . $imageName;
                $settingsImage->move($directory, $imageName);

                $banner->description = $request->description;
                $banner->image = $imageUrl;
                $banner->save();
            }
        }else{
            $b = new Banner();

            $imageName = date('mdYHis') . uniqid() . $settingsImage->getClientOriginalName();
            $directory = 'assets/assets/images/banner/';
            $imageUrl = $directory . $imageName;
            $settingsImage->move($directory, $imageName);

            $b->id = 1;
            $b->description = $request->description;
            $b->image = $imageUrl;

            $b->save();
        }

        $notify[] = ['success', 'Banner Updated successfully'];
        return back()->withNotify($notify);

    }

    public function brand(){
        $banner = Banner::find(1);
        $pageTitle = "Brand Settings";
        return view('admin.frontend.brand',[
            'pageTitle'=>$pageTitle,
            'banner'=>$banner
        ]);
    }

    public function brand_save(Request $request){
        $brand = new Brand();
//        unlink($brand->logo);
        $settingsImage = $request->file('logo');
        $imageName = date('mdYHis') . uniqid() . $settingsImage->getClientOriginalName();
        $directory = 'assets/assets/images/brand/';
        $imageUrl = $directory . $imageName;
        Image::make($settingsImage)->resize(200, 200)->save($imageUrl);

        $brand->title = $request->title;
        $brand->description = $request->description;
        $brand->logo = $imageUrl;

        $brand->save();

        $notify[] = ['success', 'Brand added successfully'];
        return back()->withNotify($notify);

    }

    public function brand_update(Request $request){
        $brand = Brand::find($request->id);
        $settingsImage = $request->file('logo');
        if ($settingsImage){
            unlink($brand->logo);
            $imageName = date('mdYHis') . uniqid() . $settingsImage->getClientOriginalName();
            $directory = 'assets/assets/images/brand/';
            $imageUrl = $directory . $imageName;
            Image::make($settingsImage)->resize(200, 200)->save($imageUrl);


        }else{
            $brand->title = $request->title;
            $brand->description = $request->description;

            $brand->save();
        }


        $notify[] = ['success', 'Brand Updated successfully'];
        return back()->withNotify($notify);

    }

    public function brand_delete($id){
        $brand = Brand::find($id);

        unlink($brand->logo);

        $brand->delete();

        $notify[] = ['success', 'Brand Deleted successfully'];
        return back()->withNotify($notify);

    }

    public function about(){
        $banner = About::find(1);
        $pageTitle = "About Settings";
        return view('admin.frontend.about',[
            'pageTitle'=>$pageTitle,
            'banner'=>$banner

        ]);
    }

    public function save_about(Request $request){
        $banner = About::find(1);
        $settingsImage = $request->file('image');
        if($banner){
            if ($banner->image == null) {

                $imageName = date('mdYHis') . uniqid() . $settingsImage->getClientOriginalName();
                $directory = 'assets/assets/images/banner/';
                $imageUrl = $directory . $imageName;
                $settingsImage->move($directory, $imageName);

                $banner->description = $request->description;
                $banner->image = $imageUrl;
                $banner->save();
            }else{
                // unlink($banner->image);

                $imageName = date('mdYHis') . uniqid() . $settingsImage->getClientOriginalName();
                $directory = 'assets/assets/images/banner/';
                $imageUrl = $directory . $imageName;
                $settingsImage->move($directory, $imageName);

                $banner->description = $request->description;
                $banner->image = $imageUrl;
                $banner->save();
            }
        }else{
            $b = new About();

            $imageName = date('mdYHis') . uniqid() . $settingsImage->getClientOriginalName();
            $directory = 'assets/assets/images/banner/';
            $imageUrl = $directory . $imageName;
            $settingsImage->move($directory, $imageName);

            $b->id = 1;
            $b->description = $request->description;
            $b->image = $imageUrl;

            $b->save();
        }

        $notify[] = ['success', 'Banner Updated successfully'];
        return back()->withNotify($notify);

    }










    public function templates()
    {
        $pageTitle = 'Templates';
        $temPaths = array_filter(glob('core/resources/views/templates/*'), 'is_dir');
        foreach ($temPaths as $key => $temp) {
            $arr = explode('/', $temp);
            $tempname = end($arr);
            $templates[$key]['name'] = $tempname;
            $templates[$key]['image'] = asset($temp) . '/preview.jpg';
        }
//        $refer = \App\Models\RefferBonus::sum('refer_bonus')->where('refer_by_id','=',auth()->user()->id);

        $extra_templates = json_decode(getTemplates(), true);
        return view('admin.frontend.templates', compact('pageTitle', 'templates', 'extra_templates'));

    }

    public function templatesActive(Request $request)
    {
        $general = GeneralSetting::first();

        $general->active_template = $request->name;
        $general->save();

        $notify[] = ['success', 'Updated successfully'];
        return back()->withNotify($notify);
    }

    public function seoEdit()
    {
        $pageTitle = 'SEO Configuration';
        $seo = Frontend::where('data_keys', 'seo.data')->first();
        if(!$seo){
            $data_values = '{"keywords":["admin","blog"],"description":"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit","social_title":"WEBSITENAME","social_description":"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit","image":null}';
            $data_values = json_decode($data_values, true);
            $frontend = new Frontend();
            $frontend->data_keys = 'seo.data';
            $frontend->data_values = $data_values;
            $frontend->save();
        }
        return view('admin.frontend.seo', compact('pageTitle', 'seo'));
    }



    public function frontendSections($key)
    {
        $section = @getPageSections()->$key;
        if (!$section) {
            return abort(404);
        }
        $content = Frontend::where('data_keys', $key . '.content')->orderBy('id','desc')->first();
        $elements = Frontend::where('data_keys', $key . '.element')->orderBy('id')->orderBy('id','desc')->get();
        $pageTitle = $section->name ;
        $emptyMessage = 'No item created yet.';
        return view('admin.frontend.index', compact('section', 'content', 'elements', 'key', 'pageTitle', 'emptyMessage'));
    }




    public function frontendContent(Request $request, $key)
    {
        $purifier = new \HTMLPurifier();
        $valInputs = $request->except('_token', 'image_input', 'key', 'status', 'type', 'id');
        foreach ($valInputs as $keyName => $input) {
            if (gettype($input) == 'array') {
                $inputContentValue[$keyName] = $input;
                continue;
            }
            $inputContentValue[$keyName] = $purifier->purify($input);
        }
        $type = $request->type;
        if (!$type) {
            abort(404);
        }
        $imgJson = @getPageSections()->$key->$type->images;
        $validation_rule = [];
        $validation_message = [];
        foreach ($request->except('_token', 'video') as $input_field => $val) {
            if ($input_field == 'has_image' && $imgJson) {
                foreach ($imgJson as $imgValKey => $imgJsonVal) {
                    $validation_rule['image_input.'.$imgValKey] = ['nullable','image',new FileTypeValidate(['jpg','jpeg','png'])];
                    $validation_message['image_input.'.$imgValKey.'.image'] = inputTitle($imgValKey).' must be an image';
                    $validation_message['image_input.'.$imgValKey.'.mimes'] = inputTitle($imgValKey).' file type not supported';
                }
                continue;
            }elseif($input_field == 'seo_image'){
                $validation_rule['image_input'] = ['nullable', 'image', new FileTypeValidate(['jpeg', 'jpg', 'png'])];
                continue;
            }
            $validation_rule[$input_field] = 'required';
        }
        $request->validate($validation_rule, $validation_message, ['image_input' => 'image']);
        if ($request->id) {
            $content = Frontend::findOrFail($request->id);
        } else {
            $content = Frontend::where('data_keys', $key . '.' . $request->type)->first();
            if (!$content || $request->type == 'element') {
                $content = new Frontend();
                $content->data_keys = $key . '.' . $request->type;
                $content->save();
            }
        }
        if ($type == 'data') {
            $inputContentValue['image'] = @$content->data_values->image;
            if ($request->hasFile('image_input')) {
                try {
                    $inputContentValue['image'] = uploadImage($request->image_input,imagePath()['seo']['path'], imagePath()['seo']['size'], @$content->data_values->image);
                } catch (\Exception $exp) {
                    $notify[] = ['error', 'Could not upload the image.'];
                    return back()->withNotify($notify);
                }
            }
        }else{
            if ($imgJson) {
                foreach ($imgJson as $imgKey => $imgValue) {
                    $imgData = @$request->image_input[$imgKey];
                    if (is_file($imgData)) {
                        try {
                            $inputContentValue[$imgKey] = $this->storeImage($imgJson,$type,$key,$imgData,$imgKey,@$content->data_values->$imgKey);
                        } catch (\Exception $exp) {
                            $notify[] = ['error', 'Could not upload the image.'];
                            return back()->withNotify($notify);
                        }
                    } else if (isset($content->data_values->$imgKey)) {
                        $inputContentValue[$imgKey] = $content->data_values->$imgKey;
                    }
                }
            }
        }
        $content->data_values = $inputContentValue;
        $content->save();
        $notify[] = ['success', 'Content has been updated.'];
        return back()->withNotify($notify);
    }



    public function frontendElement($key, $id = null)
    {
        $section = @getPageSections()->$key;
        if (!$section) {
            return abort(404);
        }

        unset($section->element->modal);
        $pageTitle = $section->name . ' Items';
        if ($id) {
            $data = Frontend::findOrFail($id);
            return view('admin.frontend.element', compact('section', 'key', 'pageTitle', 'data'));
        }
        return view('admin.frontend.element', compact('section', 'key', 'pageTitle'));
    }




    protected function storeImage($imgJson,$type,$key,$image,$imgKey,$old_image = null)
    {
        $path = 'assets/images/frontend/' . $key;
        if ($type == 'element' || $type == 'content') {
            $size = @$imgJson
            ->$imgKey->size;
            $thumb = @$imgJson
            ->$imgKey->thumb;
        }else{
            $path = imagePath()[$key]['path'];
            $size = imagePath()[$key]['size'];
            $thumb = @imagePath()[$key]['thumb'];
        }
        return uploadImage($image, $path, $size, $old_image, $thumb);
    }

    public function remove(Request $request)
    {
        $request->validate(['id' => 'required']);
        $frontend = Frontend::findOrFail($request->id);
        $key = explode('.', @$frontend->data_keys)[0];
        $type = explode('.', @$frontend->data_keys)[1];
        if (@$type == 'element' || @$type == 'content') {
            $path = 'assets/images/frontend/' . $key;
            $imgJson = @getPageSections()->$key->$type->images;
            if ($imgJson) {
                foreach ($imgJson as $imgKey => $imgValue) {
                    removeFile($path . '/' . @$frontend->data_values->$imgKey);
                    removeFile($path . '/thumb_' . @$frontend->data_values->$imgKey);
                }
            }
        }
        $frontend->delete();
        $notify[] = ['success', 'Content has been removed.'];
        return back()->withNotify($notify);
    }


}
