<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function store(User $user) :RedirectResponse
    {
        auth()->user()->following()->attach($user->id);

        return redirect(route('chirps.index'));
    }

    public function destroy(User $user) :RedirectResponse
    {
        auth()->user()->following()->detach($user->id);

        return redirect(route('chirps.index'));
    }
}
