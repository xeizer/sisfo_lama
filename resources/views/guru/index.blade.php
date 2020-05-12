@extends('layouts.tema1.app')
@section('konten')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Semua Guru</h5>
            </div>
            <div class="card-block">
                <p>
                    <div class="table-responsive">
                    <table id="basic-btn" class="table table-striped table-inverse ">
                        <thead class="thead-inverse">
                            <tr>
                                <th>NIP</th>
                                <th>NUPTK</th>
                                <th>Nama</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    </div>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                Body
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                Body
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        $('#basic-btn').DataTable({
        "language":{
		    "sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
		    "sProcessing":   "<i class='fa fa-spinner fa-spin'></i> Memproses ...",
		    "sLengthMenu":   "Tampilkan _MENU_ entri",
		    "sZeroRecords":  "Tidak ditemukan data yang sesuai",
		    "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
		    "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
		    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
		    "sInfoPostFix":  "",
		    "sSearch":       "Cari:",
		    "sUrl":          "",
		    "oPaginate": {
		        "sFirst":    "Pertama",
		        "sPrevious": "Sebelumnya",
		        "sNext":     "Selanjutnya",
		        "sLast":     "Terakhir"
		    }
        },
        //responsive: true,
		processing: true,
        serverside: true,
		ajax: "{{ route('api.guru') }}",
		columns: [
			{data: "nip"},
            {data: "nuptk"},
            {data: "user.name"},
            {data: "aksi"},
        ],
        dom: 'Bfrtip',
        buttons: [{
            text: 'Import',
            action: function (e, dt, node, config) {
                $('#importModal').modal('show');
            }
        },{
            text: 'Tambah Guru',
            action: function (e, dt, node, config) {
                $('#tambahModal').modal('show');
            }
        },{
            extend: 'excel', text:'<i data-toggle="tooltip" data-placement="top" title="Ekspor data Ke Excel" class="far fa-file-excel" aria-hidden="true"></i>',
            exportOptions: {columns: [ 0, 1]}
        },{
            extend: 'pdf', text:'<i data-toggle="tooltip" data-placement="top" title="Ekspor data Ke PDF" class="far fa-file-pdf" aria-hidden="true"></i>',
            exportOptions: {columns: [ 0, 1]}
        },{
            extend: 'print', text:'<i data-toggle="tooltip" data-placement="top" title="Cetak" class="fa fa-print" aria-hidden="true"></i>',
            exportOptions: {columns: [ 0, 1]}
        },]
    });
    </script>
@endpush
@endsection
