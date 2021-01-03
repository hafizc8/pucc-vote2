<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\VoteTransaction;
use App\Anggota;
use App\Paslon;
use App\Vote;
use App\Events\MessageSent;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
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
        return view('portal');
    }

    public function getMasukan()
    {
        return VoteTransaction::with('anggota')->get();
    }
    
    public function getCountAnggota()
    {
        return [
            'count_anggota' => Anggota::count(),
            'count_has_voted' => VoteTransaction::count()
        ];
    }

    public function vote()
    {
        return view('vote');
    }

    public function getDataPaslon()
    {
        return Paslon::all();
    }

    public function formVote($id)
    {
        return view('formvote', [
            'id' => $id
        ]);
    }

    public function sendVote(Request $request)
    {
        // insert vote transaction
        $vote = new VoteTransaction();
        $vote->username = auth()->user()->email;
        $vote->vote = $request->choosepaslon;
        $vote->masukan = $request->masukan;
        $vote->tgl_aksi = now();
        $vote->save();

        // update data vote
        $vt = Vote::where('no_paslon', $request->choosepaslon)
            ->update([
                'jumlah' => DB::raw('jumlah+1')
            ]);

        // broadcast ke client
		broadcast(new MessageSent($vote))->toOthers();

        // return ['status' => 'Success Vote!'];
    }

    public function checkVoted()
    {
        return (VoteTransaction::where('username', auth()->user()->email)->first()) ?? 0;
    }

    public function dataChart()
    {
        return Vote::with('paslon')->get();
    }
}
