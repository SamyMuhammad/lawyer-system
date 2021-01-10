<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:view users')->only('index');
        $this->middleware('can:show user')->only('show');
        $this->middleware('can:create users')->only(['create', 'store']);
        $this->middleware('can:edit users')->only(['edit', 'update']);
        $this->middleware('can:delete users')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index')->with('users', $users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            error(__('flashes.notFound'));
            return redirect()->route('user.index');
        }

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->except(['password', 'photo']);
        
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        DB::beginTransaction();

        if ($request->hasFile('photo')) {
            $name = storeFile('photo', 'users/images');
            $data['photo'] = $name;
        }
        $user = User::create($data);
        $user->syncPermissions($data['permissions']);
        $user->syncRoles($data['roles']);
        DB::commit();

        success(__('flashes.store'));
        return redirect()->route('user.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            error(__('flashes.notFound'));
            return redirect()->route('user.index');
        }

        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        
        if (!$user) {
            error(__('flashes.notFound'));
            return redirect()->route('user.index');
        }
        $data = $request->except(['password', 'photo']);
        
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        DB::beginTransaction();

        if ($request->hasFile('photo')) {
            $name = storeFile('photo', 'users/images');
            $data['photo'] = $name;
            $user->deletePhotoFromUploads();
        }
        $user->update($data);
        $user->syncPermissions($data['permissions']);
        $user->syncRoles($data['roles']);
        DB::commit();

        success(__('flashes.update'));
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            error(__('flashes.notFound'));
            return redirect()->route('user.index');
        }
        DB::beginTransaction();
        $user->deletePhotoFromUploads();
        $user->delete();
        DB::commit();

        success(__('flashes.destroy'));
        return redirect()->route('user.index');
    }
}
