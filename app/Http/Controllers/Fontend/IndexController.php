<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Multiimg;
use App\Models\Product;
use App\Models\Silder;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $category = Category::orderBy('category_name_en','ASC')->get();
        $categories = Category::orderBy('category_name_en','ASC')->limit(6)->get();
        $products = Product::where('status',1)->latest()->get();
        $featured = Product::where('featured',1)->where('status',1)->latest()->get();
        $hot_deals = Product::where('hot_deals',1)->where('status',1)->where('discount_price','!=',NULL)->latest()->get();
        $special_offer = Product::where('special_offer',1)->where('status',1)->inRandomOrder()->take(3)->get();
        $special_offer2 = Product::where('special_offer',1)->where('status',1)->inRandomOrder()->take(3)->get();
        $special_deals = Product::where('special_deals',1)->where('status',1)->inRandomOrder()->take(3)->get();
        $special_deals2 = Product::where('special_deals',1)->where('status',1)->inRandomOrder()->take(3)->get();
        $sliders = Silder::where('status',1)->orderBy('id','DESC')->limit(4)->get();
        $skip_category_0 = Category::skip(0)->first(); 
        $skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get(); 
        $skip_brand_0 = Brand::skip(8)->first(); 
        $skip_product_1 = Product::where('status',1)->where('brand_id',$skip_brand_0->id)->orderBy('id','DESC')->get(); 
        return view('fontend.index',compact('category','sliders','categories','products','featured','hot_deals','special_offer','special_offer2','special_deals','special_deals2','skip_category_0','skip_product_0','skip_product_1','skip_brand_0'));
    }
    public function singleProduct($id,$slug)
    {
        $products = Product::find($id);
        $multi_img = Multiimg::where('product_id',$id)->get();
        return view('fontend.single-product',compact('products','multi_img'));
    }
    public function tagWiseProduct($tag)
    {
        $products = Product::where('status',1)->where('product_tag_en',$tag)->orWhere('product_tag_bn',$tag)->orderBy('id','DESC')->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();
        // dd($products);
        return view('fontend.tag-wise-product',compact('products','categories'));
    }
}