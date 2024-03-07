<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use App\Models\User;
use App\Models\room;
use App\Models\cat;
use App\Models\reserve;
use App\Models\payshower;
use App\Models\promotion;
use App\Models\promotionshower;


class AuthController extends Controller
{
    public function Home() {
        $data = [];
        $data['title'] = "Home Page";
        $promotion = promotion::all();
        return view('Home', compact('data','promotion'));
    }
    public function login() {

        return view('login');
    }
    public function register() {
        $cats = cat::where('user_id', Session::get('user_id'))->get();

        return view('register',compact('cats'));
    }

    public function showerFilter(Request $request) {
        $date_shawer = ($request->has('date_shawer')) ? trim($request->input('date_shawer')) : null;
        $date_time_shawer = ($request->has('date_time_shawer')) ? trim($request->input('date_time_shawer')) : null;
        $cat_amount_shawer = ($request->has('cat_amount_shawer')) ? trim($request->input('cat_amount_shawer')) : null;
        $username = ($request->has('username')) ? trim($request->input('username')) : null;

        if(!Session::get('username')){
            $status = 'กรุณาเข้าสู่ระบบ';
            return response()->json(['status' => $status], 401);
        }
        if($date_shawer && $date_time_shawer && $cat_amount_shawer) {
            return response()->json([
                'status' => 'success',
                'redirect_url' => Route('room', [
                    'date_shawer' => $date_shawer,
                    'date_time_shawer' => $date_time_shawer,
                    'cat_amount_shawer' => $cat_amount_shawer
                ])
            ], 200);
        } 
        else {
            return response()->json(['status' => 'กรุณากรอกข้อมูล'], 400);
        }
        
    }

    public function room(Request $request) {
        $cats = cat::where('user_id', Session::get('user_id'))->get();
        $start_date = ($request->has('start_date')) ? trim($request->input('start_date')) : null;
        $end_date = ($request->has('end_date')) ? trim($request->input('end_date')) : null;
        $cat_amount = ($request->has('cat_amount')) ? trim($request->input('cat_amount')) : null;

        if($start_date && $end_date && $cat_amount) {
            $cat_amount_all = $cat_amount * 200;

            $rooms = Room::where(function ($query) use ($cat_amount) {
                        $query->whereRaw('CAST(SUBSTRING_INDEX(room_cat, "-", 1) AS SIGNED) <= ?', [$cat_amount])
                            ->whereRaw('CAST(SUBSTRING_INDEX(room_cat, "-", -1) AS SIGNED) >= ?', [$cat_amount]);
                    })
                    ->where('room_price', '>=', $cat_amount_all)
                    ->get();
        } else {
            $rooms = Room::All();
        }
        
        return view('room', compact('rooms', 'start_date', 'end_date', 'cat_amount','cats'));
       
    }

    public function roomFilter(Request $request) {
        $start_date = ($request->has('start_date')) ? trim($request->input('start_date')) : null;
        $end_date = ($request->has('end_date')) ? trim($request->input('end_date')) : null;
        $cat_amount = ($request->has('cat_amount')) ? trim($request->input('cat_amount')) : null;
        $username = ($request->has('username')) ? trim($request->input('username')) : null;
        // $date_shawer = ($request->has('date_shawer')) ? trim($request->input('date_shawer')) : null;
        // $date_time_shawer = ($request->has('date_time_shawer')) ? trim($request->input('date_time_shawer')) : null;
        // $cat_amount_shawer = ($request->has('cat_amount_shawer')) ? trim($request->input('cat_amount_shawer')) : null;

        if(!Session::get('username')){
            $status = 'กรุณาเข้าสู่ระบบ';
            return response()->json(['status' => $status], 401);
        }
        if($start_date && $end_date && $cat_amount) {
            return response()->json([
                'status' => 'success',
                'redirect_url' => Route('room', [
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'cat_amount' => $cat_amount
                ])
            ], 200);
        } 
        // if($date_shawer && $date_time_shawer && $cat_amount_shawer) {
        //     return response()->json([
        //         'status' => 'success',
        //         'redirect_url' => Route('room', [
        //             'date_shawer' => $date_shawer,
        //             'date_time_shawer' => $date_time_shawer,
        //             'cat_amount_shawer' => $cat_amount_shawer
        //         ])
        //     ], 200);
        // } 
        else {
            return response()->json(['status' => 'กรุณากรอกข้อมูล'], 400);
        }
        
    }
    
