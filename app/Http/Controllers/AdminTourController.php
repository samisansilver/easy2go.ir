<?php

namespace App\Http\Controllers;
use App\Http\Resources\Tour as TourCollection;
use App\Models\User;
use Illuminate\Contracts\Pagination;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class AdminTourController extends Controller
{

    public function calender()
    {

    }

    public function ShowTours()
    {
        $ruser = Auth::user()->id;
        $sam = Tour::where('user_id',$ruser);
        $gettours = $sam->paginate(5);
        return view('Admin.ManageTours', ['gettours' => $gettours]);
    }

    public function createtour()
    {
//        $edittours = Tour::findOrFail('id');
        return view('Admin.CreateTour');
    }

    public function savetour(Request $request)
    {
        $tourname = $request['tourname'];
        $destination = $request['destination'];
        $vehicle = $request['vehicle'];
        $period = $request['period'];
        $agency_id = 1;
        $user_id = Auth::user()->id;
        $price = $request['price'];
        $hotel_name = $request['hotel_name'];
        $hotel_rate = $request['hotel_rate'];
        $cover = fake()->imageUrl();
        $description = $request['description'];
        $is_active = 0;

        $tourcreate = Tour::create(compact(['tourname','destination','vehicle','period','agency_id','user_id','price','hotel_name','hotel_rate','cover','description','is_active']));
        $user = Auth::user();
        $userdb = User::findOrFail($user->id);
        $package = $user->package;
        $freepackage = $userdb->free_package;
        if ( $freepackage < 11 ) {
            $conv = $freepackage + 1;
            $userdb->update(['free_package' => $conv]);
        }else{
            $convp = $package + 1;
            $userdb->update(['package' => $convp]);
        }
        return to_route('manage');
    }

    public function edittour(Request $request,Tour $tour,$id)
    {
        $chk = Auth::user()->id;
        $usertour = Tour::findOrFail($id)->user_id;
        if($usertour == $chk) {
            $edittours = Tour::findOrFail($id);
            return view('Admin.EditTour', ['edittours' => $edittours]);
        }else{
            abort(403,'No Allow To Edit');
        }
    }

    public function saveedittour(Request $request,Tour $tour,$id)
    {
        $tourname = $request['tourname'];
        $destination = $request['destination'];
        $vehicle = $request['vehicle'];
        $period = $request['period'];
        $agency_id = $request['agency'];
        $price = $request['price'];
        $hotel_name = $request['hotel_name'];
        $hotel_rate = $request['hotel_rate'];
        $cover = fake()->imageUrl();
        $description = $request['description'];
        $is_active = 0;

        $saveedittours = Tour::findOrFail($id);
        $saveedittours->update(compact('tourname','destination','vehicle','period','agency_id','price','hotel_name','hotel_rate','cover','description','is_active'));
        return to_route('manage');
    }

    public function deletetour(Request $request,Tour $tour,$id)
    {
        $chk = Auth::user()->id;
        $usertour = Tour::findOrFail($id)->user_id;
        if ($usertour == $chk) {
            Tour::findOrFail($id)->delete();
            return to_route('manage');
        } else {
            abort(403, 'dont promise');
        }
    }

    public function deactivetour(Request $request,$id)
    {
        $check = Auth::user()->id;
        $usertour = Tour::findOrFail($id)->user_id;
        if($usertour == $check) {
        $detour = Tour::findOrFail($id);
        $detour->update(['is_active' => 0]);
        return to_route('manage');
        }else{
            abort('403' , 'You Cannot To Deactive');
        }
    }

    public function activetour(Request $request,$id)
    {
        $check = Auth::user()->id;
        $usertour = Tour::findOrFail($id)->user_id;
        if($usertour == $check) {
            $actour = Tour::findOrFail($id);
            $actour->update([
                'is_active' => 1
            ]);
            return to_route('manage');
        }else{
            abort('403' , 'You Cannot To Active');
        }
        /*$res = $this->auth($id);
        if ($res['result']){
            $this->test($id,$res['usertour']);
        }*/
    }

    /*public function test($id, $user , $funcName){
        $tour=Tour::findOrFail($id);
        if($funcName == 'delete'){
            $tour->delete();
        }elseif ($funcName == 'active'){
            $tour->update(['is_active' => 1]);
        }elseif ($funcName == 'deactive'){
            $tour->update(['is_active' => 0]);
        }
    }*/

    public function auth($id){
        $check = Auth::user()->id;
        $usertour = Tour::findOrFail($id)->user_id;
        if ($usertour == $check){
            return [
                "result" => true,
                "usertour" => $usertour
            ];
        }else{
            return [
              "result" => false
            ];
        }
    }

    public function sam(Request $request)
    {

//        dd($request->except('_token'));
        event(new \App\Events\CreateNewUser($request->input('email')));
        echo 'hi';
    }

    public function jsonTours()
    {
        return \App\Http\Resources\Tour::collection(Tour::paginate(5));
    }

    public function testApi()
    {
        return response()->json('saman');
    }

    public function tst2()
    {
        $sams = Http::get('https://jsonplaceholder.typicode.com/users');
        return $sams;
    }

}

