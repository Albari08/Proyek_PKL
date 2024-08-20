@extends('layouts.user_type.auth')


@section('content')
<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">{{ __('Spesifikasi') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">
                {{-- Jika user === Adm. Pengadaan --}}
                {{-- @if (Auth::check() && Auth::user()->role_id === 2)  
                    <form action="{{ route('admPengadaan', ['id' => $data->id]) }}" method="POST"> --}}

                {{-- Jika user === Planner --}}
                {{-- @elseif (Auth::check() && Auth::user()->role_id === 5) 
                    <form action="{{ route('planner', ['id' => $data->id]) }}" method="POST"> --}}

                {{-- Jika user === Adm. Perencanaan --}}
                {{-- @elseif (Auth::check() && Auth::user()->role_id === 4) 
                    <form action="{{ route('admPerencanaan', ['id' => $data->id]) }}" method="POST">
                @endif --}}

                <form action="/tables-edit/{{ $data->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    @if($errors->any())
                        <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                            <span class="alert-text text-white">
                            {{$errors->first()}}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                            <span class="alert-text text-white">
                            {{ session('success') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="untuk" class="form-control-label">{{ __('Untuk') }}</label>
                                <div class="@error('untuk')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ auth()->user()->name }}" type="text" placeholder="VP. Perencanaan, Penerimaan & Pergudangan" id="untuk" name="untuk" disabled>
                                        @error('untuk')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="noSurat" class="form-control-label">{{ __('Ref.No.') }}</label>
                                <div class="@error('noSurat')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ $data->noSurat }}" type="text" id="noSurat" name="noSurat" disabled> 
                                        @error('noSurat')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal" class="form-control-label">{{ __('Tanggal') }}</label>
                                <div class="@error('tanggal')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="date" id="number" name="tanggal" value="{{ \Carbon\Carbon::parse($data->tanggal)->format('Y-m-d') }}" disabled>
                                        @error('tanggal')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="spph" class="form-control-label">{{ __('SPPH') }}</label>
                                <div class="@error('spph') border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" id="spph" name="spph" value="{{ $data->spph }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="noPR" class="form-control-label">{{ __('PP/PR') }}</label>
                                <div class="@error('noPR')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ $data->noPR }}" type="text" id="noPR" name="noPR" disabled>
                                        @error('noPR')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="namaBarang" class="form-control-label">{{ __('Nama Barang') }}</label>
                                <div class="@error('namaBarang')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ $data->namaBarang }}" type="text" id="namaBarang" name="namaBarang" disabled> 
                                        @error('namaBarang')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hargaTotal" class="form-control-label">{{ __('A. Hasil total penawaran setelah negosiasi') }}</label>
                                <div class="@error('hargaTotal')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ $data->hargaTotal }}" type="text" id="hargaTotal" name="hargaTotal" disabled> 
                                        @error('hargaTotal')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hargaEstimasi" class="form-control-label">{{ __('B. OE/Harga estimasi') }}</label>
                                <div class="@error('hargaEstimasi')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ $data->hargaEstimasi }}" type="text" id="hargaEstimasi" name="hargaEstimasi" disabled> 
                                        @error('hargaEstimasi')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="deliveryDate" class="form-control-label">{{ __('Delivery Date') }}</label>
                                <div class="@error('deliveryDate')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ \Carbon\Carbon::parse($data->tanggal)->format('Y-m-d') }}" type="date" id="deliveryDate" name="deliveryDate" disabled>
                                        @error('deliveryDate')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="selisihHarga" class="form-control-label">{{ __('Selisih Harga ( A - B )') }}</label>
                                <div class="@error('selisihHarga')border border-danger rounded-3 @enderror">
                                    <h6>
                                        @php
                                            $A = $data->hargaTotal;
                                            $B = $data->hargaEstimasi;
                                            $sum = $A - $B;
                                            $percent = $sum / $B * 100;
                                            // Format the number with thousands separator and 2 decimal places
                                            $formattedSum = number_format($sum, 2, ',', '.');
                                            $formattedPercent = number_format($percent, 2);
                                        @endphp
                                        Rp. {{ $formattedSum }} &emsp; ({{ $formattedPercent }}%)
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="catatan">{{ 'Catatan' }}</label>
                            <div class="@error('catatan')border border-danger rounded-3 @enderror">
                                <textarea class="form-control" id="catatan" value="{{ $data->catatan }}" rows="3" name="catatan" disabled>{{ $data->catatan }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="jawaban">{{ 'Konfirmasi' }}</label>
                            <div class="@error('jawaban')border border-danger rounded-3 @enderror">
                                @if ((Auth::check() && Auth::user()->role_id === 5) && $data->status_id === 2)
                                <textarea class="form-control" id="jawaban" rows="3" placeholder="Konfirmasi" name="jawaban" required>{{ $data->jawaban }}</textarea>
                                 @else   
                                <textarea class="form-control" id="jawaban" rows="3" placeholder="Konfirmasi" name="jawaban" disabled>{{ $data->jawaban }}</textarea>
                                @endif
                            </div>
                        </div>
                         {{-- Jika user === Adm. Pengadaan --}}
                        @if ((Auth::check() && Auth::user()->role_id === 2) && $data->status_id === 1)
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Konfirmasi' }}</button>
                                </div>
                         {{-- Jika user === Planner --}}
                        @elseif ((Auth::check() && Auth::user()->role_id === 5) && $data->status_id === 2)
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Konfirmasi' }}</button>
                                </div>
                         {{-- Jika user === Adm. Perencanaan --}}
                        @elseif ((Auth::check() && Auth::user()->role_id === 4) && $data->status_id === 3)
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Konfirmasi' }}</button>
                                </div> 
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection