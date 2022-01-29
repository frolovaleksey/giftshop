<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Role::paginate( $this->perPage );

        $view_options = [
            'items' => $items,
            'add_url' => route('roles.create'),
            'add_text' => __('role.add_role'),
            'page_title' => __('role.roles'),
        ];

        return view('admin.role.index', $view_options);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view_options = [
            'page_title' => __('role.add_role'),
        ];
        return view('admin.role.create', $view_options);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:roles,name',
        ];

        $this->validate($request, $rules);
        $item = Role::create(['name' => $request->name]);

        return redirect()->route('roles.edit', ['id' => $item->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Role::findOrFail( $id );

        $permissions = Permission::all();

        $view_options = [
            'item' => $item,
            'roles' => Role::all(),
            'permissions' => $permissions,
            'page_title' => __('role.edit_role'),
        ];
        return view('admin.role.edit', $view_options);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Role::findOrFail( $id );

        $rules = [
            'name' => 'required|unique:roles,name',
        ];

        $this->validate($request, $rules);

        $item->fill($request->all());

        $item->save();

        return redirect()->route('roles.edit', ['id' => $id]);
    }

    public function copyPermission(Request $request, $id)
    {
        $item = Role::findOrFail( $id );
        $copy_item = Role::findOrFail( $request->role );

        foreach ($copy_item->permissions()->get() as $permission){
            $item->givePermissionTo($permission);
        }

        return redirect()->route('roles.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Role::findOrFail($id);
        $item->permissions()->detach();
        $item->delete();
        return redirect()->route('roles.index');
    }

    public function setPermission(Request $request, $id){
        $item = Role::findOrFail( $id );

        $item->syncPermissions($request->permissions);

        return redirect()->route('roles.edit', ['id' => $item->id]);
    }
}
