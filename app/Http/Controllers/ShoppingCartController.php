<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Discount;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function add(Request $request)
    {
        $id = $request->get('id');
        $quantity = $request->get('quantity');
        $size = $request->get('size');
        // kiểm tra sản phẩm theo id truyền lên.
        $product = Product::find($id);
        if ($product == null) {
            // nếu không tồn tại sản phẩm đưa về trang lỗi ko tìm thấy.
            return view('pages.error.404');
        }
        // lấy thông tin giỏ hàng từ trong session.
        $shoppingCart = Session::get('shoppingCart');
        // nếu session ko có thông tin giỏ hàng
        if ($shoppingCart == null) {
            // thì tạo mới giỏ hàng là một mảng các key và value
            $shoppingCart = array(); // key và value
        }
        // kiểm xem sản phẩm có trong giỏ hàng hay không.
        $cartItem = null;
        if (array_key_exists($product->id, $shoppingCart)) {
            $cartItem = $shoppingCart[$product->id];
        }
        if ($cartItem == null) {
            // nếu không, tạo mới một cart item.
            $cartItem = array(
                'id' => $product->id,
                'product_name' => $product->product_name,
                'product_desc' => $product->product_desc,
                'product_price' => $product->product_price,
                'brand_name'=> $product->brand->brand_name,
                'category' => $product->category->name,
                'thumbnail' => $product->small_photo,
                'size' => $size,
                'quantity' => $quantity,
            );
        } else {
            // nếu có, cộng số lượng sản phẩm thêm 1.
            $cartItem['quantity'] += $quantity;
            $cartItem['size'] = $size;
        }
        // đưa sản phẩm vào giỏ hàng với key chính là id của sản phẩm.
        $shoppingCart[$product->id] = $cartItem;
        if($cartItem['quantity'] <= 0){
            unset($shoppingCart[$product->id]);
        }
       $request->session()->put('shoppingCart', $shoppingCart);
//        return redirect('/shopping-cart/show');
        return view('pages.cart.cart')->with(compact('product'));
    }

    public function add_list(Request $request)
    {
        $id = $request->get('id');
        $quantity = $request->get('quantity');
        $size = $request->get('size');
        // kiểm tra sản phẩm theo id truyền lên.
        $product = Product::find($id);
        if ($product == null) {
            // nếu không tồn tại sản phẩm đưa về trang lỗi ko tìm thấy.
            return view('pages.error.404');
        }
        // lấy thông tin giỏ hàng từ trong session.
        $shoppingCart = Session::get('shoppingCart');
        // nếu session ko có thông tin giỏ hàng
        if ($shoppingCart == null) {
            // thì tạo mới giỏ hàng là một mảng các key và value
            $shoppingCart = array(); // key và value
        }
        // kiểm xem sản phẩm có trong giỏ hàng hay không.
        $cartItem = null;
        if (array_key_exists($product->id, $shoppingCart)) {
            $cartItem = $shoppingCart[$product->id];
        }
        if ($cartItem == null) {
            // nếu không, tạo mới một cart item.
            $cartItem = array(
                'id' => $product->id,
                'product_name' => $product->product_name,
                'product_price' => $product->product_price,
                'thumbnail' => $product->small_photo,
                'size' => $size,
                'quantity' => $quantity
            );
        } else {
            // nếu có, cộng số lượng sản phẩm thêm 1.
            $cartItem['quantity'] += $quantity;
            $cartItem['size'] = $size;
        }
        // đưa sản phẩm vào giỏ hàng với key chính là id của sản phẩm.
        $shoppingCart[$product->id] = $cartItem;
        if($cartItem['quantity'] <= 0){
            unset($shoppingCart[$product->id]);
        }
        $request->session()->put('shoppingCart', $shoppingCart);
        return redirect('/shopping-cart/show');

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
        return view('pages.cart.cart');
    }
    public function remove_list(Request $request)
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
        return \redirect('shopping-cart/show');
    }


    public function show(Request $request)
    {
        return view('pages.cart.show_cart')->with('shoppingCart', Session::get('shoppingCart'));
    }

    public function get_discount(Request $request)
    {
        $data = $request->all();
        $coupon = Discount::where('name',$data['discount_name'])->where('status',1)->whereDate ('end_time','>=',Carbon::now()->toDateString())->first();
        if ($coupon){
            $count_coupon = $coupon->count();
            if ($count_coupon >0){
                $coupon_session = Session::get('coupon');
                if ($coupon_session == true){
                    $is_avaiable =0;
                    if ($is_avaiable==0){
                        $cou[] = array(
                          'coupon_name' => $coupon->name,
                          'coupon_value' => $coupon->value,
                        );
                        Session::put('coupon', $cou);
                    }
                }else{
                    $cou[] = array(
                        'coupon_name' => $coupon->name,
                        'coupon_value' => $coupon->value,
                    );
                    Session::put('coupon', $cou);
                }
                Session::save();
                return \redirect()->back()->with('message', "Thêm mã giảm giá thành công");
            }
        }else{
            Session::remove('coupon');
            return \redirect()->back()->with('message', "Mã giảm giá không tồn tại hoặc đã hết hạn!");
        }
    }

}
