<?php

namespace App\Http\Controllers\Home;

use Intervention\Image\Facades\Image; // Ensure you're importing the Image facade
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlide;


class HomeSliderController extends Controller
{
    public function HomeSlider()
    {
        $homeslide = HomeSlide::find(1);
        return view('admin.home_slide.home_slide_all', compact('homeslide'));
    } // End Method 

    public function UpdateSlider(Request $request)
    {
        $slide_id = $request->id;
        if ($request->file('home_slide')) {
            $image = $request->file('home_slide');

            // Generate a unique file name
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            // Resize and save the image using the Intervention Image package
            $resizedImage = Image::make($image->getRealPath())->resize(636, 852);
            $resizedImage->save('upload/home_slide/' . $name_gen);

            $save_url = 'upload/home_slide/' . $name_gen;

            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'home_slide' => $save_url,
            ]);

            $notification = [
                'message' => 'Home Slide Updated with Image Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->back()->with($notification);
        } else {
            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
            ]);

            $notification = [
                'message' => 'Home Slide Updated without Image Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->back()->with($notification);
        } // end Else
    } // End Method 
}
