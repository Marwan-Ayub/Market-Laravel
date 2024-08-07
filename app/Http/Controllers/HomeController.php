<?php

namespace App\Http\Controllers;
use Hash;
use Illuminate\Http\Request;
use App\Models\sidebar;
use App\Models\sidebarUser;
use App\Models\User;
use App\Models\supplier;
use App\Models\store;
use App\Models\sold;
use Carbon\Carbon;
use Auth;
class HomeController extends Controller
{

    public function showData(){
        $cashiers = supplier::all();
        return response()->json([
            'data' => $cashiers,
            'message' => 'Success',
            'code' => 200
        ]);
    }
    public function edit($id){
        $edit = supplier::find($id);
        if($edit){
            return response()->json($edit);
        }
    }

    public function insert(Request $request){
        $insert = new supplier();
        $insert->company_name = $request->company_name;
        $insert->email = $request->email;
        $insert->address = $request->address;
        $insert->phonenumber = $request->phonenumber;
        $insert->save();
        return response()->json([
            'message' => 'Success',
            'code' => 200
        ]);

    }

    public function delete($id){
        $delete = supplier::find($id);
        if ($delete) {
            $delete->delete();
            return response()->json([
                'message' => 'Deleted Success',
                'code' => 200
            ]);
        }else{
            return response()->json([
                'message' => "That id:$id not exits"
            ]);
        }

    }

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function sidebar(){
        return sidebar::all();
    }
    public function sidebar2(){
        return sidebarUser::all();
    }

    public function Index()
    {
        $sidebar =$this->sidebar();
        return view('sale',compact('sidebar'));
    }
    public function Index2()
    {
        $sidebar =$this->sidebar2();
        return view('Sale',compact('sidebar'));
    }

    // Cashier

    public function Cashier(){
        $sidebar =$this->sidebar();
        $cashiers = User::all();
        return view('cashier',compact('sidebar','cashiers'));
    }