    public function payment_cat() {
        $user = User::where('username',Session::get('username'))->first();
        $payshower = payshower::leftJoin('cat', 'cat.cat_id', '=', 'payshower.cat_id')
                                ->select('payshower.*', 'cat.cat_name as cat_name', 'cat.cat_pic as cat_pic')
                                ->where('payshower.user_id', $user->user_id)
                                ->get();
        return view('payment_cat',compact('user','payshower','cat'));
    }

    public function payment() {
        $user = User::where('username', Session::get('username'))->first();
        
        $reserve = reserve::leftJoin('room', 'reserve.room_id', '=', 'room.room_id')
                            ->select('reserve.*', 'room.room_id as room_id', 'room.room_name as room_name',
                                    'room.room_cat as room_cat', 'room.room_hight as room_hight', 'room.room_price as room_price',
                                    'room.room_detail', 'room.room_pic as room_pic')
                            ->where('user_id', $user->user_id)
                            ->get();
        return view('payment', compact('user', 'reserve', 'room'));
    }
    public function cat() {
        $cats = cat::where('user_id', Session::get('user_id'))->get();

        return view('cat' , compact('cats'));
    }
    // ต้องดู กลับมาทวน***************ลองทำเองดู
    public function shower(Request $request) {        
        $cats = cat::where('user_id', Session::get('user_id'))->get();
        $data = [];
        $promotionshower = promotionshower::all();   

        return view('shower', compact('cats','promotionshower'));
    }
    public function adminconfirmcat() {
        $payshower = payshower::leftJoin('user', 'payshower.user_id', '=', 'user.user_id')
                            ->select('payshower.*', 'user.firstname as firstname', 'user.lastname as lastname')
                            ->get();

        return view('adminconfirmcat',compact('payshower'));
    }
    public function adminhome() {
        $reserve = reserve::leftJoin('user', 'reserve.user_id', '=', 'user.user_id')
                            // ทดลองเล่นๆ            
                            ->select('reserve.*', 'user.firstname as firstname', 'user.lastname as lastname')
                            ->get();

        return view('adminhome', compact('reserve','payshower'));
    }
    public function dayreport() {
        $reserve = reserve::leftJoin('user', 'reserve.user_id', '=', 'user.user_id')
                            ->select('reserve.*', 'user.firstname as firstname', 'user.lastname as lastname')
                            ->get();
        $payshower = payshower::leftJoin('user', 'payshower.user_id', '=', 'user.user_id')
                            ->select('payshower.*', 'user.firstname as firstname', 'user.lastname as lastname','payshower.shower_total as shower_total')
                            ->get();

        $users = User::All();
        
        // $data_all = [];
        // foreach ($users as $user) {
        //     $reserve_all = Reserve::where('user_id', $user->user_id)->get();
        //     $payshowers = Payshower::where('user_id', $user->user_id)->get();
        
        //     $reserve_collect = [];
        //     $payshower_collect = [];
        
        //     foreach ($reserve_all as $reserve) {
        //         $reserveData = [
        //             'r_id' => $reserve->r_id,
        //             'r_start_date' => $reserve->r_start_date,
        //             'r_end_date' => $reserve->r_end_date,
        //             'r_total' => $reserve->r_total
        //         ];
        //         $reserve_collect[] = $reserveData;
        //     }
        
        //     foreach ($payshowers as $payshower) {
        //         $payshowerData = [
        //             'shower_id' => $payshower->shower_id,
        //             'shower_serve' => $payshower->shower_serve,
        //             'shower_total' => $payshower->shower_total
        //         ];
        //         $payshower_collect[] = $payshowerData;
        //     }
        
        //     $data_all[] = [
        //         'user_id' => $user->user_id,
        //         'firstname' => $user->firstname,
        //         'reserve' => $reserve_collect,
        //         'payshower' => $payshower_collect,
        //     ];
        // }

        // echo '<pre>';
        // print_r($data_all);
        // echo '/<pre>';

        return view('dayreport',compact('reserve','users','payshower'));
    }
    public function profile() {
        $profile = User::where('username', Session::get('username'))->first();

        $user = User::all();
        return view('profile', compact('profile'));

    }
    public function adminprofile() {
        $profile = User::where('username', Session::get('username'))->first();

        return view('adminprofile', compact('profile'));
    }
    public function monthreport() {
        $reserve = reserve::leftJoin('user', 'reserve.user_id', '=', 'user.user_id')
                            ->select('reserve.*', 'user.firstname as firstname', 'user.lastname as lastname')
                            ->get();
        $payshower = payshower::leftJoin('user', 'payshower.user_id', '=', 'user.user_id')
                            ->select('payshower.*', 'user.firstname as firstname', 'user.lastname as lastname','payshower.shower_total as shower_total')
                            ->get();

        $users = User::All();

        $startDate = '2024-02-01';

        return view('monthreport',compact('reserve','payshower','startDate'));
    }
    public function yearreport() {
       $reserve = reserve::leftJoin('user', 'reserve.user_id', '=', 'user.user_id')
                            ->select('reserve.*', 'user.firstname as firstname', 'user.lastname as lastname')
                            ->get();
        $payshower = payshower::leftJoin('user', 'payshower.user_id', '=', 'user.user_id')
                            ->select('payshower.*', 'user.firstname as firstname', 'user.lastname as lastname','payshower.shower_total as shower_total')
                            ->get();

        $users = User::All();

        return view('yearreport',compact('reserve','payshower'));   
    }

