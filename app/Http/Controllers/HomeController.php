<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data = array();
        $data['keyword'] = '';
        $product = Product::query()->where('product_status', '=', 1)->where('created_at','>=',Carbon::now()->addDays(-60) )->orderby('created_at', 'desc');
        if ($request->has('keyword') && strlen($request->get('keyword')) > 0) {
            $data['keyword'] = $request->get('keyword');
            $product = $product->where('product_name', 'like', '%' . $request->get('keyword') . '%');
        }

        $data['all_product'] = $product->paginate(12)->appends($request->only('keyword'));
        $category_product1 = Category::where('status', '=', 1)->orderby('name', 'ASC')->limit(5)->get();
        $category_product2 = Category::where('status', '=', 1)->orderby('name', 'ASC')->limit(100)->OFFSET(5)->get();
        $brand_product1 = Brand::where('brand_status', 1)->orderby('brand_name', 'ASC')->get();
        $all_banner = Banner::all()->where('status', '=', 1);
        return view('pages.home')->with($data)
            ->with('category1', $category_product1)->with('category2', $category_product2)
            ->with('brand1', $brand_product1)
            ->with("all_banner", $all_banner);
    }

    public function sanpham(Request $request)
    {

        $data = array();
        $data['category_id'] = 0;
        $data['brand_id'] = 0;
        $data['keyword'] = '';
        $data['price_min'] = '';
        $data['price_max'] = '';
        $data['keyword'] = '';
        $product_list = Product::query()->where('product_status', '=', 1)->orderby('updated_at', 'desc');

        if ($request->has('price_min') && $request->get('price_min') > 0 && $request->get('price_max') == null) {
            $data['price_min'] = $request->get('price_min');
            $data['price_max'] = '';
            $check_price_min = $request->get('price_min');
            $product_list = $product_list->where('product_price', '>', (int)$check_price_min);
        }
        if ($request->has('price_max') && $request->get('price_max') > 0 && $request->get('price_min') == null) {
            $data['price_max'] = $request->get('price_max');
            $data['price_min'] = '';
            $check_price_max = $request->get('price_max');

            $product_list = $product_list->where('product_price', '<', (int)$check_price_max);
        }

        if ($request->has('price_max') && $request->get('price_max') > 0 && $request->has('price_min') && $request->get('price_min') > 0) {
            $data['price_min'] = $request->get('price_min');
            $data['price_max'] = $request->get('price_max');
            $check_price_min = $request->get('price_min');
            $check_price_max = $request->get('price_max');

            $product_list = $product_list->whereBetween('product_price', [(int)$check_price_min, (int)$check_price_max]);
        }


        if ($request->has('brand_id') && $request->get('brand_id') != 0) {
            $data['brand_id'] = $request->get('brand_id');
            $product_list = $product_list->where('brand_id', '=', $request->get('brand_id'));
        }
        if ($request->has('category_id') && $request->get('category_id') != 0) {
            $data['category_id'] = $request->get('category_id');
            $product_list = $product_list->where('category_id', '=', $request->get('category_id'));
        }
        if ($request->has('keyword') && strlen($request->get('keyword')) > 0) {
            $data['keyword'] = $request->get('keyword');
            $product_list = $product_list->where('product_name', 'like', '%' . $request->get('keyword') . '%');
        }
        $data['all_product'] = $product_list->paginate(9)
            ->appends($request->only('category_id'))
            ->appends($request->only('brand_id'))
            ->appends($request->only('price_min'))
            ->appends($request->only('price_max'))
            ->appends($request->only('keyword'));

        $category_product1 = Category::where('status', '=', 1)->orderby('name', 'ASC')->limit(5)->get();
        $category_product2 = Category::where('status', '=', 1)->orderby('name', 'ASC')->limit(100)->OFFSET(5)->get();
        $brand_product1 = Brand::where('brand_status', 1)->orderby('brand_name', 'ASC')->limit(3)->get();
        $brand_product2 = Brand::where('brand_status', 1)->orderby('brand_name', 'ASC')->limit(100)->OFFSET(3)->get();


        $categories = Category::where('status', '=', 1)->orderby('name', 'ASC')->get();
        $brands = Brand::where('brand_status', 1)->orderby('brand_name', 'ASC')->get();


        return view('pages.product.sanpham')->with($data)
            ->with('category1', $category_product1)->with('category2', $category_product2)
            ->with('brand1', $brand_product1)->with('brand2', $brand_product2)
            ->with('categories', $categories)
            ->with('brands', $brands);
    }

    public function remove(Request $request)
    {
        $id = $request->get('id');
        // lấy thông tin giỏ hàng từ trong session.
        $shoppingCart = Session::get('shoppingCart');
        // nếu session ko có thông tin giỏ hàng
        if ($shoppingCart != null) {
            if (array_key_exists($id, $shoppingCart)) {
                unset($shoppingCart[$id]);
            }
        }
        Session::put('shoppingCart', $shoppingCart);
        return redirect('/shopping-cart/show');
    }
}
