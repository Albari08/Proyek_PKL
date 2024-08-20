<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\DB;

class KonfirmasiController extends Controller
{
    public function view(Request $request, $id){
        $data = Pengajuan::findOrFail($id);

        if ($data->konfirmasi_id == '1') {
            return view('Hasil Formulir.view-pembelian', compact('data')); // Redirect to Page A
        } elseif ($data->konfirmasi_id == '2') {
            return view('Hasil Formulir.view-spesifikasi', compact('data')); // Redirect to Page B
        }
        // dd($data);
        // return view('Hasil Formulir.view-spesifikasi', compact('data'));
    }

    public function updateStatus(Request $request, $id){
        // Retrieve the user input for 'jawaban'
        $jawabanInput = $request->input('jawaban');

        // Update the status_id conditionally
        $pengajuan = Pengajuan::where('id', $id)
            ->where(function($query) {
                $query->where('status_id', '1')
                      ->orWhere('status_id', '2')
                      ->orWhere('status_id', '3');
            })
            ->first();

        if ($pengajuan) {
            // Update status_id
            $pengajuan->update(['status_id' => DB::raw('status_id + 1')]);

            // If the user's role_id is 5, update the 'jawaban' column
            if (Auth::user()->role_id === 5) {
                $pengajuan->update(['jawaban' => $jawabanInput]);
            }
        }

        // dd($data);
        return redirect()->route('index.tabel');
    }
}
