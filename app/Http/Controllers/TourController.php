<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TourController extends Controller
{
    public function getTour()
    {
        $gettour = Tour::where('is_active', 1)->get()->sortByDesc('id');
        return view('service' , ['gettour' => $gettour]);
    }

    public function search(Request $request)
    {
        $search = $request['destination'];
        $stour = Tour::where('destination',$search)->get();
        return view('search' , ['stour' => $stour]);
    }

    public function showtour(Request $request,$id)
    {
        $showatour = Tour::findOrFail($id);
        return view('showtour' , ['showatour' => $showatour]);
    }

    public function getTours()
    {
        $user = Auth::user()->id;
        $cuser = Tour::where('user_id','=' ,1)->get();
        foreach ($cuser as $sam){
            echo $sam.'<br>';
        };
//        $Ag = Agency::get($user);
//        return $cuser->tUser()->get();
    }
}
