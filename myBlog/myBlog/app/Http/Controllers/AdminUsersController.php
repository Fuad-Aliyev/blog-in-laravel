<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Photo;

use Session;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UsersEditRequest;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('name', 'id');

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //

        $pass_conf = $request->passwordConfirm;

        $pass = $request->password;

        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['role_id'] = $request->role_id;


        if($pass_conf == $pass) {

            if($file = $request->file('photo_id')) {

                $name = time() . $file->getClientOriginalName();

                $file->move('images', $name);

                $photo = Photo::create(['path' => $name]);

                $input['photo_id'] = $photo->id;
            }

            $input['password'] = bcrypt($pass);

            User::create($input);

            Session::flash('successCreate', 'The user has been created successfully');

            return redirect('/admin/users');
            
        } else {

            Session::flash('password', 'Password mismatches!');

            return back();

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);

        $roles = Role::pluck('name', 'id');

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);

        $pass_conf = $request->passwordConfirm;

        $pass = $request->password;

        $input = $request->except('passwordConfirm');

        if($pass_conf == $pass) {

            if($file = $request->file('photo_id')) {

                $name = time() . $file->getClientOriginalName();

                $file->move('images', $name);

                $photo = Photo::create(['path' => $name]);

                $input['photo_id'] = $photo->id;
            }

            $input['password'] = bcrypt($pass);

            $user->update($input);

            Session::flash('successUpdate', 'The user has been updated successfully');

            return redirect('/admin/users');
        } else {

            Session::flash('password', 'Password mismatches!');

            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);

        if($user->photo) {

            unlink(public_path() . $user->photo->path);
        }

        $user->delete();

        Session::flash('delete', 'The user has been deleted successfully');

        return redirect('/admin/users');
    }
}
