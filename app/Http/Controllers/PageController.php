<?php

namespace App\Http\Controllers;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\User;
use Hash;
use Auth;


class PageController extends Controller
{
    
    public function getIndex(){
        $slide = Slide::all();
        $new_product = Product::where('new',1) -> paginate(4); //paginate : phân số trang
        // dd($new_product); -> in ra mảng chứa sản phẩm new = 1;
        $sanpham_khuyenmai = Product::where('promotion_price','<>',0) -> paginate(8);
        return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
    }

    public function getAbout(){
        return view('page.about');
    }

    public function getProductType($type){
        $sp_theoloai = Product::where('id_type',$type)->get();
        $sp_km = Product::where('promotion_price','<>',0) -> paginate(6);
        $loai = ProductType::all();
        $loai_sp = productType::where('id',$type)->first();
        return view('page.product-type',compact('sp_theoloai','sp_km','loai','loai_sp'));
    }

    public function getChitiet(Request $about){
        $sanpham = Product::where('id',$about->id)->first();
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type) -> paginate(3);
        $spham_km = Product::where('promotion_price','<>',0)->paginate(4);
        $spham_moi = Product::where('new',1) ->paginate(4);
        return view('page.chi-tiet-sp',compact('sanpham','sp_tuongtu','spham_km','spham_moi'));
        
    }

    public function getProduct(){
       
        return view('page.product');
    }

    public function AddCart(Request $req ,$id){
        $product = Product::find($id);
        $oldCart = Session('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart -> add($product, $id);
        $req -> session()->put('cart',$cart);
        return redirect()->back();
    }

    public function DelCart($id){
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart ->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }

        return redirect()->back();
    }

    public function Checkout(){
        
        return view('page.checkout');
    }

    public function getLogin(){
        return view('page.login');
    }

    public function getSignIn(){
        return view('page.signin');
    }

    public function postSignIn(Request $req){
        $this -> validate($req,
            [
                'email' => 'required|email|unique:users,email',
                'fullname' => 'required',
                'password' => 'required|min:6|max:20',
                're_password' => 'required|same:password',
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Không đúng định dạng email',
                'email.unique' => 'Email đã có người sử dụng',
                'password.required'=> 'Vui lòng nhập password',
                're_password.same'=>'Mật khẩu không khớp',
                'password.min'=>'Mật khẩu quá ngắn',
            ]
            );
        $uses = new User();
        $uses -> full_name = $req->fullname;
        $uses -> email = $req->email;
        $uses -> password = Hash::make($req->password);
        $uses -> phone = $req->phone;
        $uses -> address = $req->address;
        $uses -> save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }

    public function postLogIn(Request $req){
        $this ->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu quá ngắn',
                'password.max'=>'Mật khẩu không được vượt quá 20 kí tự',
            ]
        );
        $credentials = array('email'=>$req->email,'password'=>$req->password);
        if(Auth::attempt($credentials)){
            return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
    }

    public function getLogOut(){
        Auth::logout();
        return redirect()->route('page.trangchu');
    }

    public function getSearch(Request $req){
        $product = Product::where('name','like','%'.$req->key.'%')
                            -> orWhere('unit_price',$req->key)
                            ->get();
        return view('page.search',compact('product'));
    }
    
}
