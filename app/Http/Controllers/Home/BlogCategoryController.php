<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\Blog;
class BlogCategoryController extends Controller
{
    public function AllBlogCategory(){
        $blogcategory = BlogCategory::latest()->get();
        return view('admin.blog_category.blog_category_all',compact('blogcategory'));
    } // End Method

    public function AddBlogCategory(){
        return view('admin.blog_category.blog_category_add');
    } // End Method
    public function StoreBlogCategory(Request $request){
         $request->validate([
            'blog_category' => 'required' 
        ],[
            'blog_category.required' => 'Blog Cateogry Name is Required',
            
        ]);
 
         
            BlogCategory::insert([
                'blog_category' => $request->blog_category,               
            ]); 
            $notification = array(
            'message' => 'Blog Category Inserted Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('all.blog.category')->with($notification);
    } // End Method

    public function EditBlogCategory($id){
        $blogcategory = BlogCategory::findOrFail($id);
        return view('admin.blog_category.blog_category_edit',compact('blogcategory'));
    } // End Method

    
    public function UpdateBlogCategory(Request $request,$id){
         BlogCategory::findOrFail($id)->update([
                'blog_category' => $request->blog_category,               
            ]); 
            $notification = array(
            'message' => 'Blog Category Updated Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('all.blog.category')->with($notification);
    } // End Method
    public function DeleteBlogCategory($id){
        BlogCategory::findOrFail($id)->delete();
         $notification = array(
            'message' => 'Blog Category Deleted Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);       
    } // End Method.

    public function BlogDetails($id) {
        $blog = Blog::findOrFail($id); // Single blog instance, renamed to $blog
        $allblogs = Blog::latest()->limit(5)->get(); // Collection of recent blogs
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get(); // List of categories
        $categoryname = BlogCategory::findOrFail($blog->blog_category_id); // Fetch related category
    
        return view('frontend.cat_blog_details', compact('blog', 'allblogs', 'categories', 'categoryname'));
    }
    public function CategoryBlog($id) {
        $blogpost = Blog::where('blog_category_id', $id)->orderBy('id', 'DESC')->get();
        $allblogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $categoryname = BlogCategory::findOrFail($id);
    
        return view('frontend.cat_blog_details', compact('blogpost', 'allblogs', 'categories', 'categoryname'));
    }
    

     public function HomeBlog(){

        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        $allblogs = Blog::latest()->get();
        return view('frontend.blog',compact('allblogs','categories'));

     } // End Method 

}
 