<?php

namespace App\Http\Controllers\Home;

use App\Models\portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    public function AllPortfolio(){
       $portfolio = portfolio::latest()->get();
       return view('admin.portfolio.portfolio_all',compact('portfolio'));
    }

    public function AddPortfolio(){
        return view('admin.portfolio.portfolio_add',);
    }

    public function StorePortfolio(Request $request){
          $request->validate([
          'portfolio_name'=> 'required',
          'portfolio_title'=> 'required',
          'portfolio_image'=> 'required',
        //   'portfolio_name'=> 'required',

          ],[
            'portfolio_name.required'=>'Portfolio Name is required',
            'portfolio_title.required'=>'Portfolio Title is required',

          ]);

          $image = $request->file('portfolio_image');
          $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); //3333333.jpg
          Image::make($image)->resize(1020,519)->save('upload/portfolio/'.$name_gen);
          $save_url = 'upload/portfolio/'.$name_gen;

          portfolio::insert([
              'portfolio_name'=> $request->portfolio_name,
              'portfolio_title'=> $request->portfolio_title,
              'portfolio_description'=> $request->portfolio_description,
              'portfolio_image'=> $save_url,
              'created_at'=> Carbon::now(),
          ]);

          $notification = array(
              "message"=>'Portfolio Inserted successfully',
              "alert-type"=>'success'
            );

              return redirect()->route('all.portfolio')->with($notification);

    }//end method


       public function EditPortfolio($id){

        $portfolio = portfolio::findOrFail($id);
        return view('admin.portfolio.portfolio_edit',compact('portfolio'));


       }//end method

       public function UpdatePortfolio(Request $request){


        $portfolio_id = $request->id;
        if($request->file('portfolio_image')){
            $image = $request->file('portfolio_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); //3333333.jpg
            Image::make($image)->resize(1020,519)->save('upload/portfolio/'.$name_gen);
            $save_url = 'upload/portfolio/'.$name_gen;

            portfolio::findOrFail( $portfolio_id)->update([
                'portfolio_name'=> $request->portfolio_name,
                'portfolio_title'=> $request->portfolio_title,
                'portfolio_description'=> $request->portfolio_description,
                'portfolio_image'=> $save_url,
            ]);

            $notification = array(
                "message"=>'Portfolio image updated with successfully',
                "alert-type"=>'success'
              );

                return redirect()->route('all.portfolio')->with($notification);

        }
        else{

            portfolio::findOrFail( $portfolio_id)->update([
                'portfolio_name'=> $request->portfolio_name,
                'portfolio_title'=> $request->portfolio_title,
                'portfolio_description'=> $request->portfolio_description,
            ]);

            $notification = array(
                "message"=>'Portfolio updated image without successfully',
                "alert-type"=>'success'
              );

              return redirect()->route('all.portfolio')->with($notification);

        }


       }//end method


       public function DeletePortfolio($id){
        $portfolio = portfolio::findOrFail($id);
        $img = $portfolio->portfolio_image;
        unlink($img);

        portfolio::findOrFail($id)->delete();

        $notification = array(
          "message"=>'Portfolio image deleted successfully',
         "alert-type"=>'success'
        );

        return redirect()->back()->with($notification);


    }

    public function PortfolioDetails($id){

        $portfolio = portfolio::findOrFail($id);
        return view('frontend.portfolio_details',compact('portfolio'));

    }

    public function HomePortfolio(){
        $portfolio = portfolio::latest()->get();
        return view('frontend.portfolio',compact('portfolio'));
    }

}
