<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;
class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
    	return view('admin.users.index', compact('users') );
    }

    public function add(UserRequest $request)
    {
        try{
            $user = new User;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->birthday = $request->dob;
            $user->save();
            return redirect(route('admin.users.index'))->with('success', 'Success');
        } catch (Exception $exception) {
            return redirect(route('admin.users.index'))->with('fail', 'Fail');
        }
    }

    public function edit(UserRequest $request)
    {
        try {
            $user = User::findOrFail($request->user_id);

            $user->update($request->all());
            return redirect("/admin/user")->with('success', 'Success');
        } catch (Exception $exception) {
            return redirect("/admin/user")->with('fail', 'Fail');
        }

    }
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect("/admin/user")->with('success', 'Success');
        } catch (Exception $exception) {
            return redirect("/admin/user")->with('fail', 'Fail');
        }
    }
}
