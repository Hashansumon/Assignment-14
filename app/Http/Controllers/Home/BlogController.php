<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
   public function AllBlog(){

      $blogs = Blog::latest()->get();
       return view('admin.blogs.blog_all',compact('blogs'));
   }//   end method

  public function AddBlog(){
    $blogcategories = BlogCategory::orderBy('blog_category','ASC')->get();
    return view('admin.blogs.blog_add',compact('blogcategories'));
  }
//   end method

  public function StoreBlog(Request $request){

    $image = $request->file('blog_image');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); //3333333.jpg
    Image::make($image)->resize(430,327)->save('upload/blog/'.$name_gen);
    $save_url = 'upload/blog/'.$name_gen;

    Blog::insert([
        'blog_category_id'=> $request->blog_category_id,
        'blog_title'=> $request->blog_title,
        'blog_tags'=> $request->blog_tags,
        'blog_description'=> $request->blog_description,
        'blog_image'=> $save_url,
        'created_at'=> Carbon::now(),
    ]);

    $notification = array(
        "message"=>'Blog Inserted successfully',
        "alert-type"=>'success'
      );

        return redirect()->route('all.blog')->with($notification);

  }//   end method

      public function EditBlog($id){

        $blogs = Blog::findOrFail($id);
        $blogcategories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blogs.blog_edit',compact('blogs','blogcategories'));

      }//   end method

      public function UpdateBlog(Request $request){

        $blog_id = $request->id;
        if($request->file('blog_image')){
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); //3333333.jpg
            Image::make($image)->resize(430,327)->save('upload/blog/'.$name_gen);
            $save_url = 'upload/blog/'.$name_gen;

            Blog::findOrFail( $blog_id)->update([
                'blog_category_id'=> $request->blog_category_id,
                'blog_title'=> $request->blog_title,
                'blog_tags'=> $request->blog_tags,
                'blog_description'=> $request->blog_description,
                'blog_image'=> $save_url,
            ]);

            $notification = array(
                "message"=>'Blog updated image with successfully',
                "alert-type"=>'success'
              );

                return redirect()->route('all.blog')->with($notification);

        }
        else{

            Blog::findOrFail( $blog_id)->update([
                'blog_category_id'=> $request->blog_category_id,
                'blog_title'=> $request->blog_title,
                'blog_tags'=> $request->blog_tags,
                'blog_description'=> $request->blog_description,
            ]);
            $notification = array(
                "message"=>'Blog updated image without successfully',
                "alert-type"=>'success'
              );

              return redirect()->route('all.blog')->with($notification);

        }


      }//end method


      public function DeleteBlog($id){

        $blogs = Blog::findOrFail($id);
        $img = $blogs->blog_image;
        unlink($img);

        Blog::findOrFail($id)->delete();

        $notification = array(
          "message"=>'Blog image deleted successfully',
         "alert-type"=>'success'
        );

        return redirect()->back()->with($notification);


      }//end method

      public function BlogDetails($id){
        $allblogs = Blog::latest()->limit(5)->get();
        $blogs = Blog::findOrFail($id);
        $blogcategories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('frontend.blog_details',compact('blogs','allblogs','blogcategories'));
      }//end method

      public function CategoryBlog($id){
           $blogpost = Blog::where('blog_category_id',$id)->orderBy('id','DESC')->get();
           $allblogs = Blog::latest()->limit(5)->get();
           $blogcategories = BlogCategory::orderBy('blog_category','ASC')->get();
           $categoryname = BlogCategory::findOrFail($id);
           return view('frontend.cat_blog_details',compact('blogpost','allblogs','blogcategories','categoryname'));
      }//end method


      public function HomeBlog(){
        $blogcategories = BlogCategory::orderBy('blog_category','ASC')->get();
        $allblogs = Blog::latest()->get();
        return view('frontend.blog',compact('allblogs','blogcategories'));
      }



}
