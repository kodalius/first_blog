<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;

class UpdateController extends Controller
{
    public function __invoke(User $user, UpdateRequest $request){
        $data = $request->validated();
        $user->update($data);
        return view('admin.user.show', compact('user'));
    }
}
