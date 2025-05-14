<?php

namespace App\Http\Controllers;

use App\Models\BookUser;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function getUserBorrowedBooksThisMonth($userId)
    {
        return BookUser::where('user_id', $userId)
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    }
}