    public function User() {
        $users = User::select('*')->get();

        return view('User', compact('User'));
    }
    public function admineditroom() {
        $rooms = room::All();

        return view('admineditroom', compact('rooms'));
       
    }
    public function adminedituser() {
        $user = User::all();
        return view('adminedituser', compact('user'));
    }   
    public function adminpromotion() {
     $promotion = promotion::all();   

        return view('adminpromotion', compact('promotion'));
    }   
    public function adminpromotioncat() {
        $promotionshower = promotionshower::all();   
 
           return view('adminpromotioncat', compact('promotionshower'));
    } 
    public function admincat() {
        $cat = cat::leftJoin('user', 'cat.user_id', '=', 'user.user_id')
                            ->select('cat.*', 'user.firstname as firstname', 'user.lastname as lastname')
                            ->orderBy('order_id', 'DESC')
                            ->where('cat_id', Session::get('cat_id'))
                            ->get();

                            $cat_all = [];
                            foreach ($cat as $order) {
                                $cat = cat::leftJoin('user', 'user.user_id', '=', 'cat.cat_id')
                                                                ->leftJoin('reserve', 'cat.cat_id', '=', 'reserve.cat_id')
                                                                ->leftJoin('promotions', 'products.promotion_id', '=', 'promotions.promotion_id')
                                                                ->select('orders_items.*',
                                                                    'cat.image as image', 'cat.cat_name as product_name',
                                                                    'cat.cost_price as cost_price', 'cat.net_price as net_price',
                                                                    'promotions.discount as discount')
                                                                ->where('orders_items.order_id', $order->order_id)
                                                                ->get();
                            
                                $order_items = [];
                                foreach ($orders_items_data as $order_item) {
                                    $orderItemData = [
                                        'order_id' => $order_item->order_id,
                                        'product_id' => $order_item->product_id,
                                        'product_name' => $order_item->product_name,
                                        'image' => $order_item->image,
                                        'cost_price' => $order_item->cost_price,
                                        'net_price' => $order_item->net_price,
                                        'discount' => $order_item->discount,
                                        'quantity' => $order_item->quantity,
                                    ];
                            
                                    $order_items[] = $orderItemData;
                                }
                            
                                $orderData = [
                                    'order_id' => $order->order_id,
                                    'order_status' => $order->status,
                                    'payment_method' => $order->payment_method,
                                    'shipping_name' => $order->shipping_name,
                                    'shipment_image' => $order->shipment_image,
                                    'total' => $order->total,
                                    'total_net' => $order->total_net,
                                    'total_cost' => $order->total_cost,
                                    'order_items' => $order_items,
                                ];
                            
                                $orders_all[] = $orderData;
                            }
        return view('admincat', compact('cat'));
    } 
    public function SubmitRegister(Request $request) {
        $username = ($request->has('username')) ? trim($request->input('username')) : null;
        $password = ($request->has('password')) ? trim($request->input('password')) : null;
        $firstname = ($request->has('firstname')) ? trim($request->input('firstname')) : null;
        $lastname = ($request->has('lastname')) ? trim($request->input('lastname')) : null;
        $tell = ($request->has('tell')) ? trim($request->input('tell')) : null;
        
        if(!$username) {
            $status = 'กรุณากรอกชื่อผู้ใช้';
            return response()->json(['status' => $status], 401);
        }
        if(strlen($password) < 4) {
            $status = 'รหัสผ่านขั้นต่ำ 4 ตัวอักษร';
            return response()->json(['status' => $status], 401);
        }
        if(strlen($firstname) < 1 || strlen($lastname) < 1) {
            $status = 'กรุณากรอกชื่อ-นามสกุล';
            return response()->json(['status' => $status], 401);
        }
        if($tell && strlen($tell) < 10 || strlen($tell) > 10) {
            $status = 'รูปแบบหมายเลขโทรศัพท์ไม่ถูกต้อง';
            return response()->json(['status' => $status], 401);
        }

        $isUser = User::where('username', $username)->first();

        if($isUser) {
            $status = 'ชื่อผู้ใช้นี้ถูกใช้ไปแล้ว';
            return response()->json(['status' => $status], 401); 
        } else {
            $InsertRow = new User;
            $InsertRow->username = $username;
            $InsertRow->password = $password;
            $InsertRow->firstname = $firstname;
            $InsertRow->lastname = $lastname;
            $InsertRow->tell = $tell;
            $InsertRow->save();
        }
        return response()->json(200);
    }

