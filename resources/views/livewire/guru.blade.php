<div>
<p>
    </p>
    <p>
        <div class="table-responsive">
        <table id="basic-btn" class="table table-striped table-inverse">
            <thead class="thead-inverse">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Data</th>
                </tr>
                </thead>
                @foreach ($data as $d)
                <tr>
                    <td>{{$d->name}}</td>
                </tr>
                @endforeach
                <tbody>
                </tbody>
        </table>
        </div>
    </p>

    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Guru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light" id="loading">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="POST" enctype="multipart/form-data" id="form">
        <div class="modal fade" id="importModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Import Data Guru</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                          <label for="import">File Import Data Guru</label>
                          <input type="file" name="file" id="file" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-muted">Data excel</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light" id="loading">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

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
        dom: 'Bfrtip',
        buttons: [{
            text: 'Import',
            action: function (e, dt, node, config) {
                $('#importModal').modal('show');
            }
        }, {
            text: 'Tambah Guru',
            action: function (e, dt, node, config) {
                $('#tambahModal').modal('show');
            }
        }, {
            extend: 'excel',
            text: '<i data-toggle="tooltip" data-placement="top" title="Ekspor data Ke Excel" class="far fa-file-excel" aria-hidden="true"></i>',
            exportOptions: {
                columns: [0, 1]
            }
        }, {
            extend: 'pdf',
            text: '<i data-toggle="tooltip" data-placement="top" title="Ekspor data Ke PDF" class="far fa-file-pdf" aria-hidden="true"></i>',
            exportOptions: {
                columns: [0, 1]
            }
        }, {
            extend: 'print',
            text: '<i data-toggle="tooltip" data-placement="top" title="Cetak" class="fa fa-print" aria-hidden="true"></i>',
            exportOptions: {
                columns: [0, 1]
            }
        }, ]
    });
</script>
@endpush
