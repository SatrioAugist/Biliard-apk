<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\LogM;
    use Illuminate\Support\Facades\Auth;

    class LogC extends Controller
    {
        public function index()
        {
            // Log the user activity when they visit the Log page
            LogM::create([
                'id_user' => Auth::user()->id,
                'activity' => "User Di Halaman Log"
            ]);

            // Retrieve the list of activities for display
            $sub = "Daftar Activity";
            $LogM = LogM::select('users.name', 'users.role', 'log.*')
                ->join('users', 'users.id', '=', 'log.id_user')
                ->orderBy('log.created_at', 'desc') // Order by created_at in descending order
                ->get();

            return view('log', compact('sub', 'LogM'));
        }
    }