    public function LoginVerify(Request $request) {
        $username = ($request->has('username')) ? trim($request->input('username')) : null;
        $password = ($request->has('password')) ? trim($request->input('password')) : null;

        $isUser = User::where('username', $username)->where('password', '=', $password)->first();

        if($isUser) {
            $result = [
                'isOk' => true, 
                'username' => $username,
                'role' => $isUser->role
            ];
            $statusCode = 200;

            session::put('authen', true);
            session::put('user_id', $isUser->user_id);
            session::put('username', $isUser->username);
            session::put('firstname', $isUser->firstname);
            session::put('lastname', $isUser->lastname);
            session::put('tell', $isUser->tell);
            session::put('role', $isUser->role);

        } else {
            $result = [
                'isOk' => false,
                'status' => 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง'
            ];
            $statusCode = 400;
        }

        return response()->json($result, $statusCode);
    }

    public function Logout() {
        session::flush();
        session::save();
        return redirect(Route('Home'));
    }

    public function SubmitProfileEdit(Request $request) {
        $id = ($request->has('user_id')) ? trim($request->input('user_id')) : null;
        $firstname = ($request->has('firstname')) ? trim($request->input('firstname')) : null;
        $lastname = ($request->has('lastname')) ? trim($request->input('lastname')) : null;
        $phone = ($request->has('tell')) ? trim($request->input('tell')) : null;
        $image64 = ($request->has('image64')) ? trim($request->input('image64')) : null;

        if($phone && strlen($phone) < 10 || strlen($phone) > 10) {
            $status = 'รูปแบบหมายเลขโทรศัพท์ไม่ถูกต้อง';
            return response()->json(['status' => $status], 401);
        }
        if(strlen($firstname) < 1 || strlen($lastname) < 1) {
            $status = 'กรุณากรอกชื่อ-นามสกุล';
            return response()->json(['status' => $status], 401);
        }
        $isMember = User::where('user_id', $id)->first();
        if(!$isMember) {
            $status = 'เกิดข้อผิดพลาด ไม่พบชื่อผู้ใช้';
            return response()->json(['status' => $status], 401);
        } else {
            if($image64) {
                @list($type, $file_data) = explode(';', $image64);
                @list(, $file_data) = explode(',', $file_data); 
                $imageName = Str::random(10).'.'.'png';   
                file_put_contents(config('pathImage.uploads_path') . '/' . $imageName, base64_decode($file_data));
    
                User::where('user_id', $id)
                    ->update([
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'tell' => $phone,
                    'image' => $imageName,
                    'updated_at' => now()
                ]);
                session::put('image', $imageName);
            } else {
                User::where('user_id', $id)
                    ->update([
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'tell' => $phone,
                    'updated_at' => now()
                ]);
            }
        }
        session::put('firstname', $firstname);

        return response()->json(200);
    }
    
    public function SubmitProfileEditPassword(Request $request) {
        $id = ($request->has('user_id')) ? trim($request->input('user_id')) : null;
        $password = ($request->has('password')) ? trim($request->input('password')) : null;
        $image64 = ($request->has('image64')) ? trim($request->input('image64')) : null;
        $isMember = User::where('user_id', $id)->first();
        if(!$isMember) {
            $status = 'เกิดข้อผิดพลาด ไม่พบชื่อผู้ใช้';
            return response()->json(['status' => $status], 401);
        } else {
            if($image64) {
                @list($type, $file_data) = explode(';', $image64);
                @list(, $file_data) = explode(',', $file_data); 
                $imageName = Str::random(10).'.'.'png';   
                file_put_contents(config('pathImage.uploads_path') . '/' . $imageName, base64_decode($file_data));
    
                User::where('user_id', $id)
                    ->update([
                    'password' => $password,
                    'updated_at' => now()
                ]);
                session::put('image', $imageName);
            } else {
                User::where('user_id', $id)
                    ->update([
                    'password' => $password,
                    'updated_at' => now()
                ]);
            }
        }
        session::put('password', $password);

        return response()->json(200);
    }

