<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list()
    {
        $getRecords = User::where('user_type', 1)->orderBy('id', 'desc')->get();
        return view('admin.admin.list', compact('getRecords'));
    }

    public function add()
    {
        return view('admin.admin.add');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        $admin = new User;
    
        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/profile_pics'), $filename);
            $admin->profile_pic = $filename;
        }
    
        $admin->email = trim($request->email);
        $admin->password = Hash::make($request->password);
        $admin->user_type = 3;
        $admin->save();
    
        return redirect()->route('admin.admin.list')->with('success', 'admin added successfully.');
    }

    public function showEditForm($id)
{
    $user = User::findOrFail($id);
    return view('admin.admin.edit', compact('user'));
}

    public function updateUser($id, Request $request)
    {
        $user = User::find($id);
        if (!$user) {
            abort(404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
       
        $user->save();
        return redirect('admin/admin/list')->with('success', "Admin berhasil diupdate");
    }
    
    public function delete($id)
{
    $user = User::find($id);
    if (!$user) {
        abort(404);
    }

    $user->delete();

    return redirect('admin/admin/list')->with('success', "Admin berhasil dihapus");
}

}
