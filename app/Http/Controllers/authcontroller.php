<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Member;
use App\Models\Role;
use App\Models\RoleMenuMapping;
use App\Models\UserRoleMapping;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class authcontroller extends Controller
{
    public function registeruser(Request $req){
        $req->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email|unique:members',
            'password' => 'min:4|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:4',
            'number'=>'required'
        ]);
       

        $member=new Member;
        $member->firstname=$req->firstname;
        $member->lastname=$req->lastname;
        $member->email=$req->email;
        $member->password=Hash::make($req->password);
        $member->number=$req->number;
        $res=$member->save();
        if($res){
         return back()->with('success','You have registered successfully');
        }else{
            return back()->with('fail','something went wrong');
        }
    
    }

    protected function authenticated(Request $request, $user) 
    {
        return redirect()->intended();
    }

    
    public function loginuser(Request $req){
        $req->validate([
            'emailid'=>'required',
            'password'=>'required | min:4'
        ]);
        
        // $credentials = $req->only('emailid', 'password');
        // if (Auth::attempt($credentials)) {
        // dd("password",$req->password);
        // dd("email",$req->emailid);
        // dd(Hash::check($req->password,"$2y$10$6UAKUMwR4wOBRlvzInoXU.BNtHrXdH3BbAE7cGaQakGJZNKNP7Tqm"));

        
        if (Auth::attempt(['email' => $req->emailid, 'password' => $req->password]))
        { 
        
            $user = Auth::user();
            // dd($user);
            $req->session()->put('user', $user);
            $data = $req->session()->all();
            // dd($data);
            // Auth::login($user);
            // return $this->authenticated($req, $user);
            return redirect('/dashboard');
        }
  
        return 'You have entered invalid credentials';


        // $user = Member::where('email','=',$req->emailid)->first();
        // if(!$user)
        // {
        //     return back()->with('fail','This email is not registered');
        // }
        // else{
        //     if(Hash::check($req->password,$user->password))
        //     {
        //         $req->session()->put('loggedUser',$user->email);
        //         return redirect('dashboard');
        //     }
        //     else{
        //     return back()->with('fail','Password not matches');
        //     }
        // }

    }


    public function layout(){
        // if(Session::has('loggedUser')){
        // $data=['loggedUserInfo'=>Member::where('email','=',Session('loggedUser'))->first()];
        // return view('layout','data');
        // }
         return view('layout');
    }

    public function dashboard(){
        // $data=[];
        // if(Session::has('loggedUser')){
        //     $data=["loggedUserInfo"=>Member::where('email','=',Session('loggedUser'))->first()];  
        // } 
        // return view('dashboard',$data);
        return view('dashboard');
    }
    
    public function logout(){
        // if(session()->has('loggedUser')){
        //     session()->pull('loggedUser');
        //     return redirect('login');
        // }
        Auth::logout();
        return redirect('login');
    }
    
    public function addRoles(){
        // dd(Auth::check());
        return view('user/addRoles');

    }
    public function afteraddrole(Request $req){
        try{
        $role=new Role;
        if($req->role=='admin')
        {
            return redirect('user/addRoles')->with('message',"can't add admin role");
        }
        $role->rolename=$req->role;
        $res=$role->save();
            $msg=$req->role." role has been added succesfully";
           return redirect('user/addRoles')->with('message',$msg) ;
        }
        catch(\Illuminate\Database\QueryException $ex){
            // return redirect('user/addRoles')->with('message',$ex->getMessage());
            return redirect('user/addRoles')->with('message','cannot insert null value');}   

    }
    public function aftermaprole(Request $req){
        $checka = DB::table('user_role_mapping')->where('user_id', '=',$req->userid)->where('role_id', '=',$req->roleid)->first();
        if($checka)
        {  
            return redirect('user/mapRoles')->with('message','This mapping already exists'); 
        }
        $userrolemapping=new UserRoleMapping;
        $userrolemapping->user_id=$req->userid;
        $userrolemapping->role_id=$req->roleid;
        $res=$userrolemapping->save();
        if($res){
        return redirect('user/mapRoles')->with('message','data saved succesfully'); 
        }
        else{
        return redirect('user/mapRoles')->with('message','something went wrong');   
        }
    }

    public function mapRoles(){
      $a= Role::all();
       $b=Member::all();
        return view('user/mapRoles',['roledata'=>$a,'memberdata'=>$b]);
    }
   
    public function mapmenu(){
        $a= Role::all();
        return view('user/mapMenu',['roledata'=>$a]);
    }
    
    public function aftermapmenu(Request $req){
     
    //  dd($req->accessfield);
    
     if(in_array('Dashboard', $req->get('accessfield'))){
        $rolemenumapping=new RoleMenuMapping;
        $rolemenumapping->role_id=$req->roleid;
        $rolemenumapping->route_name='dashboard'; 
        $res=$rolemenumapping->save();
     }
     if(in_array('Roles', $req->get('accessfield'))){
        $rolemenumapping=new RoleMenuMapping;
        $rolemenumapping->role_id=$req->roleid;
        $rolemenumapping->route_name='user/addRoles';
        $res=$rolemenumapping->save();
     }
   
     
     if($res){
     return redirect('user/mapMenu')->with('message','data saved succesfully'); 
     }
     else{
     return redirect('user/mapMenu')->with('message','something went wrong');   
     }
     
    }
    

     


    public static function check($id){

         $data=DB::table('members')
                ->join('user_role_mapping','members.id','=','user_role_mapping.user_id')
                ->join('role_menu_mappings','user_role_mapping.role_id','=','role_menu_mappings.role_id')
                ->where('user_role_mapping.user_id',$id)
                ->select('role_menu_mappings.route_name')
                ->distinct()
                ->get();

        // dd($id);
        // $data=Member::join('user_role_mapping','members.id','=','user_role_mapping.user_id')
        // ->join('role_menu_mappings','user_role_mapping.role_id','=','role_menu_mappings.role_id')
        // ->where('user_role_mapping.id',$id)
        // ->get(['role_menu_mappings.role_id']);
                // dd($data->pluck('route_name'));
                // dd("hello");
                return $data->pluck('route_name');

        //   $collection=Http::get('https://reqres.in/api/users?page=1');
        //   return view('order',['collection'=>$collection['data']]);
    }

        // $credentials = $req->only('emailid', 'password');
        // if (Auth::attempt($credentials)) {
        //     return redirect()->intended('welcome')
        //                 ->withSuccess('You have Successfully loggedin');
        // }
  
        // return redirect("login")->withSuccess('You have entered invalid credentials');

    
    // public function getdata(){
    //     return Member::all();
    // //    return ['name'=>'aakash','email'=>'aakashsingh1210@gmail.com','address'=>'patna,bihar'];
    // }
    // public function postdata(){
    //    return "added";
    // }
    // public function postimage(Request $req){
    //     $result=$req->file('file')->store('apiDocs');
    //     return["result"=>$result];
    //  }

}
