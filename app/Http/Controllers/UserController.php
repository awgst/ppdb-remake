<?php

namespace App\Http\Controllers;
use App\User;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Show admin mangement view
        $users = DB::table('users')->where('level', 'admin')->get();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(User $user)
    {
        // Show edit form
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Store update user data
        $rule = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
        $request->validate($rule,[
            'required'=>'Harap isi bidang ini',
            'confirmed'=>':attribute yang dimasukkan tidak sama',
            'min'=>'Panjang :attribute minimal 8 karakter',
        ]);
        $request = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ];
        User::where('id', $user->id)->update($request);
        return redirect('/users')->with('updated', 'succeed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // Delete account permanently
        $users = User::find($user->id);
        $users->delete();
        return redirect('users')->with('deleted', 'succeed');
    }

    /**
     * Show soft deleted data by admin
     */
    public function deleted(){
        $students = Student::onlyTrashed()->get();
        return view('user/deleted', compact('students'));
    }
    /**
     * Restore soft deleted data
     */
    public function restore(Request $request){
        Student::withTrashed()->where('id', $request->id)->restore();
        return redirect('users/deleted')->with('restored', 'succeed');
    }
    /**
     * Permanently Delete
     * 
     * @param  Student  $student
     * @return \Illuminate\Http\Response
     */
    public function permanentDelete(Request $request){
        Student::withTrashed()->where('id', $request->id)->forceDelete();
        return redirect('users/deleted')->with('forceDeleted', 'succeed');
    }
}
