<?php

namespace App\Http\Controllers;

use App\Account;
use App\Brand;
use App\Category;
use App\Compare;
use App\compare_free;
use App\Http\Requests\ProductValidate;
use App\Product;
use App\Whish;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use mysql_xdevapi\CollectionAdd;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function send_ads(Request $request){

        $data = array();
        $data['productsid'] = $request->get('productsid');
        $data['emails'] = $request->get('emails');
        $data['note'] = $request->get('note');
        $emailss = $request->get('emails');
        foreach ($emailss as $email){
            $data['email'] = $email;
            Mail::send('admin.email.sendads',$data, function ($message) use ($email) {
                $message->to($email)->subject('Những sản phẩm hot nhất mới được cập nhật');
                $message->from('locnxth1907005@fpt.edu.vn', 'ShopAz');
            });
        }
        return 'ok';

    }
    public function ads(){
        $products = Product::all()->Where('product_status','=',1);
        $accounts = Account::all()->Where('status','=',1)->where('role','=',0);
        return view('admin.ads.form')->with('products',$products)->with('accounts',$accounts);;
    }

    public function whish_list_add(Request $request)
    {
        $obj = new Whish();
        $obj->user_id = $request->user_id;
        $obj->product_id = $request->product_id;
        $obj->save();
        return $obj;

    }

    public function delete_whish($id){
        $obj = Whish::find($id);
        $obj->delete();
        return Redirect::to('/whishlist');
    }
    public function whish_list()
    {
        $products = Product::where('product_status', '=', 1);
        $whishlist = Whish::all()->where('user_id','=',Session::get('customer_id'));
        return view('pages.product.whishlist')->with('whishlist',$whishlist);

    }
    public function compare_add(Request $request)
    {
        $obj = new Compare();
//        $obj->user_id = $request->user_id;
        $obj->user_id = $request->user_id;
        $obj->product_id = $request->product_id;
        $obj->status=1;
        $obj->save();
        return $obj;
    }
    public function compare_del(){
        $obj = Compare::where('status','=',1);
        $obj->delete();
        return Redirect::to('/');
    }
    public function compare_list()
    {
//        $products = Product::where('product_status', '=', 1);
        $comparelist = Compare::all()->where('user_id','=',Session::get('customer_id'));
        return view('pages.product.compare')->with('comparelist',$comparelist);
    }
    public function compare_add_free(Request $request){
        $obj = new compare_free();
        $obj->product_id = $request->product_id;
        $obj->status= 1;
        $obj->save();
    }
    public function compare_list_free()
    {
        $comparelist = compare_free::all()->where('status','=',1);
        return view('pages.product.compare_list_free')->with('comparelist',$comparelist);
    }
    public function compare_del_free(){
        $obj = compare_free::where('status','=',1);
        $obj->delete();
        return Redirect::to('/');
    }


    public function customer_detail_product($id)
    {
        $product = Product::all()->where('product_status', '=', 1)->where('id', '=', $id)->first();
        return view('pages.product.detail')->with('product', $product);
    }

    public function customer_list_product(Request $request)
    {
        $data = array();
        $data['keyword'] = '';
        $data['sort_by'] = 0;
        $data['category_id'] = 0;
        $data['price_min'] = '';
        $data['price_max'] = '';
        $data['brand_id'] = 0;
        $all_category = Category::all()->where('status', '=', 1);
        $all_brand = Brand::all()->where('brand_status', '=', 1);
        $products = Product::query()->where('product_status', '=', 1);


        if ($request->has('brand_id') && $request->get('brand_id') != 0) {
            $data['brand_id'] = $request->get('brand_id');
            $products = $products->where('brand_id', '=', $request->get('brand_id'));
        }
        if ($request->has('category_id') && $request->get('category_id') != 0) {
            $data['category_id'] = $request->get('category_id');
            $products = $products->where('category_id', '=', $request->get('category_id'));
        }
        if ($request->has('keyword') && strlen($request->get('keyword')) > 0) {
            $data['keyword'] = $request->get('keyword');
            $products = $products->where('product_name', 'like', '%' . $request->get('keyword') . '%');
        }
        if ($request->has('sort_by') && $request->get('sort_by') != 0) {
            $data['sort_by'] = $request->get('sort_by');
            if ($request->get('sort_by') == 1) {
                $products = $products->orderBy('product_name', 'asc');
            }
            if ($request->get('sort_by') == 2) {
                $products = $products->orderBy('product_name', 'desc');
            }
            if ($request->get('sort_by') == 3) {
                $products = $products->orderBy('product_price', 'asc');
            }
            if ($request->get('sort_by') == 4) {
                $products = $products->orderBy('product_price', 'desc');
            }

        }
        if ($request->has('price_max') && $request->get('price_max') != '') {
            $data['price_min'] = $request->get('price_min');
            $data['price_max'] = $request->get('price_max');
            $check_price_min = $request->get('price_min');
            $check_price_max = $request->get('price_max');
            $products = $products->whereBetween('product_price', [$check_price_min, $check_price_max]);
        }
        $data['all_product'] = $products->paginate(15)
            ->appends($request->only('keyword'))
            ->appends($request->only('sort_by'))
            ->appends($request->only('brand_id'))
            ->appends($request->only('category_id'))
            ->appends($request->only('price_min'))
            ->appends($request->only('price_max'));

        return view('pages.product.list')->with($data)
            ->with('all_category', $all_category)
            ->with('all_brand', $all_brand);
    }

    public function index(Request $request)
    {
        // tạo biến data là một mảng chứa dữ liệu trả về.
        $data = array();
        $data['category_id'] = 0;
        $data['brand_id'] = 0;
        $data['keyword'] = '';
        $categories = Category::all();
        $brands = Brand::all();
        $product_list = Product::query()->whereBetween('product_status',[0,1])->orderby('updated_at', 'desc');
        if ($request->has('category_id') && $request->get('category_id') != 0) {
            $data['category_id'] = $request->get('category_id');
            $product_list = $product_list->where('category_id', '=', $request->get('category_id'));
        }
        if ($request->has('brand_id') && $request->get('brand_id') != 0) {
            $data['brand_id'] = $request->get('brand_id');
            $product_list = $product_list->where('brand_id', '=', $request->get('brand_id'));
        }
        if ($request->has('keyword') && strlen($request->get('keyword')) > 0) {
            $data['keyword'] = $request->get('keyword');
            $product_list = $product_list->where('product_name', 'like', '%' . $request->get('keyword') . '%');
        }
        if ($request->has('start') && strlen($request->get('start')) > 0 && $request->has('end') && strlen($request->get('end')) > 0) {
            $data['start'] = $request->get('start');
            $data['end'] = $request->get('end');
            $from = date($request->get('start') . ' 00:00:00');
            $to = date($request->get('end') . ' 23:59:00');
            $product_list = $product_list->whereBetween('created_at', [$from, $to]);
        }
        $data['list'] = $product_list->get();
        $data['categories'] = $categories;
        $data['brands'] = $brands;

        return view('admin.product.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', '=', 1)->get();
        $brands = Brand::where('brand_status', '=', 1)->get();
        return view('admin.product.add')->with(compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductValidate $request)
    {
        $request->validated();
        $obj = new Product();
        $obj->product_name = $request->get('product_name');
        $obj->category_id = $request->get('category_id');
        $obj->brand_id = $request->get('brand_id');
        $desc = $request->get('product_desc');
        if ($desc == null || $desc == '') {
            $obj->product_desc = '';
        } else {
            $obj->product_desc = $desc;
        }

        $obj->product_price = $request->get('product_price');
        $obj->product_status = $request->get('product_status');
        $obj->thumbnail = '';
        $thumbnails = $request->get('thumbnails');
        foreach ((array)$thumbnails as $thumbnail) {
            $obj->thumbnail .= $thumbnail . ',';
        }
        $obj->size = '';
        $size = $request->get('sizes');
        foreach ((array)$size as $size) {
            $obj->size .= $size . ',';
        }
        $obj->save();
        $request->session()->flash('message', 'Thêm mới sản phẩm thành công!');
        return redirect('admin/product');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $obj = Product::find($id);
        if ($obj == null) {
            return 'Không tìm thấy sản phẩm';
        }
        return view('Admin.Product.edit')->with(compact('obj', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductValidate $request, $id)
    {
        $request->validated();
        $obj = Product::find($id);
        $obj->product_name = $request->get('product_name');
        $obj->category_id = $request->get('category_id');
        $obj->brand_id = $request->get('brand_id');
        $desc = $request->get('product_desc');
        if ($desc == null || $desc == '') {
            $obj->product_desc = '';
        } else {
            $obj->product_desc = $desc;
        }
        $obj->product_price = $request->get('product_price');
        $obj->product_status = $request->get('product_status');
        $thumbnails = $request->get('thumbnails');
        $obj->thumbnail = '';
        foreach ((array)$thumbnails as $thumbnail) {
            $obj->thumbnail .= $thumbnail . ',';
        }
        $obj->size = '';
        $size = $request->get('sizes');
        foreach ((array)$size as $size) {
            $obj->size .= $size . ',';
        }
        $obj->save();
        $request->session()->flash('message', 'Sửa sản phẩm thành công!');
        return redirect('admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function Unactive_product($id)
    {
        $obj = Product::where('id', '=', $id)->first();
        $obj->product_status = 0;
        $obj->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $obj->save();
        session()->flash('message', 'Ẩn sản phẩm thành công!');
        return Redirect::to('admin/product/');
    }

    public function Active_product($id)
    {
        $obj = Product::where('id', '=', $id)->first();
        $obj->product_status = 1;
        $obj->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $obj->save();
        session()->flash('message', 'Hiện sản phẩm thành công!');
        return Redirect::to('admin/product/');
    }
    public function destroyAll(Request $request)
    {
        $ids = $request->get('ids');
        // delete mềm -> chuyển trạng thái.
        foreach (Product::whereIn('id', $ids)->get() as $value){
            $value->product_status = -1;
            $value->save();
        }
        return $request->get('ids');
    }
    public function delete_product($id)
    {
        $obj = Product::where('id', '=', $id)->first();
        $obj->product_status = -1;
        $obj->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $obj->save();
    }
}
