<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Social;
use App\Models\Login;
use App\Models\Statistical;
use App\Models\Visitors;
use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;
use Socialite;
use Auth;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    public function dashboard_filter_option(Request $request){
        $data = $request->all();
        // echo $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-y H:i:s');

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->toDateString();
        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->toDateString();
        
        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if($data['dashboard_val'] == '7ngay'){
            $statis = Statistical::whereBetween('order_date',[$sub7days,$now])->orderBy('order_date','ASC')->get();

        }elseif($data['dashboard_val'] == 'thangtruoc'){
            $statis = Statistical::whereBetween('order_date',[$firstDayofPreviousMonth,$lastDayofPreviousMonth])->orderBy('order_date','ASC')->get();
        }elseif($data['dashboard_val'] == 'thangnay'){
            $statis = Statistical::whereBetween('order_date',[$dauthangnay,$now])->orderBy('order_date','ASC')->get();
        }else{
            $statis = Statistical::whereBetween('order_date',[$sub365days,$now])->orderBy('order_date','ASC')->get();
        }

        foreach($statis as $key => $st){
            $chart_data[] = array(
                'period'=>$st->order_date,
                'order'=>$st->total_order,
                'sales'=>$st->sales,
                'profit'=>$st->profit,
                'spend'=>$st->spend,
                'quantity'=>$st->quantity_order
            );
        }
        $data = json_encode($chart_data);
        echo $data;
    }
    public function days30Order(Request $request){
        $data = $request->all();
        // echo $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-y H:i:s');

        $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        $statis = Statistical::whereBetween('order_date',[$sub30days,$now])->orderBy('order_date','ASC')->get();

        foreach($statis as $key => $st){
            $chart_data[] = array(
                'period'=>$st->order_date,
                'order'=>$st->total_order,
                'sales'=>$st->sales,
                'profit'=>$st->profit,
                'spend'=>$st->spend,
                'quantity'=>$st->quantity_order
            );
        }
        $data = json_encode($chart_data);
        echo $data;
    }
    public function filterbydate(Request $request){
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        echo $statis = Statistical::whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','ASC')->get();

        // foreach($statis as $key => $st){
        //     $chart_data[] = array(
        //         'period'=>$st->order_date,
        //         'order'=>$st->total_order,
        //         'sales'=>$st->sales,
        //         'profit'=>$st->profit,
        //         'spend'=>$st->spend,
        //         'quantity'=>$st->quantity_order
        //     );
        // }
        // $data = json_encode($chart_data);
        // echo $data;
    }
    // public function dashboard_filter_option(Request $request){
    //     $data = $request->all();
    //     // echo $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');

    //     $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->format('d-m-Y');
    //     $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->format('d-m-Y');
    //     $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->format('d-m-Y');
        
    //     $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->format('d-m-Y');
    //     $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->format('d-m-Y');
    //     $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');

    //     if($data['dashboard_val'] == '7ngay'){
    //         $statis = Statistical::whereBetween('order_date',[$sub7days,$now])->orderBy('order_date','ASC')->get();

    //     }elseif($data['dashboard_val'] == 'thangtruoc'){
    //         $statis = Statistical::whereBetween('order_date',[$firstDayofPreviousMonth,$lastDayofPreviousMonth])->orderBy('order_date','ASC')->get();
    //     }elseif($data['dashboard_val'] == 'thangnay'){
    //         $statis = Statistical::whereBetween('order_date',[$dauthangnay,$now])->orderBy('order_date','ASC')->get();
    //     }elseif($data['dashboard_val'] == '365ngayqua'){
    //         $statis = Statistical::whereBetween('order_date',[$sub365days,$now])->orderBy('order_date','ASC')->get();
    //     }

    //     foreach($statis as $key => $st){
    //         $chart_data[] = array(
    //             'period'=>$st->order_date,
    //             'order'=>$st->total_order,
    //             'sales'=>$st->sales,
    //             'profit'=>$st->profit,
    //             'quantity'=>$st->quantity_order
    //         );
    //     }
    //     $data = json_encode($chart_data);
    //     echo $data;
    // }
    // public function days30Order(Request $request){
    //     $data = $request->all();
    //     // echo $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');

    //     $sub10days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(10)->format('d-m-Y');
    //     $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');

    //     $statis = Statistical::whereBetween('order_date',[$sub10days,$now])->orderBy('order_date','ASC')->get();

    //     foreach($statis as $key => $st){
    //         $chart_data[] = array(
    //             'period'=>$st->order_date,
    //             'order'=>$st->total_order,
    //             'sales'=>$st->sales,
    //             'profit'=>$st->profit,
    //             'spend'=>$st->spend,
    //             'quantity'=>$st->quantity_order
    //         );
    //     }
    //     $data = json_encode($chart_data);
    //     echo $data;
    // }
    // public function filterbydate(Request $request){
    //     $data = $request->all();
    //     $from_date = $data['from_date'];
    //     $to_date = $data['to_date'];

    //     $statis = Statistical::whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','ASC')->get();

    //     foreach($statis as $key => $st){
    //         $chart_data[] = array(
    //             'period'=>$st->order_date,
    //             'order'=>$st->total_order,
    //             'sales'=>$st->sales,
    //             'profit'=>$st->profit,
    //             'spend'=>$st->spend,
    //             'quantity'=>$st->quantity_order
    //         );
    //     }
    //     $data = json_encode($chart_data);
    //     echo $data;
    // }
    
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
            if($admin_id){
                return Redirect::to('dashboard');
            }else{
                return Redirect::to('admin');
            }
    }
    public function index(){
        return view('admin_login');
    }
    public function manage_user(){
        $this->AuthLogin();
        $all_user = Customer::orderby('customer_id','DESC')->get();
        return view('admin.user.manage_user')->with('all_user',$all_user);
    }
    public function edit_user($customer_id){
        $this->AuthLogin();
        $edit_user = Customer::where('customer_id',$customer_id)->get();
        return view('admin.user.edit_user')->with('edit_user',$edit_user);
    }
    public function sua_userad($user_id){
        $this->AuthLogin();
        $edit_userad = Customer::where('customer_id',$user_id)->get();
        return view('admin.user.edit_user')->with('edit_userad',$edit_userad);
    }
    public function update_userad(Request $request, $user_id){
        $this->AuthLogin();
        $data = $request->all();
		$user = Customer::find($user_id);
		$user->customer_vip = $data['customer_select'];
		$user->save();

        Session::put('message','Cập nhật thông tin thành công');
        return Redirect()->Back();
    }
    public function delete_user($customer_id){
        $this->AuthLogin();
        $user = Customer::where('customer_id',$customer_id)->delete();
        Session::put('message','Xóa người dùng thành công');
        return Redirect()->Back();
    }
    public function manage(Request $request){
        $this->AuthLogin();

        // get ip address
        $user_ip_address = $request->ip();

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->format('d-m-Y');
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow()->format('d-m-Y');
        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth()->format('d-m-Y');
        
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->format('d-m-Y');
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');


        $visitor_of_lastmonth = Visitors::whereBetween('date_visitor',[$firstDayofPreviousMonth,$lastDayofPreviousMonth])->get();
        $visitor_last_month_count = $visitor_of_lastmonth->count();

        $visitor_of_thismonth = Visitors::whereBetween('date_visitor',[$dauthangnay,$now])->get();
        $visitor_this_month_count = $visitor_of_thismonth->count();

        $visitor_of_year = Visitors::whereBetween('date_visitor',[$sub365days,$now])->get();
        $visitor_year_count = $visitor_of_year->count();

        // them ip
        $visitors_current = Visitors::where('address_ip', $user_ip_address)->get();
        $visitor_count = $visitors_current->count();
        if($visitor_count < 1){
            $visitor = new Visitors();
            $visitor->address_ip = $user_ip_address;
            $visitor->date_visitor = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
            $visitor->save();
        }
        $visitors = Visitors::all();
        $visitors_total = $visitors->count();

        $product = Product::all()->count();
        $product_views = Product::orderBy('product_views','ASC')->take(20)->get();
        // $post = Post::all()->count();
        // $post_views = Post::orderBy('post_views','DESC')->take(20)->get();
        $order_count = Order::all()->count();
        $admin = Login::all()->count();
        $customer = Customer::all()->count();

        // Thong ke SP
        $all_product = DB::table('tb_product')
        ->join('tb_category_product','tb_category_product.category_id','=','tb_product.category_id')
        ->join('tb_brand','tb_brand.brand_id','=','tb_product.brand_id')
        ->orderby('product_id','desc')->get();
     
        return view('admin.dashboard')->with('all_product', $all_product)->with('visitors_total', $visitors_total)->with('visitor_count',$visitor_count)->with('product',$product)
        ->with('order_count',$order_count)->with('customer',$customer)->with('admin',$admin)->with('product_views',$product_views)
        ->with('visitor_last_month_count',$visitor_last_month_count)->with('visitor_this_month_count',$visitor_this_month_count)->with('visitor_year_count',$visitor_year_count);
    }
    public function dashboard(Request $request){
        $data = $request->all();

        $admin_email = $data['admin_email'];
        $admin_password = $data['admin_password'];

        $result = DB::table('tb_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($result){
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/manage');
        }
        else{
            Session::put('message','Mat khau hoac email sai.Vui long nhap lai');
            return Redirect::to('/admin');
        }
    }
    public function logoutad(){
        $this->AuthLogin();
        Session::put('admin_name', null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }
}
