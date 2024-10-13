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
    $slide = HomeSlide::findOrFail($slide_id);

    if ($request->file('home_slide')) {
        $file = $request->file('home_slide');

        // Generate a filename based on the current date and time
        $filename = date('YmdHi') . $file->getClientOriginalName();

        // Move the file to the public directory
        $file->move(public_path('upload/home_slide'), $filename);

        $save_url = 'upload/home_slide/' . $filename;

        // Update the record with the new image path
        $slide->update([
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
        $slide->update([
            'title' => $request->title,
            'short_title' => $request->short_title,
            'video_url' => $request->video_url,
        ]);

        $notification = [
            'message' => 'Home Slide Updated without Image Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }
}

}
