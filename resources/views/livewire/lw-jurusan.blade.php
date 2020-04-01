<div>
    <div>
        @if (session()->has('flash_notif'))





        @endif
    </div>
    <form wire:submit.prevent="tambahJurusan">

        <input type="text" name="kode" wire:model="kode" id="kode">
    <input type="text" name="nama-jurusan" wire:model="nama_jurusan">
    <input type="submit"  value="Tambah" id="nama">
    </form>

    <div wire:loading wire:target="tambahJurusan">
        Processing Payment...
    </div>

    <table class="table" id="tableJurusan">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Jurusan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jurusan as $j)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$j->kode}}</td>
                <td>{{$j->nama_jurusan}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@push('script')
<script>
window.livewire.on('postAdded', data=>{

    $(document).ready(function () {
            new PNotify({
                title: data['judul'],
                text: data['pesan'],
                icon: "fa fa-4x fa-blink "+data['icon'],
                type: data['type']
            });
        })
})
</script>
@endpush
