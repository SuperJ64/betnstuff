<?php

namespace App\Http\Controllers;

use App\Pool;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Log;

class HomeController extends Controller
{

    private function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) return $min; // not so random...
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd > $range);
        return $min + $rnd;
    }

    private function getToken($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[$this->crypto_rand_secure(0, $max-1)];
        }

        return $token;
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playing = Auth::user()->playing()->get();

        return view('home', ['games'=>$playing]);
    }

    public function admin() {
        $admin = Auth::user()->running()->get();

        return view('admin', ['games'=>$admin]);
    }

    public function create(Request $request) {

        //rule 1st>2nd>3rd
        $w1 = $request->wfirst;
        $w2 = $request->wsecond;
        $w3 = $request->wthird;
        $carry = $request->season;

        $s1 = $request->sfirst;
        $s2 = $request->ssecond;
        $s3 = $request->sthird;

        if ($w1 < $w2 or $w2 < $w3) {
            return back()->withErrors(['week_breakdown'=>'first place must pay out more than second which pays out more than third']);
        }

        if ($s1 < $s2 or $s2 < $s3) {
            return back()->withErrors(['season_breakdown'=>'first place must pay out more than second which pays out more than third']);
        }

        //rule total for weekly and season payouts must equal 100%
        if ($w1 + $w2 + $w3 + $carry != 100) {
            return back()->withErrors(['week_total'=>'payouts for first, second, third and carryover must equal 100%']);
        }

        if ($s1 + $s2 + $s3 != 100) {
            return back()->withErrors(['season_total'=>'payouts for first, second, and third must equal 100%']);
        }

        //rule if carry == 0 then season gives no payouts
        if ($carry == 0) {
            $s1 = 0;
            $s2 = 0;
            $s3 = 0;
        }

        $code = null;
        $private = false;

        if ($request->private == 'on') {
            $code = $this->getToken(5);
            $private = true;
        }

        $pool = new Pool();
        $pool->user_id = Auth::user()->id;
        $pool->name = $request->name;
        $pool->week_first = $w1;
        $pool->week_second = $w2;
        $pool->week_third = $w3;
        $pool->extra = $carry;
        $pool->season_first = $s1;
        $pool->season_second = $s2;
        $pool->season_third = $s3;
        $pool->type = $request->type;
        $pool->entry = $request->entry;
        $pool->private = $private;
        $pool->code = $code;
        $pool->save();


       return redirect()->route('admin');
    }
}
