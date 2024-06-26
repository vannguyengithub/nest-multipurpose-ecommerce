<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Image;

class BannerController extends Controller
{
    public function AllBanner() {
        $banners = Banner::latest()->get();
        return view('backend.banner.banner_all', compact('banners'));
    }//end method

    public function AddBanner() {
        return view('backend.banner.banner_add');
    }//end method

    public function StoreBanner(Request $request) {
        $image =  $request->file('banner_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(768, 450)->save('upload/banner/'.$name_gen);
        $save_url = 'upload/banner/'.$name_gen;

        Banner::insert([
            'banner_title' => $request->banner_title,
            'banner_url' => $request->banner_url,
            'banner_image' => $save_url
        ]);
        $notification = array(
            'message' => 'Banner Inserted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('all.banner')->with($notification);
    }//end method

    public function EditBanner($id) {
        $banners  = Banner::findOrFail($id);
        return view('backend.banner.banner_edit', compact('banners'));
    }//end method

    public function UpdateBanner(Request $request) {
        $banner_id = $request->id;
        $old_img  = $request->old_image;

        if ($request->file('banner_image')) {
            $image =  $request->file('banner_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(768, 450)->save('upload/banner/'.$name_gen);
            $save_url = 'upload/banner/'.$name_gen;

            // check unlink if math old img
            if (file_exists($old_img)) {
                unlink($old_img);
            }

            Banner::findOrFail($banner_id)->update([
                'banner_title' => $request->banner_title,
                'banner_url' => $request->banner_url,
                'banner_image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Banner Updated With Image  Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.banner')->with($notification);
        } else {
            Banner::findOrFail($banner_id)->update([
                'banner_title' => $request->banner_title,
                'banner_url' => $request->banner_url,
            ]);
            $notification = array(
                'message' => 'Banner Updated Without Image Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('all.banner')->with($notification);
        }
    }//end method

    public function DeleteBanner($id) {
        $banner = Banner::findOrFail($id);
        $img = $banner->banner_image;
        unlink($img);

        Banner::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }//end method

}
