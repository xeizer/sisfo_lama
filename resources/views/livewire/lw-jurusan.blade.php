<div>
    <form wire:submit.prevent="tambahJurusan" >
        <div class="form-group row">
            <div class="col">
                <input type="text" name="kode" wire:model.lazy="kode" id="kode" class="form-control @error('kode') form-control-danger @enderror" placeholder="Kode Jurusan" >
                @error('kode') <div class="col-form-label text-danger">{{$message}}</div>@enderror
                </small>
            </div>
            <div class="col">
                <input type="text" name="nama_jurusan" wire:model.lazy="nama_jurusan" class="form-control  @error('nama_jurusan') form-control-danger @enderror" placeholder="Nama Jurusan">
                @error('nama_jurusan') <div class="col-form-label text-danger">{{$message}}</div>@enderror
            </div>
            <div class="col">
                <button type="submit" id="tbl_simpan" class="btn btn-block btn-primary btn-sm">
                    <i wire:loading.class="fa fa-spinner fa-spin" aria-hidden="true"></i> Tambah
                </button>
            </div>
        </div>

    </form>

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
                    <div class="dropdown-primary dropdown open">
                    <button class="btn btn-mini btn-default dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Data</button>
                    <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                    <a class="dropdown-item waves-light waves-effect" href="#">Ubah</a>
                    <a class="dropdown-item waves-light waves-effect" href="#">Hapus</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@push('script')
<script>

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
</script>
@endpush
