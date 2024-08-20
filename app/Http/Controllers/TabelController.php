<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\Konfirmasi;
// use App\Http\Controllers\DB;
use Illuminate\Support\Facades\DB;

class TabelController extends Controller
{
    public function index()
    {
        $datas = Pengajuan::orderBy(DB::raw("STR_TO_DATE(tanggal, '%Y-%m-%d')"), 'desc')->paginate(10)->withQueryString();
        return view('tables', ['datas' => $datas]);
        // return dd($datas);
    }

    public function search(Request $request){
        $search = $request->input('search');

        $datas = Pengajuan::where(function($query) use ($search){

            $query->where('noSurat', 'like', "%$search%")
            ->orWhere('noPR', 'like', "%$search%")
            ->orWhere('tanggal', 'like', "%$search%");
            })

            ->orWhereHas('user', function($query) use ($search) {
            $query->where('fname', 'like', "%$search%"); // Searching 'fname' in related 'users' table
            })

            ->orWhereHas('konfirmasi', function($query) use ($search) {
                $query->where('konfirmasi', 'like', "%$search%"); // Searching 'fname' in related 'users' table
                })

            ->orWhereHas('status', function($query) use ($search) {
                $query->where('status', 'like', "%$search%"); // Searching 'fname' in related 'users' table
                })
            ->paginate(10);

        // $datas = Pengajuan::where('noSurat', 'like', "%{$search}%")
        //         ->orWhere('noPR', 'like', "%{$search}%")
        //         ->orWhere('fname', 'like', "%{$search}%")
        //         ->orWhere('tanggal', 'like', "%{$search}%")
        //         ->orWhere('fname', 'AND', 'lname', 'like', "%{$search}%")
        //         ->get();

            return view('tables', compact('search', 'datas'));
        }
}