    public function SubmitRoomEdit(Request $request) {
        $room_name = ($request->has('room_name')) ? trim($request->input('room_name')) : null;
        $room_cat = ($request->has('room_cat')) ? trim($request->input('room_cat')) : null;
        $room_size = ($request->has('room_size')) ? trim($request->input('room_size')) : null;
        $room_hight = ($request->has('room_hight')) ? trim($request->input('room_hight')) : null;
        $room_price = ($request->has('room_price')) ? trim($request->input('room_price')) : null;
        $room_detail = ($request->has('room_detail')) ? trim($request->input('room_detail')) : null;
        $image64 = ($request->has('image64')) ? trim($request->input('image64')) : null;
        
        if(!$image64) {
            $status = 'กรุณาแนบรูป';
            return response()->json(['status' => $status], 401);
        }
        
        @list($type, $file_data) = explode(';', $image64);
        @list(, $file_data) = explode(',', $file_data); 
        $imageName = Str::random(10).'.'.'png';   
        file_put_contents(config('pathImage.uploads_path') . '/' . $imageName, base64_decode($file_data));
        
        $InsertRow = new room;
        $InsertRow->room_name = $room_name;
        $InsertRow->room_cat = $room_cat;
        $InsertRow->room_size = $room_size;
        $InsertRow->room_hight = $room_hight;
        $InsertRow->room_price = $room_price;
        $InsertRow->room_detail = $room_detail;
        $InsertRow->room_pic = $imageName;
        $InsertRow->save();          
        return response()->json(200);
    }

    public function SubmitRoomDelete(Request $request) {
        $room_id = ($request->has('room_id')) ? trim($request->input('room_id')) : null;

        room::where('room_id', $room_id)->delete();

        return response()->json(200);
    }
    public function SubmitCat(Request $request) {
        $cat_name = ($request->has('cat_name')) ? trim($request->input('cat_name')) : null;
        $cat_breed = ($request->has('cat_breed')) ? trim($request->input('cat_breed')) : null;
        $cat_weight = ($request->has('cat_weight')) ? trim($request->input('cat_weight')) : null;
        $cat_gender = ($request->has('cat_gender')) ? trim($request->input('cat_gender')) : null;
        $cat_date = ($request->has('cat_date')) ? trim($request->input('cat_date')) : null;
        $image64_cat = ($request->has('image64_cat')) ? trim($request->input('image64_cat')) : null;
        $image64_doc = ($request->has('image64_doc')) ? trim($request->input('image64_doc')) : null;
        
        if(!$cat_name) {
            $status = 'กรุณากรอกชื่อแมว';
            return response()->json(['status' => $status], 401);
        }
        if(strlen($cat_breed) < 1 || strlen($cat_weight) < 1) {
            $status = 'กรุณากรอกพันธุ์แมว';
            return response()->json(['status' => $status], 401);
        }

        if(!$image64_cat && !$image64_doc) {
            $status = 'กรุณาแนบรูปภาพ';
            return response()->json(['status' => $status], 401);
        } else {
            @list($type, $file_data) = explode(';', $image64_cat);
            @list(, $file_data) = explode(',', $file_data); 
            $imageNameCat = Str::random(10).'.'.'png';   
            file_put_contents(config('pathImage.uploads_path') . '/' . $imageNameCat, base64_decode($file_data));

            @list($type, $file_data) = explode(';', $image64_doc);
            @list(, $file_data) = explode(',', $file_data); 
            $imageNameDoc = Str::random(10).'.'.'png';   
            file_put_contents(config('pathImage.uploads_path') . '/' . $imageNameDoc, base64_decode($file_data));
        }
   
            $InsertRow = new cat;
            $InsertRow->user_id = Session::get('user_id');
            $InsertRow->cat_name = $cat_name;
            $InsertRow->cat_breed = $cat_breed;
            $InsertRow->cat_weight = $cat_weight;
            $InsertRow->cat_gender = $cat_gender;
            $InsertRow->cat_date = $cat_date;
            $InsertRow->cat_pic = $imageNameCat;
            $InsertRow->cat_document = $imageNameDoc;
            $InsertRow->save();
        return response()->json(200);
    }
    
