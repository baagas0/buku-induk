<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use App\Setting;

class SettingController extends Controller
{
    public function getIndex() {
        return view('master.setting.main');
    }

    public function postUpdate(Request $req) {
        $slug = $req->slug;
        $type = 'text';
        $return = '';

        if ($slug == 'favicon' || $slug == 'logo_l_1' || $slug == 'logo_l_2') {
            $type = 'image';
        }

        if ($type = 'image') {
            $image = $req->file('image');
            $path = 'public/media/setting/';
            Storage::disk('local')->makeDirectory($path);
            $image_name = '-'.time().'.'.$image->clientExtension();

            if (Storage::putFileAs($path, $image, $image_name)) {
                $value = 'storage/media/setting/'.$image_name;
                $return = asset($value);
            }else {
                return 'failed';
            }
        }

        $data = Setting::where('slug', $slug)->update([
            'value' => $value,
        ]);
        return $return;
    }
}
