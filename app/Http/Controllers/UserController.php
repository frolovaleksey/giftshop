<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected $searchFields = [
        'email',
        'name',
        'last_name',
        'first_name',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = DB::table('users')
            ->select();

        $items = null;
        if( $request->ajax() ){
            $query = $this->prepeareSpecialQuery($query, $request);
            $items = $this->prepeareQuery($query, $request)->paginate( $this->perPage );
        }

        $view_options = [
            'items' => $items,
            'add_url' => route('users.create'),
            'add_text' => __('user.add_user'),
            'page_title' => __('user.users'),
        ];

        if( $request->ajax() ){
            $result = view('admin.user.table', $view_options) . view('global.pagination', $view_options);
            return $result;
        }

        return view('admin.user.index', $view_options);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view_options = [
            'page_title' => __('user.add_user'),
        ];
        return view('admin.user.create', $view_options);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //self::test();
        $item = new User;

        $this->validate($request, $item->rules(), $item->validation_messages());

        $item->fill($request->all());

        $item->password = Hash::make(Str::random(40) );
        $item->save();

        return redirect()->route('users.edit', ['user' => $item->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = User::findOrFail( $id );

        $all_roless = Role::all();

        $view_options = [
            'item' => $item,
            'all_roles' => $all_roless,
            'user_roles' => $item->roles,
            'page_title' => __('user.edit_account'),
        ];
        return view('admin.user.edit', $view_options);
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
        //self::test();
        $item = User::findOrFail( $id );

        $this->validate($request, $item->rules($id) );
        $item->fill($request->all());

        $item->save();

        return redirect()->route('users.edit', ['user' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::findOrFail($id);
        $item->delete();
        return redirect()->route('users.index');
    }

    public function setPass(Request $request, $id){
        $item = User::findOrFail($id);

        $rules = [
            'password' => 'required|confirmed|min:8',
        ];
        $this->validate($request, $rules );

        $item->password = Hash::make( $request->password );

        $item->save();

        return redirect()->route('users.edit', ['user' => $id]);
    }

    public function setRole(Request $request, $id){
        $item = User::findOrFail($id);

        $item->syncRoles( $request->role );

        return redirect()->route('users.edit', ['user' => $id]);
    }

    public function lock(Request $request, $id)
    {
        $item = User::findOrFail($id);
        $item->active = 0;
        $item->save();

        return redirect()->back();
    }

    public function unlock(Request $request, $id)
    {
        $item = User::findOrFail($id);
        $item->active = 1;
        $item->save();

        return redirect()->back();
    }

    protected function prepeareSpecialQuery(Builder $query, Request $request)
    {
        // sort group
        if ($request->has('special_sg')) {
            $sg = $request->input('special_sg');
            foreach ($sg as $sg_key => $sg_value ) {

                switch ($sg_key) {
                    case 'status':
                        if( $sg_value !== 'all'){
                            $query->where( 'users.status', $sg_value );
                        }
                        break;
                }
            }
        }

        return $query;
    }
}
