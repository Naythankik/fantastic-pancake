<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function getUser($userId)
    {
        $borrowedBooks = User::with('books')->where('id', $userId)->firstOrFail();
    }
}
