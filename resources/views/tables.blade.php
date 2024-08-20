@extends('layouts.user_type.auth')

@section('content')

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <form method="get" action="/search">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
              <h6>Tabel PR</h6>
                <div class="input-group mb-2 w-10">
                  <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                  <input class="form-control" placeholder="Search" type="text" name="search" id="search" for="search">
                </div>
              </div>
            </form>
            {{-- <div class="card-header pb-0">
              <h6>Tabel PR</h6>
            </div> --}}
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. Surat</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">PP/PR</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Konfirmasi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    {{-- <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">1234/SPEK/ANG/VII/2024</h6>
                            <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">230000123</p>
                        <p class="text-xs text-secondary mb-0">Organization</p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Spesifikasi</span>
                      </td>
                       Warna Hijau
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Online</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Sent</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Yudistira Ibrahim</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">23/04/18 </span>
                      </td>
                      <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>
                      </td>
                    </tr> --}}
                    @forelse ($datas as $data)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $data->noSurat }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $data->noPR }}</p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $data->konfirmasi->konfirmasi }}</span>
                      </td>
                       {{-- Warna Hijau --}}
                      <td class="align-middle text-center text-sm">
                        @if ($data->status->status == 'Draft')
                        <span class="badge badge-sm bg-gradient-secondary">{{ $data->status->status }}</span>
                        @elseif ($data->status->status == 'Belum Dijawab')
                        <span class="badge badge-sm bg-gradient-info">{{ $data->status->status }}</span>
                        @elseif ($data->status->status == 'Draft Jawaban')
                        <span class="badge badge-sm bg-gradient-warning">{{ $data->status->status }}</span>
                        @elseif ($data->status->status == 'Sent')
                        <span class="badge badge-sm bg-gradient-success">{{ $data->status->status }}</span>
                    @endif
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $data->user->fname }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}</span>
                      </td>
                      <td class="align-middle">
                        <a href="tables-edit/{{ $data->id }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>
                      </td>
                    </tr>
                    @empty
                    <table>
                        <tr class="text-center bg-white">
                            <th
                                class="min-w-[1559px] border-l border-transparent py-4 px-3 text-lg font-medium text-black lg:py-7 lg:px-4">
                                Data Kosong
                            </th>
                        </tr>
                      @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{ $datas->appends(request()->except('page'))->links() }}
    </div>
  </main>
  
  @endsection
