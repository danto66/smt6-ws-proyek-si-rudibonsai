<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Address\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class AccountController extends Controller
{
    //mengambil data dari table akun
    public function index()
    {
        $user = User::with('userProfile')
            ->where('id', auth()->User()->id)->first();

        return view('main.account-index', compact('user'));
    }
    public function edit()
    {
        $user = User::with('userProfile')
            ->where('id', auth()->User()->id)->first();


        return view('main.account', compact('user'));
    }
    //proses update data akun 
    public function update(Request $request)
    {
        $userProfile = UserProfile::where('user_id', auth()->User()->id)->first();
        $userProfile = auth()->user()->userProfile()->with(['province', 'city', 'subdistrict'])->get()->first();
        $user = User::find(auth()->User()->id);
        if ($request->province_id  !=  null) {
            $userProfile->province_id = $request->province_id;
        }
        if ($request->city_id  !=  null) {
            $userProfile->city_id = $request->city_id;
        }
        if ($request->subdistrict_id  !=  null) {
            $userProfile->subdistrict_id = $request->subdistrict_id;
        }
        $userProfile->fullname = $request->fullname;

        $userProfile->phone = $request->phone;

        $userProfile->address_detail = $request->address;







        if ($request->password !=  null) {
            $user->password = Hash::make($request->password);
            $user->save();
        }


        if ($request->hasFile('profileupload')) {
            $file = $request->file('profileupload');

            $image = $this->storeImage($file);
            $userProfile->profile_picture = $image;
        }

        $userProfile->save();
        return redirect()->route('main.account.index')->with(['type' => 'success', 'message' => 'Profile berhasil di update']);
    }
    //unggah gambar kepada storage
    public function storeImage($file)
    {
        $name = rand(1000, 9999);
        $time = time();
        $extension = $file->getClientOriginalExtension();
        $newName = $time . $name  . '.' . $extension;

        Storage::putFileAs('storage/img/profile-picture', $file, $newName);

        return $newName;
    }
}
