<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function getDetail()
    {
        return view('teacher.profile.detail');
    }

    public function postUpdate(Request $request)
    {
        $user = Auth::guard('teacher')->user();

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            if ($request->password != $request->password_confirm) {
                return redirect()->back()->with([
                    'type' => 'danger',
                    'msg' => 'Kata sandi tidak cocok.',
                ]);
            }
            $user->password = bcrypt($request->password);
        }
        $user->update();

        return redirect()->back()->with([
            'type' => 'success',
            'msg' => 'Data berhasil diganti.',
        ]);
    }
}