    public function SubmitRoomReserve(Request $request) {
        $start_date = ($request->has('start_date')) ? trim($request->input('start_date')) : null;
        $end_date = ($request->has('end_date')) ? trim($request->input('end_date')) : null;
        $cat_amount = ($request->has('cat_amount')) ? trim($request->input('cat_amount')) : null;
        $shower_selected_text = ($request->has('shower_selected_text')) ? trim($request->input('shower_selected_text')) : null;
        $username = ($request->has('username')) ? trim($request->input('username')) : null;
        $room_id = ($request->has('room_id')) ? trim($request->input('room_id')) : null;
        $image64 = ($request->has('image64')) ? trim($request->input('image64')) : null;
        $cats_selected = ($request->has('cats_selected')) ? implode(',', $request->input('cats_selected')) : null;
        $total_price = ($request->has('total_price')) ? trim($request->input('total_price')) : null;

        $isUser = User::where('username', $username)->first();
        $isRoom = room::where('room_id', $room_id)->first();

        if(!$image64) {
            $status = 'กรุณาแนบรูปภาพ';
            return response()->json(['status' => $status], 401);
        } else {
            @list($type, $file_data) = explode(';', $image64);
            @list(, $file_data) = explode(',', $file_data); 
            $imageName = Str::random(10).'.'.'png';   
            file_put_contents(config('pathImage.uploads_path') . '/' . $imageName, base64_decode($file_data));
        }
        $InsertRow = new reserve;
        $InsertRow->user_id = $isUser->user_id;
        $InsertRow->room_id = $room_id;
        $InsertRow->cat_amount = $cat_amount;
        $InsertRow->r_cat_name = $cats_selected;
        $InsertRow->r_start_date = $start_date;
        $InsertRow->r_end_date = $end_date;
        $InsertRow->r_total = $isRoom->room_price;
        $InsertRow->r_total2 = $total_price;
        $InsertRow->shower_serve = $shower_selected_text;
        $InsertRow->image_name = $imageName;
        $InsertRow->r_type = 0;
        $InsertRow->save();

        room::where('room_id', $room_id)
        ->update([
            'status_room' => 1,
            'updated_at' => now()
        ]);

        return response()->json(200);
    }
    public function SubmitUserDelete(Request $request) {
        $user_id = ($request->has('user_id')) ? trim($request->input('user_id')) : null;

        User::where('user_id', $user_id)->delete();

        return response()->json(200);
    }
    public function SubmitCatDelete(Request $request) {
        $cat_id = ($request->has('cat_id')) ? trim($request->input('cat_id')) : null;

        cat::where('cat_id', $cat_id)->delete();

        return response()->json(200);
    }
    public function SubmitPromotionDelete(Request $request) {
        $promotion_id = ($request->has('promotion_id')) ? trim($request->input('promotion_id')) : null;

        promotion::where('promotion_id', $promotion_id)->delete();

        return response()->json(200);
    }
    public function SubmitPromotionshowerDelete(Request $request) {
        $promotionshower_id = ($request->has('promotionshower_id')) ? trim($request->input('promotionshower_id')) : null;

        promotionshower::where('promotionshower_id', $promotionshower_id)->delete();

        return response()->json(200);
    }
    public function SubmitCatEdit(Request $request) {
        $cat_id = ($request->has('cat_id')) ? trim($request->input('cat_id')) : null;
        $cat_name = ($request->has('cat_name')) ? trim($request->input('cat_name')) : null;
        $cat_breed = ($request->has('cat_breed')) ? trim($request->input('cat_breed')) : null;
        $cat_weight = ($request->has('cat_weight')) ? trim($request->input('cat_weight')) : null;
        $cat_gender = ($request->has('cat_gender')) ? trim($request->input('cat_gender')) : null;
        $cat_date = ($request->has('cat_date')) ? trim($request->input('cat_date')) : null;
        $image64_cat = ($request->has('image64_cat')) ? trim($request->input('image64_cat')) : null;
        $image64_doc = ($request->has('image64_doc')) ? trim($request->input('image64_doc')) : null;
        print_r($image64_cat);

        if($image64_cat) {
            @list($type, $file_data) = explode(';', $image64_cat);
            @list(, $file_data) = explode(',', $file_data); 
            $imageName = Str::random(10).'.'.'png';   
            file_put_contents(config('pathImage.uploads_path') . '/' . $imageName, base64_decode($file_data));

            cat::where('cat_id',$cat_id)
                ->update([
                'cat_name' => $cat_name,
                'cat_breed' => $cat_breed,
                'cat_weight' => $cat_weight,
                'cat_gender' => $cat_gender,
                'cat_date' => $cat_date,
                'cat_pic' => $imageName,
                'updated_at' => now()
            ]);
            session::put('cat_pic', $imageName);
        } else if($image64_doc) {
            @list($type, $file_data) = explode(';', $image64_doc);
            @list(, $file_data) = explode(',', $file_data); 
            $imageNameDoc = Str::random(10).'.'.'png';   
            file_put_contents(config('pathImage.uploads_path') . '/' . $imageNameDoc, base64_decode($file_data));
    
            cat::where('cat_id',$cat_id)
                ->update([
                'cat_name' => $cat_name,
                'cat_breed' => $cat_breed,
                'cat_weight' => $cat_weight,
                'cat_gender' => $cat_gender,
                'cat_date' => $cat_date,
                'cat_document' => $imageNameDoc,
                'updated_at' => now()
                ]);
                session::put('cat_document', $imageNameDoc);
            
        } else {
            cat::where('cat_id', $cat_id)
                    ->update([
                    'cat_name' => $cat_name,
                    'cat_breed' => $cat_breed,
                    'cat_weight' => $cat_weight,
                    'cat_gender' => $cat_gender,
                    'cat_date' => $cat_date,
                    'updated_at' => now()
                ]);
           
        }

                
        return response()->json(200);
    }
    public function SubmitEditDate(Request $request) {
        $reserve_id = $request->input('reserve_id');
        $date_edit = $request->input('date_edit');
        
        reserve::where('r_id', $reserve_id)
        ->update([
            'r_postpon' => $date_edit,
            'updated_at' => now()
        ]);

        return response()->json(200);
    }
    public function ConfirmPayment(Request $request) {
        $reserve_id = ($request->has('reserve_id')) ? trim($request->input('reserve_id')) : null;
    
        reserve::where('r_id', $reserve_id)
                ->update([
                    'status' => 1,
                    'updated_at' => now()
                ]);

        return response()->json(200);
    }
    public function ConfirmPayment_cat(Request $request) {
        $payshower_id = ($request->has('payshower_id')) ? trim($request->input('payshower_id')) : null;
    
        payshower::where('shower_id', $payshower_id)
                ->update([
                    'shower_status' => 1,
                    'updated_at' => now()
                ]);

        return response()->json(200);
    }
    public function ConfirmRoomClear(Request $request) {
        $room_id = ($request->has('room_id')) ? trim($request->input('room_id')) : null;
    
        room::where('room_id', $room_id)
                ->update([
                    'status_room' => 0,
                    'updated_at' => now()
                ]);

        return response()->json(200);
    }
    public function SubmitShower(Request $request) {
        $shower_date = ($request->has('shower_date')) ? trim($request->input('shower_date')) : null;
        $shower_time = ($request->has('shower_time')) ? trim($request->input('shower_time')) : null;
        $shower_selected_text = ($request->has('shower_selected_text')) ? trim($request->input('shower_selected_text')) : null;
        $shower_cat_amount = ($request->has('shower_cat_amount')) ? trim($request->input('shower_cat_amount')) : null;
        $shower_totalPriceContent = ($request->has('shower_totalPriceContent')) ? trim($request->input('shower_totalPriceContent')) : null;
        $shower_totalPriceAll = ($request->has('shower_totalPriceAll')) ? trim($request->input('shower_totalPriceAll')) : null;
        $shower_cat_id = ($request->has('shower_cat_id')) ? trim($request->input('shower_cat_id')) : null;            
        $username = ($request->has('username')) ? trim($request->input('username')) : null;
        $image64 = ($request->has('image64')) ? trim($request->input('image64')) : null;

        $isUser = User::where('username', $username)->first();
        // $isRoom = room::where('room_id', $room_id)->first();

        if(!$image64) {
            $status = 'กรุณาแนบรูปภาพ';
            return response()->json(['status' => $status], 401);
        } else {
            @list($type, $file_data) = explode(';', $image64);
            @list(, $file_data) = explode(',', $file_data); 
            $imageName = Str::random(10).'.'.'png';   
            file_put_contents(config('pathImage.uploads_path') . '/' . $imageName, base64_decode($file_data));
        }
        // ชื่อtable
        $InsertRow = new payshower;
        $InsertRow->user_id = $isUser->user_id;
        $InsertRow->shower_date = $shower_date;
        $InsertRow->shower_time = $shower_time;
        $InsertRow->shower_serve = $shower_selected_text;
        $InsertRow->shower_amount = $shower_cat_amount;
        $InsertRow->shower_price = $shower_totalPriceContent;
        $InsertRow->shower_total = $shower_totalPriceAll;
        $InsertRow->cat_id = $shower_cat_id;
        
        // $InsertRow->r_total = $isRoom->room_price;
        $InsertRow->shower_qr = $imageName;
        // $InsertRow->r_type = 0;
        $InsertRow->save();

        return response()->json(200);
    }
    public function Submitpromotion(Request $request) {
        $promotion_deposit =($request->has('promotion_deposit')) ? trim($request->input('promotion_deposit')) : null;
        $imagePromotion =($request->has('imagePromotion')) ? trim($request->input('imagePromotion')) : null;
        
        if(!$imagePromotion) {
            $status = 'กรุณาแนบรูป';
            return response()->json(['status' => $status], 401);
        }
        
        @list($type, $file_data) = explode(';', $imagePromotion);
        @list(, $file_data) = explode(',', $file_data); 
        $imageName = Str::random(10).'.'.'png';   
        file_put_contents(config('pathImage.uploads_path') . '/' . $imageName, base64_decode($file_data));

        $InsertRow = new promotion;
        $InsertRow->promotion_deposit = $imageName;
        $InsertRow->save();
        return response()->json(200);
    }
    public function Submitpromotioncat(Request $request) {
        $promotion_shower =($request->has('promotion_shower')) ? trim($request->input('promotion_shower')) : null;
        $imagePromotioncat =($request->has('imagePromotioncat')) ? trim($request->input('imagePromotioncat')) : null;
        
        if(!$imagePromotioncat) {
            $status = 'กรุณาแนบรูป';
            return response()->json(['status' => $status], 401);
        }
        
        @list($type, $file_data) = explode(';', $imagePromotioncat);
        @list(, $file_data) = explode(',', $file_data); 
        $imageName = Str::random(10).'.'.'png';   
        file_put_contents(config('pathImage.uploads_path') . '/' . $imageName, base64_decode($file_data));

        $InsertRow = new promotionshower;
        $InsertRow->promotion_shower = $imageName;
        $InsertRow->save();
        return response()->json(200);
        
    }
//   ***********

