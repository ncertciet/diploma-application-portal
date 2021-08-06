<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;


class UserController extends Controller
{

    public function profile(User $user){
        /** @var User $user */

        $user = auth()->user();
        return view('user.edit', compact('user'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Throwable
     */
    public function profileUpdate(Request $request){

        /** @var User $user */
        $user = auth()->user();

        $data = $this->validate( $request, [
            'name' => 'required',
            'mobile' => 'required|digits:10',
        ]);

        $user->fill( $data );
        if( $request->password ){
            $user->password = Hash::make( $request->password );
        }

        $user->saveOrFail();

        return back()->with('status'," Your Profile has Updated successfully");


    }




}
