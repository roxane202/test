<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{   

    public function Permission()
    {   
    	
		$manager = new User();
		$manager->name = 'Jitesh Meniya';
		$manager->email = 'jitesh21@gmail.com';
		$manager->password = bcrypt('jitesh21');
		$manager->save();
		$manager->roles()->attach($manager_role);
		$manager->permissions()->attach($manager_perm);
		
	$user = User::all();
    dd($user);
		// return redirect()->back();
    }
    public function __construct()
    {
       $this->middleware('auth'); 
    }
    
    public function index(){
		$permissions = Permission::all();
		return view("permission/index",compact('permissions'));

	}

    public function store(Request $request)
    {
        if ($request->user()->can('create-tasks')) {
			
			   
        }
    }
	public function add(Request $request){
		Permission::create([
			'name' =>$request->name,
			'slug' =>$request->slug,
			
		   ]);
		   return redirect()->route('permission.index')->with('success','Ajout effectué');
	}
    
    public function destroy(Request $request, $id)
    {   
        // if ($request->user()->can('delete-tasks')) {
		// 	$permissions = Permission :: find($id);
		// 	$permissions->delete();
		// 	return redirect()->route('permission.index',compact('permissions'))->with('success','Suppression effectuée');
        // }
}
}