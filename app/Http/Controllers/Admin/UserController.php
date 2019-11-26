<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Validator;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::orderBy('id','desc')->paginate(2);
        return view('admin.user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::allows('admin',auth()->user()))
        {
            return view('admin.user.create');
        }
        session()->flash('message','You are not authorized to perform this operation.');
        return redirect()->route('admin.dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Gate::allows('admin',auth()->user())) {


            $request->validate([
                'role' => 'required',
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed',
                'image' => 'mimes:jpeg,png|max:2048',
            ]);

            $data = $request->except(['_token', 'password', 'image']);
            $data['password'] = bcrypt($request->password);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = 'image/user';
                $file->move($path, $file->getClientOriginalName());
                $data['image'] = $path . '/' . $file->getClientOriginalName();
            }

            User::create($data);
            session()->flash('message', 'Admin created successfully');
            return redirect()->route('user.index');
        }
        session()->flash('message','You are not authorized to perform this operation.');
        return redirect()->route('admin.dashboard');
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
        if(Gate::allows('admin',auth()->user())) {
            $data['user'] = User::findOrFail($id);
            return view('admin.user.edit', $data);
        }
        session()->flash('message','You are not authorized to perform this operation.');
        return redirect()->route('admin.dashboard');
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
        if(Gate::allows('admin',auth()->user())) {
            $request->validate([
                'role' => 'required',
                'name' => 'required',
                'image' => 'mimes:jpeg,png|max:2048',
            ]);

            $data['role'] = $request->role;
            $data['name'] = $request->name;

            $user = User::findOrFail($id);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = 'image/user';
                $file->move($path, $file->getClientOriginalName());
                $data['image'] = $path . '/' . $file->getClientOriginalName();
                if ($user->image != null && file_exists($user->image)) {
                    unlink($user->image);
                }
            }
            $user->update($data);
            session()->flash('message', 'Admin updated successfully');
            return redirect()->route('user.index');
        }
        session()->flash('message','You are not authorized to perform this operation.');
        return redirect()->route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::allows('admin',auth()->user())) {
            User::destroy($id);
            session()->flash('message', 'Admin deleted successfully');
            return redirect()->back();
        }
        session()->flash('message','You are not authorized to perform this operation.');
        return redirect()->route('admin.dashboard');

    }
    public function import(Request $request)
    {
        Excel::import(new UsersImport,$request->import);
        return redirect()->back();
    }
}
