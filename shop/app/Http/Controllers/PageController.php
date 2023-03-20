<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Cart;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Customer;
use App\Models\User;
use Session;
use Hash;
use Auth;

class PageController extends Controller
{
    //
      public function getIndex(){
        $slide =Slide::all();
        $new_product =Product::where('new',1)->paginate(4);

        // SP khuyen mai
        $sp_k = Product::where('new',0)->paginate(4,['*'],'pag');

        // return view('page.trangchu','slide'=>$slide);
        return view('page.trangchu',compact('slide','new_product','sp_k',));
    }
      public function getLoaiSp($type){
        $sp_theoloai=Product::where('id_type',$type)->paginate(3);
        $sp_khac=Product::where('id_type','<>',$type)->paginate(3,['*'], 'pag');
        $loai=ProductType::all();
        $loai_sp=ProductType::where('id',$type)->first();
        return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
      }
      public function getCTSp(Request $req){
        $sanpham=Product::where('id',$req->id)->first();
        $sptt=Product::where('id_type',$sanpham->id_type)->paginate(3);
        $new_product =Product::where('new',1)->paginate(4);
        return view('page.chitiet_sanpham',compact('sanpham','sptt','new_product'));
      }
      public function getLienhe(){
        return view('page.lienhe');
      }
      public function getGioiThieu(){
        return view('page.gioithieu');
      }
      public function getThemVaoGioHang(Request $req,$id){
        $product=Product::find($id);
        $oldCart=Session('cart')?Session::get('cart'):null;
        $cart= new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
      }
      public function getXoaKhoiGioHang($id){
        $oldCart= Session::has('cart')?Session::get('cart'):null;
        $cart= new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items)>0) {
          Session::put('cart',$cart);
          // code...
        }
        else{
          Session::forget('cart');
        }
        
        return redirect()->back();
      }
      public function getDatHang(){
        if (Session::has('cart')) {
                 $oldCart =Session::get('cart');
                 $cart= new Cart($oldCart);
                  // dd($cart);
                 // code...
                return view('page.dathang',[
                'cart'=>Session::get('cart'),
                'product_cart'=>$cart->items,
                'totalPrice'=>$cart->totalPrice,
                'totalQty'=>$cart->totalQty]);
             }
        else{
          return view('page.dathang');
        }
        
      }
        public function postDatHang(Request $req){
         $cart=Session::get('cart');
        
        $customer=new Customer;
        $customer->name=$req->name;
        $customer->gender=$req->gender;
        $customer->email=$req->email;
        $customer->address=$req->address;
        $customer->phone_number=$req->phone;
        $customer->note=$req->note;
        $customer->save();

        $bill=new Bill; 
        $bill->id_customer=$customer->id;
        $bill->date_order=date('Y-m-d');
        $bill->total=$cart->totalPrice;
        $bill->payment=$req->payment_method;
        $bill->note=$req->note;
        $bill->done=0;
        $bill->save();

        foreach ($cart->items as $key => $value) {
          $bill_detail=new BillDetail;
          $bill_detail->id_bill=$bill->id;
          $bill_detail->id_product= $key;
          $bill_detail->quantity=$value['qty'];
          $bill_detail->unit_price=$value['item']['promotion_price'];
          $bill_detail->save();
          // code...
        }
         Session::forget('cart');
         return redirect()->back()->with('thongbao','Đặt hàng thành công');
        
       }


      public function getDangNhap(){
        return view('page.dangnhap');
      }

            public function postDangNhap(Request $req){
            $this->validate($req,
              [
                  'email'=>'required|email',
                  'password'=>'required|min:6|max:20',
              ],
              [
                  'email.required'=>'Vui lòng nhập email',
                  'email.email'=>'Không đúng định dạng email',
                  'password.required'=>'Vui lòng nhập mật khẩu',
                  'password.min'=>'Mật khẩu tối thiểu 6 kí tự',
                  'password.max'=>' Mật khẩu tối đa 20 kí tự'
                  ]);
            $credential= array('email'=>$req->email,'password'=>$req->password);
            if (Auth::attempt($credential)) {
              return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
              // code...
            } else {
              // code...
              return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập không thành công']);
            }
            
      }


       public function getDangKy(){
        return view('page.dangky');
      }
      public function postDangKy(Request $req){
          $this->validate($req,
              [
                  'email'=>'required|email|unique:users,email',
                  'password'=>'required|min:6|max:20',
                  'full_name'=>'required',
                  'remember_token'=>'required|same:password'
              ],
              [
                  'email.required'=>'Vui lòng nhập email',
                  'email.email'=>'Không đúng định dạng email',
                  'email.unique'=>'Email đã được sử dụng',
                  'password.required'=>'Vui lòng nhập mật khẩu',
                  'password.min'=>'Mật khẩu tối thiểu 6 kí tự',
                  'password.max'=>' Mật khẩu tối đa 20 kí tự',
                  'password.required'=>'Vui lòng nhập Họ tên',
                  'remember_token->required'=>'Bạn chưa nhập lại mật khẩu',
                  'remember_token->same'=>'Nhập lại mật khẩu không chính xác'

              ]);
          $user = new User();
          $user->full_name = $req->full_name;
          $user->email = $req->email;
          $user->password = Hash::make($req->password);
          $user->phone = $req->phone;
          $user->address = $req->address;
          $user->remember_token = $req->remember_token;       
          $user->save();

          return redirect()->back()->with('thanhcong','Tạo tài khoản thành công!');


      }
      public function postDangXuat(){
              Auth::logout();
              return redirect()->route('trangchu');
      }
            public function getTimKiem(Request $req){
             $product = Product::where('name','like','%'.$req->key.'%')->orWhere('unit_price',$req->key)->orWhere('promotion_price',$req->key)->get();
             
             return view('page.timkiem',compact('product'));
      }

}
