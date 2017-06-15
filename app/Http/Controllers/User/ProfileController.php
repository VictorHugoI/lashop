<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.profile', compact('user'));
    }

    public function update(UpdateProfileRequest $request, $id)
    {
        $file = $request->file('myfile')->store('', 'user');
        $data = $request->all();
        $data['url'] = $file;

        User::findOrFail($id)->update($data);

        return back();
    }
}
