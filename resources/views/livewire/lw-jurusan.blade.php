<div>
    @if($updateMode)
    <div class="form-group row">
        <input type="hidden" name="id_tepilih" id="id_tepilih" wire:model="id_terpilih">
        <div class="col">
            <input type="text" id="kode" wire:model.lazy="kode" class="form-control @error('kode') form-control-danger @enderror" placeholder="Kode Jurusan" >
            @error('kode') <div class="col-form-label text-danger">{{$message}}</div>@enderror
            </small>
        </div>
        <div class="col">
            <input type="text" wire:model.lazy="nama_jurusan" class="form-control  @error('nama_jurusan') form-control-danger @enderror" placeholder="Nama Jurusan">
            @error('nama_jurusan') <div class="col-form-label text-danger">{{$message}}</div>@enderror
        </div>
        <div class="col">
            <select wire:model="kaprodi" class="form-control @error('kaprodi') is-invalid @enderror">
                <option value="">----Pilih Kaprodi----</option>
                @foreach (App\Guru::all() as $k)
                <option value="{{$k->user_id}}">{{$k->id}}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <button type="submit" id="tbl_simpan" class="btn btn-block btn-warning btn-sm" wire:click="updateJurusan">
                <i wire:target="updateJurusan" wire:loading.class="fa fa-spinner fa-spin" aria-hidden="true"></i> Simpan
            </button>

        </div>
        <div class="col-1">
            <button type="button" id="tbl_batal" wire:click="batal" class="btn btn-block btn-primary btn-sm loadingstart">
                <i wire:target="batal" wire:loading.class="fa fa-spinner fa-spin" aria-hidden="true"></i> Batal
            </button>
        </div>
    </div>
    @else
    <form wire:submit.prevent="tambahJurusan" >
        <div class="form-group row">
            <div class="col">
                <input type="text" id="kode" wire:model.lazy="kode" class="form-control @error('kode') form-control-danger @enderror" placeholder="Kode Jurusan" >
                @error('kode') <div class="col-form-label text-danger">{{$message}}</div>@enderror
                </small>
            </div>
            <div class="col">
                <input type="text" wire:model.lazy="nama_jurusan" class="form-control  @error('nama_jurusan') form-control-danger @enderror" placeholder="Nama Jurusan">
                @error('nama_jurusan') <div class="col-form-label text-danger">{{$message}}</div>@enderror
            </div>
            <div class="col">
                <select wire:model="kaprodi" class="form-control @error('kaprodi') is-invalid @enderror">
                    <option value="">----Pilih Kaprodi----</option>
                    @foreach (App\Guru::all() as $k)
                    <option value="{{$k->user_id}}">{{$k->id}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <button type="submit" id="tbl_simpan" class="btn btn-block btn-primary btn-sm">
                    <i wire:target="tambahJurusan" wire:loading.class="fa fa-spinner fa-spin" aria-hidden="true"></i> Tambah
                </button>
            </div>
        </div>

    </form>
    @endif


    <table class="table table-sm table-condensed table-hover" id="tableJurusan">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Jurusan</th>
                <th>Kaprodi</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jurusan as $j)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$j->kode}}</td>
                <td>{{$j->nama_jurusan}}</td>
                <td>{{$j->user_id}}</td>
                <td>
                    <button class="btn btn-warning btn-mini loadingstart" wire:click="editJurusan({{$j->id}})"><i class="fas fa-pencil-alt"></i>
                        <i wire:target="editJurusan" wire:loading.class="fa fa-spinner fa-spin" aria-hidden="true"></i>Ubah
                    </button>
                    <button class="btn btn-danger btn-mini loadingstart" wire:click="hapusJurusan({{$j->id}})" wire:model="hapusJurusan"><i class="fas fa-times"></i>
                        <i wire:target="hapusJurusan" wire:loading.class="fa fa-spinner fa-spin" aria-hidden="true"></i> Hapus
                    </button>
                </td>
                {{--}}
                <td>
                    <div class="dropdown-primary dropdown open">
                    <button class="btn btn-mini btn-default dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Data</button>
                    <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                    <a class="dropdown-item waves-light waves-effect" href="#">Ubah</a>
                    <a class="dropdown-item waves-light waves-effect" href="#">Hapus</a>
                    </div>
                </td>
                {{--}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@push('script')
<script>
        $('.loadingstart').click(function () {
            Swal.fire({
                title: 'Jangan Tutup Halaman Ini',
                allowEscapeKey: false,
                allowOutsideClick: false,
                onOpen: () => {
                swal.showLoading();
                }
            })
        })
    </script>
<script>
window.livewire.on('loadingend', data=>{

    $(document).ready(function () {
        Swal.close();
        });
    $('input').removeClass('form-control-danger');
    $('.text-danger').empty();
});
window.livewire.on('postAdded', data=>{

    $(document).ready(function () {
        Swal.close();
        Swal.fire(
            data['judul'],
            data['pesan'],
            'success'
            );
        new PNotify({
            title: data['judul'],
            text: data['pesan'],
            icon: "fa fa-4x fa-blink "+data['icon'],
            type: data['type']
        });
        });
});

window.livewire.on('postDelete', data=>{

    $(document).ready(function () {
        Swal.close();
        Swal.fire(
            data['judul'],
            data['pesan'],
            'success'
            );
        new PNotify({
            title: data['judul'],
            text: data['pesan'],
            icon: "fa fa-4x fa-blink "+data['icon'],
            type: data['type']
        });
        });
});
</script>
@endpush