    public function AddCashier(Request $request,$status,$id){
        if($status == 0){
            $validator = \Validator::make($request->all() , [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'rule' => 'required',

            ]);
            if($validator->fails()){
                return redirect('cashier')->withErrors($validator);
            }else{
               $cashier = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' =>Hash::make($request->password),
                    'rule' => $request->rule,
                ]);
            }
        }elseif($status == 1 && !empty($status)){
            $cashier = User::findOrfail($id);
            $cashier->delete();
        }else{
            $validator = \Validator::make($request->all() , [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'rule' => 'required',

            ]);
            if($validator->fails()){
                return redirect('cashier')->withErrors($validator);
            }else{
               $cashier = User::where('id',$id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' =>Hash::make($request->password),
                    'rule' => $request->rule,
                ]);
            }
        }



            return $cashier ? redirect('cashier')->with('Result','The Cashier Was Success') : redirect('cashier')->with('Result','Some Thing is went wrong');



    }

    // Supplier

    public function Supplier(){
        $sidebar = $this->sidebar();
        $supplier = supplier::all();
        return view('Supplier', compact('sidebar','supplier'));

    }

    public function AddSupplier(Request $request,$status,$id){

        if($status == 0){
            $validator = \Validator::make($request->all() , [
                'name' => 'required',
                'email' => 'required',
                'address' => 'required',
                'phonenumber' => 'required',

            ]);
            if($validator->fails()){
                return redirect('supplier')->withErrors($validator);
            }else{
               $supplier = supplier::create([
                    'company_name' => $request->name,
                    'email' => $request->email,
                    'address' =>$request->address,
                    'phonenumber' => $request->phonenumber,
                ]);
            }
        }elseif($status == 1 && !empty($status) && !empty($status)){
            $supplier = supplier::findOrfail($id);
            $supplier->delete();
        }else{
            $validator = \Validator::make($request->all() , [
                'name' => 'required',
                'email' => 'required',
                'address' => 'required',
                'phonenumber' => 'required',

            ]);
            if($validator->fails()){
                return redirect('supplier')->withErrors($validator);
            }else{
               $supplier = supplier::where('id',$id)->update([
                    'company_name' => $request->name,
                    'email' => $request->email,
                    'address' =>$request->address,
                    'phonenumber' => $request->phonenumber,
                ]);
            }
        }



            return $supplier ? redirect('supplier')->with('Result','The Supplier Was Success') : redirect('supplier')->with('Result','Some Thing is went wrong');


    }

    // Buy

    public function Buy(){
        $sidebar = $this->sidebar();
        $supplier = supplier::all();
        $store = store::with('one_supplier')->orderBy('id','DESC')->paginate(30);
        return view('Store', compact('sidebar','store','supplier'));
    }

    public function AddStore(Request $request,$status,$id){
        $requirs =  [
            'id' => 'required',
            'name' => 'required',
            'supplier_id' => 'required',
            'count' => 'required',
            'price' => 'required',
            'expire_date' => 'required',
            'is_debt' => 'required',
            'type' => 'required',

        ];

        $fill = [
            'id' => $request->id,
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'count' => $request->count,
            'price' => $request->price,
            'expire_date' => $request->expire_date,
            'is_debt' => $request->is_debt,
            'type' => $request->type,
        ];

        if($status == 0){
            $validator = \Validator::make($request->all() , $requirs);
            if($validator->fails()){
                return redirect('buy')->withErrors($validator);
            }else{
               $store = store::create($fill);
            }
        }elseif($status == 1 && !empty($status)){
            $store = store::findOrfail($id);
            $store->delete();
        }else{
            $validator = \Validator::make($request->all() ,$requirs );
            if($validator->fails()){
                return redirect('buy')->withErrors($validator);
            }else{
               $store = store::where('id',$id)->update($fill);
            }
        }

        return $store ? redirect('buy')->with('Result','The Store Was Success') : redirect('buy')->with('Result','Some Thing is went wrong');

    }

    // Not Left

    public function Notleft(){
        $sidebar = $this->sidebar();
        $supplier = supplier::all();
        $store = store::where('count','<=',3)->with('one_supplier')->orderBy('id','DESC')->paginate(30);
        return view('Notleft',compact('sidebar','supplier','store'));
    }
    // Not Left Users

    public function Notleft2(){
        $sidebar =$this->sidebar2();
        $supplier = supplier::all();
        $store = store::where('count','<=',3)->with('one_supplier')->orderBy('id','DESC')->paginate(30);
        return view('Notleft',compact('sidebar','supplier','store'));
    }


    // Debt list

    public function Debtlist(Request $request){
        $sidebar = $this->sidebar();
        $supplier = supplier::all();
        $store = store::where(['is_debt'=>1,'supplier_id'=>$request->supplier_id])->with('one_supplier')->orderBy('id','DESC')->paginate(30);
        return view('Debtlist',compact('sidebar','supplier','store'));
    }

    // Debt listUser

    public function Debtlist2(Request $request){
        $sidebar = $this->sidebar2();
        $supplier = supplier::all();
        $store = store::where(['is_debt'=>1,'supplier_id'=>$request->supplier_id])->with('one_supplier')->orderBy('id','DESC')->paginate(30);
        return view('DebtlistUser',compact('sidebar','supplier','store'));
    }


    // Expire

    public function Expire(){
        $sidebar = $this->sidebar();
        $supplier = supplier::all();
        $store = store::where('expire_date','<=',Carbon::now())->with('one_supplier')->orderBy('id','DESC')->paginate(30);
        return view('Expire',compact('sidebar','supplier','store'));
    }

    // ExpireUser

    public function Expire2(){
        $sidebar = $this->sidebar2();
        $supplier = supplier::all();
        $store = store::where('expire_date','<=',Carbon::now())->with('one_supplier')->orderBy('id','DESC')->paginate(30);
        return view('Expire',compact('sidebar','supplier','store'));
    }

    // Sellers

    public function Sellers(){

        $x = sold::where('clean' , 1)->get();
        $sum = 0;

        for ($i=0; $i <count($x) ; $i++) {
           $k = $x[$i]['price_at'] * $x[$i]['piece'];
            $sum +=$k;
        }


        $lists = [
            'All_pieces' => sold::where('clean',1)->sum('piece'),
            'All_price' => $sum,
            'All_pieces_Today' => sold::where(['clean'=> 1,'created_at'=> Carbon::today()])->sum('piece'),
            'All_price_Today' => sold::where(['clean'=> 1,'created_at'=> Carbon::today()])->sum('price_at'),
        ];


        $sidebar = $this->sidebar();
        $solds = sold::with('cashier','one_store')->orderBy('id','DESC')->paginate(60);
        return view('Sellers',compact('sidebar','solds','lists'));
    }

    // Sale

    public function Sale(){
        $sidebar = $this->sidebar();
        return view('Sale',compact('sidebar'));
    }

    public function Get_Sale(Request $request){

        if(empty($request->id)){
            exit("Empty");
        }
        $store = store::find($request->id);
        if($store){
           if($store->count != 0){
                if($store->expire_date > Carbon::today()){
                    $store->count = $store->count - 1;
                    $store->save();

                    $find_sold = sold::where(['user_id' => Auth::id(),'store_id' => $store->id,'clean' => 0])->first();
                    if($find_sold == null){
                    $sold = sold::create([
                        'user_id' => Auth::id(),
                        'store_id' => $store->id,
                        'clean' => 0,
                        'price_at' => $store->price,
                        'piece' => 1,

                    ]);
                    return $sold ? "success" : "Error !";
                }else{
                    $find_sold->piece = $find_sold->piece + 1;
                    $find_sold->save();
                    return "success";
                }
                }else{
                    exit("The Product is Expired !");
                }
           }else{
            exit("The Product Is not Longer Available !");
           }
        }else{
            exit("The Product Not Found !");
        }

    }


    public function ViewTb(){
        $solds = sold::where(['user_id' => Auth::id(), 'clean' => 0])->orderBy('created_at','DESC')->get();
        return view('Layout.Table',compact('solds'));
    }

    public function Undo(Request $request){
        $find_sold = sold::where(['clean' => 0, 'user_id' => Auth::id()])->find($request->sold_id);
        if($find_sold){
            $find_store = store::find($find_sold->store_id);
            if($find_store){
                // Count + 1
                $find_store->count = $find_store->count + 1;
                $find_store->save();
                // piece - 1
                if($find_sold->piece ==1){
                    $find_sold->delete();
                }else{
                    $find_sold->piece = $find_sold->piece - 1;
                    $find_sold->save();
                }
                return"success";

            }else{
                exit("fail");
            }
        }else{
            exit("fail");
        }
    }
    public function Invoice(){
        $sold = sold::where(['user_id' => Auth::id() , 'clean' => 0])->get();
        return view('Layout.Invoice', compact('sold'));
    }

    public function Clean(){
        $sold = sold::where(['user_id' => Auth::id()])->update(['clean' => 1]);
        return redirect('sale');
    }

        // SaleUser

        public function Sale2(){
            $sidebar = $this->sidebar2();
            return view('Sale',compact('sidebar'));
        }

}
