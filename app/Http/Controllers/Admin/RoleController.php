<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Auth;

class RoleController extends Controller
{

    public $title='';

    public $edit_title='';

    public $role_add = '';

    public $role_add_error = '';

    public $role_edit = '';

    public $role_find_issue = '';

    public $role_edit_error = '';

    public $role_delete = '';

    public $role_delete_issue = '';

    public $role_bulk_status_change = '';

    public $role_bulk_delete = '';


   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->title =__("adminPageTitle.role");

        $this->edit_title =__("adminPageTitle.edit_role");

        $this->role_add =__("adminMsg.role_add");

        $this->role_add_error =__("adminMsg.role_add_error");

        $this->role_edit =__("adminMsg.role_edit");

        $this->role_find_issue =__("adminMsg.role_find_issue");

        $this->role_edit_error =__("adminMsg.role_edit_error");

        $this->role_delete =__("adminMsg.role_delete");

        $this->role_delete_issue =__("adminMsg.role_delete_issue");

        $this->role_bulk_status_change =__("adminMsg.role_bulk_status_change");

        $this->role_bulk_delete =__("adminMsg.role_bulk_delete");
        

        $this->middleware('permission:role-list|role-add|role-edit|role-delete', ['only' => ['index']]);
        $this->middleware('permission:role-add', ['only' => ['add_role_form','add_role']]);
        $this->middleware('permission:role-edit', ['only' => ['edit_form','edit_role_save']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);

    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $no_of_records=50;

        $title=$this->title;

        $roles = Role::orderBy('id','DESC')->paginate($no_of_records)->appends(request()->query());

        return view('admin.role')->with(compact('title','roles'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_role_form()
    {
        $title=$this->title;

        $permissions = Permission::orderBy('id','asc')->get();

        return view('admin.role_add')->with(compact('title','permissions'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_role(Request $request)
    {
        $title=$this->title;

        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        try{
            $role = Role::create(['name' => $request->input('name')]);

            $role->syncPermissions($request->input('permission'));

            if(Auth::user()->hasrole('Super Admin') OR Auth::user()->hasAnyPermission(['role-list','role-add','role-edit','role-delete'])){
        
               return redirect()->back()->with(['success'=>$this->role_add, 'title'=>$this->title]);

            } else {

                return redirect(route('admin_dashboard'));

            }

            

        }catch(\Exception $e) {
    
            $request->session()->flash('error', $this->role_add_error);
            return redirect()->back()->withInput();

        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public static function getAllPermissions()
    {

        $permissions = array();

        $permissions = Permission::orderBy('id','asc')->get();
    
        return $permissions;
    }

    public static function getPermissions($id)
    {

        $rolePermissions = array();

        if($id){

            $role = Role::find($id);

            $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
                ->where("role_has_permissions.role_id",$id)
                ->orderBy('id','asc')->get();
        }
    
        return $rolePermissions;
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_form(Request $request)
    {

        $title = $this->edit_title;

        $role_id = $request->route('id');

        $data = Role::find($role_id);

        $permissions = Permission::get();

        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$role_id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('admin.role_edit')->with(compact('title','data','permissions','rolePermissions'));
    
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_role_save(Request $request)
    {
        $role_id=$request->role_id;

        $role = Role::find($role_id);

        $this->validate($request, [

            'name' => ['required',Rule::unique('roles')->ignore($role->id)],

            'permission' => 'required',
        ]);

        try{
    
            $role->name = $request->input('name');

            $role->save();
        
            $role->syncPermissions($request->input('permission'));

            if(Auth::user()->hasrole('Super Admin') OR Auth::user()->hasAnyPermission(['role-list','role-add','role-edit','role-delete'])){
        
                return redirect(route('admin_role_show').get_edit_redirect_query_string())->with('success', $this->role_edit);

            } else {

                return redirect(route('admin_dashboard'));

            }

        }catch(\Exception $e) {

            $request->session()->flash('error', $this->role_edit_error);

            return redirect()->back()->withInput();

        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       $role_id = $request->role_id;
        if(is_numeric($role_id)){
            try{
                $role = Role::find($role_id);
                $role->delete();
                if(Auth::user()->hasrole('Super Admin') OR Auth::user()->hasAnyPermission(['role-list','role-add','role-edit','role-delete'])){
        
                    return redirect()->back()->with('success', $this->role_delete);

                } else {

                    return redirect(route('admin_dashboard'));

                }

                
            } catch(\Exception $e){
                return redirect()->back()->with('error', $this->role_delete_issue);
            } 
        } else {
            return redirect(route('admin_role_show'))->with('error', $this->role_delete_issue);
        }
    }
}