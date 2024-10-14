<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function AboutPage()
    {
        $aboutpage = About::find(1);
        return view('admin.about_page.about_page_all', compact('aboutpage'));
    } // End Method

    public function UpdateAbout(Request $request)
    {
        $about_id = $request->id;
        $about = About::findOrFail($about_id);

        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'short_title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('about_image')) {
            $file = $request->file('about_image');

            // Generate a filename based on the current date and time
            $filename = date('YmdHi') . $file->getClientOriginalName();

            // Move the file to the public directory
            $file->move(public_path('upload/home_about'), $filename);

            $save_url = 'upload/home_about/' . $filename;

            // Update the record with the new image path
            $about->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $save_url,
            ]);

            $notification = [
                'message' => 'About Page Updated with Image Successfully',
                'alert-type' => 'success',
            ];
        } else {
            $about->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
            ]);

            $notification = [
                'message' => 'About Page Updated without Image Successfully',
                'alert-type' => 'success',
            ];
        }

        return redirect()->back()->with($notification);
    }

    public function HomeAbout()
    {
        $aboutpage = About::find(1);
        return view('frontend.about_page', compact('aboutpage'));
    } // End Method

    public function AboutMultiImage()
    {
        
        $allMultiImage = MultiImage::all();
        return view('admin.about_page.multimage');
    } // End Method

    public function StoreMultiImage(Request $request)
{
    $images = $request->file('multi_image');
    foreach ($images as $image) {
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        // Save the image using Intervention Image or directly move it
      //  Image::make($image)->resize(220, 220)->save(public_path('upload/multi/' . $name_gen));

        // Store the relative URL in the database, not the full path

         // Save the file to the public directory without resizing
         $image->move(public_path('upload/multi'), $name_gen);

        $save_url = 'upload/multi/' . $name_gen;
        MultiImage::create([
            'multi_image' => $save_url,
            'created_at' => now(),
        ]);
    }

    $notification = [
        'message' => 'Multi Image Inserted Successfully',
        'alert-type' => 'success',
    ];

    return redirect()->back()->with($notification);

    } // End Method
    public function AllMultiImage(){
        $allMultiImage = MultiImage::all();
        return view('admin.about_page.all_multiimage',compact('allMultiImage'));
     }// End Method 

     public function EditMultiImage($id){

        $multiImage = MultiImage::findOrFail($id);
        return view('admin.about_page.edit_multi_image',compact('multiImage'));

     }// End Method 


     public function UpdateMultiImage(Request $request){

           $multi_image_id = $request->id;

        if ($request->file('multi_image')) {
            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            //Image::make($image)->resize(220,220)->save('upload/multi/'.$name_gen);
            $image->move(public_path('upload/multi'), $name_gen);
            $save_url = 'upload/multi/'.$name_gen;

            MultiImage::findOrFail($multi_image_id)->update([
                 
                'multi_image' => $save_url,

            ]); 
            $notification = array(
            'message' => 'Multi Image Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.multi.image')->with($notification);

        }

     }// End Method 

     public function DeleteMultiImage($id){
        $multi = MultiImage::findOrFail($id);
        $img = $multi->multi_image;
        unlink($img);
        MultiImage::findOrFail($id)->delete();
         $notification = array(
            'message' => 'Multi Image Deleted Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
       
     }// End Method 


}