    public function Purchase() {
        $reserve = reserve::orderBy('reserve_order')->get();

        $profile = user::where('username', Session::get('username'))->first();

        // CART ORDER = 0

        $orders_items = [];
        if($order) {
            $orders_items = reserve::leftJoin('reserve', 'reserve.r_cats_id', '=', 'cat.cat_id')
            ->leftJoin('cat', 'reserve.cat_id', '=', 'cat.cat_id')
            ->select('reserve.*', 
                    'cat.image as image', 'cat.cat_name as product_name')
            ->where('orders_items.order_id', $order->order_id)
            ->get();
        }

        $orders = Orders::leftJoin('shipments', 'orders.shipment_id', '=', 'shipments.shipment_id')
                        ->leftJoin('shipments_type', 'shipments.shipment_type_id', '=', 'shipments_type.shipment_type_id')
                        ->select('orders.*', 'shipments_type.shipping_name as shipping_name', 'shipments_type.image as shipment_image')
                        ->where('member_id', Session::get('member_id'))
                        ->orderBy('order_id', 'DESC')
                        ->get();

                        $orders_all = [];
                        foreach ($orders as $order) {
                            $orders_items_data = Orders_items::leftJoin('cat', 'orders_items.cat_id', '=', 'cat.cat_id')
                                                            ->leftJoin('reserve', 'cat.cat_id', '=', 'reserve.cat_id')
                                                            ->leftJoin('promotions', 'products.promotion_id', '=', 'promotions.promotion_id')
                                                            ->select('orders_items.*',
                                                                'cat.image as image', 'cat.cat_name as product_name',
                                                                'cat.cost_price as cost_price', 'cat.net_price as net_price',
                                                                'promotions.discount as discount')
                                                            ->where('orders_items.order_id', $order->order_id)
                                                            ->get();
                        
                            $order_items = [];
                            foreach ($orders_items_data as $order_item) {
                                $orderItemData = [
                                    'order_id' => $order_item->order_id,
                                    'product_id' => $order_item->product_id,
                                    'product_name' => $order_item->product_name,
                                    'image' => $order_item->image,
                                    'cost_price' => $order_item->cost_price,
                                    'net_price' => $order_item->net_price,
                                    'discount' => $order_item->discount,
                                    'quantity' => $order_item->quantity,
                                ];
                        
                                $order_items[] = $orderItemData;
                            }
                        
                            $orderData = [
                                'order_id' => $order->order_id,
                                'order_status' => $order->status,
                                'payment_method' => $order->payment_method,
                                'shipping_name' => $order->shipping_name,
                                'shipment_image' => $order->shipment_image,
                                'total' => $order->total,
                                'total_net' => $order->total_net,
                                'total_cost' => $order->total_cost,
                                'order_items' => $order_items,
                            ];
                        
                            $orders_all[] = $orderData;
                        }

        // echo '<pre>';
        // print_r($orders_all);
        // echo '</pre>';

        return view('user/contents/Purchase', compact('categories', 'profile', 'shipment_type', 'orders', 'orders_items', 'orders_all', 'orders_count_status'));
    }

}