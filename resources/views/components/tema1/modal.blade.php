<div class="modal fade" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{$header}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{$slot}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light" id="loading">Save changes</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        $('#form').submit(function () {
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
@endpush
