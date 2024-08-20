@extends('layouts.user_type.auth')


@section('content')
<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">{{ __('Spesifikasi') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="{{ route('buat_pembelian') }}" method="POST" role="form text-left">
                    @csrf
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
                                    <input class="form-control" value="{{ auth()->user()->noSurat }}" type="text" placeholder="No surat" id="noSurat" name="noSurat" required> 
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
                                    <input class="form-control" type="date" placeholder="40770888444" id="number" name="tanggal" value="{{ auth()->user()->tanggal }}" required>
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
                                    <input class="form-control" type="text" placeholder="SPPH" id="spph" name="spph" value="{{ auth()->user()->spph }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="noPR" class="form-control-label">{{ __('PP/PR') }}</label>
                                <div class="@error('noPR')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ auth()->user()->noPR }}" type="text" placeholder="PP/PR" id="noPR" name="noPR" required>
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
                                    <input class="form-control" value="{{ auth()->user()->namaBarang }}" type="text" placeholder="Nama Barang" id="namaBarang" name="namaBarang" required> 
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
                                    <input class="form-control" value="{{ auth()->user()->hargaTotal }}" type="text" placeholder="Masukkan dalam ribuan rupiah" id="hargaTotal" name="hargaTotal" required> 
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
                                    <input class="form-control" value="{{ auth()->user()->hargaEstimasi }}" type="text" placeholder="Masukkan dalam ribuan rupiah" id="hargaEstimasi" name="hargaEstimasi" required> 
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
                                    <input class="form-control" value="{{ auth()->user()->name }}" type="date" placeholder="Delivery Date" id="deliveryDate" name="deliveryDate" required>
                                        @error('deliveryDate')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="catatan">{{ 'Catatan' }}</label>
                            <div class="@error('catatan')border border-danger rounded-3 @enderror">
                                <textarea class="form-control" id="catatan" rows="3" placeholder="Catatan" name="catatan" required>{{ auth()->user()->catatan }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="jawaban">{{ 'Konfirmasi' }}</label>
                            <div class="@error('jawaban')border border-danger rounded-3 @enderror">
                                <textarea class="form-control" id="jawaban" rows="3" placeholder="Konfirmasi" name="jawaban" disabled>{{ auth()->user()->jawaban }}</textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save as Draft' }}</button>
                        </div>
                    </div>
                </form>
                <div class="d-flex justify-content-end">
                    <a>*Mohon Cek Ulang Sebelum Dijadikan Draft!</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection