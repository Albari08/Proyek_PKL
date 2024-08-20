<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengajuan;

class PengajuanController extends Controller
{
    public function indexSpesifikasi()
    {
        return view('Formulir.spesifikasi');
    }

    public function indexPembelian()
    {
        return view('Formulir.pembelian');
    }

    public function saveSpesifikasi(Request $request){
        $user = Auth::user(); // Get the currently authenticated user

        $valueSurat = $request->noSurat;
        $valueSPPH = $request->spph;

        $formattedNoSurat = "{$valueSurat}/KONF/SPEC/VIII/2024";
        $formattedSPPH = "PT/C000/202408/{$valueSPPH}";

        // Now you can access user properties, for example:
        $spec= new Pengajuan;
        // $spec->noSurat = $request->noSurat;
        $spec->noSurat = $formattedNoSurat;
        $spec->noPR = $request->noPR;
        $spec->tanggal = $request->tanggal;
        // $spec->spph = $request->spph;
        $spec->spph = $formattedSPPH;
        $spec->namaBarang = $request->namaBarang;
        $spec->deliveryDate = $request->deliveryDate;
        $spec->catatan = $request->catatan;
        $spec->konfirmasi_id = 2;
        $spec->status_id = 1;
        $spec->user_id = $user->id;
        $spec->save();

        return redirect()->route('index.tabel');
        // dd($request->all());
    }

    public function savePembelian(Request $request){
        $user = Auth::user(); // Get the currently authenticated user

        $valueSurat = $request->noSurat;
        $valueSPPH = $request->spph;

        $formattedNoSurat = "{$valueSurat}/KONF/PEMB/VIII/2024";
        $formattedSPPH = "PT/C000/202408/{$valueSPPH}";


        // Now you can access user properties, for example:
        $pemb= new Pengajuan;
        $pemb->noSurat = $formattedNoSurat;
        $pemb->noPR = $request->noPR;
        $pemb->tanggal = $request->tanggal;
        $pemb->spph = $formattedSPPH;
        $pemb->namaBarang = $request->namaBarang;
        $pemb->deliveryDate = $request->deliveryDate;
        $pemb->catatan = $request->catatan;
        $pemb->hargaTotal = $request->hargaTotal;
        $pemb->hargaEstimasi = $request->hargaEstimasi;
        $pemb->konfirmasi_id = 1;
        $pemb->status_id = 1;
        $pemb->user_id = $user->id;
        $pemb->save();

        return redirect()->route('index.tabel');
        // dd($request->all());
    }

}
