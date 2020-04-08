<script type="text/javascript" src="{{ asset('mega-able/files/bower_components/jquery/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('mega-able/files/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('mega-able/files/bower_components/popper.js/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('mega-able/files/bower_components/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('mega-able/files/assets/pages/widget/excanvas.js') }}"></script>

<script src="{{ asset('mega-able/files/assets/pages/waves/js/waves.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('mega-able/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>

<script type="text/javascript" src="{{ asset('mega-able/files/bower_components/modernizr/js/modernizr.js') }}"></script>

<script type="text/javascript" src="{{ asset('mega-able/files/assets/js/SmoothScroll.js') }}"></script>
<script src="{{ asset('mega-able/files/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('mega-able/files/bower_components/pnotify/js/pnotify.js')}}"></script>
<script type="text/javascript" src="{{ asset('mega-able/files/bower_components/pnotify/js/pnotify.desktop.js') }}"></script>
<script type="text/javascript" src="{{ asset('mega-able/files/bower_components/pnotify/js/pnotify.buttons.js') }}"></script>
<script type="text/javascript" src="{{ asset('mega-able/files/bower_components/pnotify/js/pnotify.confirm.js') }}"></script>
<script type="text/javascript" src="{{ asset('mega-able/files/bower_components/pnotify/js/pnotify.callbacks.js') }}"></script>
<script type="text/javascript" src="{{ asset('mega-able/files/bower_components/pnotify/js/pnotify.animate.js') }}"></script>
<script type="text/javascript" src="{{ asset('mega-able/files/bower_components/pnotify/js/pnotify.history.js') }}"></script>
<script type="text/javascript" src="{{ asset('mega-able/files/bower_components/pnotify/js/pnotify.mobile.js') }}"></script>
<script type="text/javascript" src="{{ asset('mega-able/files/bower_components/pnotify/js/pnotify.nonblock.js') }}"></script>
{{--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
{{--}}
<script type="text/javascript" src="{{ asset('mega-able/files/assets/pages/google-maps/gmaps.js') }}"></script>

<script src="{{ asset('mega-able/files/assets/js/pcoded.min.js') }}"></script>
<script src="{{ asset('mega-able/files/assets/js/vertical/vertical-layout.min.js') }}"></script>
{{--datatables--}}
<script src="{{ asset('mega-able/files/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('mega-able/files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('mega-able/files/assets/pages/data-table/js/jszip.min.js') }}"></script>
<script src="{{ asset('mega-able/files/assets/pages/data-table/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('mega-able/files/assets/pages/data-table/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('mega-able/files/assets/pages/data-table/extensions/buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('mega-able/files/assets/pages/data-table/extensions/buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('mega-able/files/assets/pages/data-table/extensions/buttons/js/jszip.min.js') }}"></script>
<script src="{{ asset('mega-able/files/assets/pages/data-table/extensions/buttons/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('mega-able/files/assets/pages/data-table/extensions/buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('mega-able/files/bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('mega-able/files/bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('mega-able/files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('mega-able/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('mega-able/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

{{--<script src="{{ asset('mega-able/files/assets/pages/data-table/extensions/buttons/js/extension-btns-custom.js') }}"></script>--}}
{{----}}
<script type="text/javascript" src="{{ asset('mega-able/files/assets/js/script.js') }}"></script>

    @if ($errors->any())

        @foreach ($errors->all() as $error)
        <script>
            $(document).ready(function () {
            new PNotify({
                title: 'Gagal',
                text: '{{$error}}',
                icon: 'fa fa-exclamation-triangle fa-4x fa-blink',
                type: 'error'
            });
        })
        </script>
        @endforeach

    @endif

    @if(session()->has('flash_notif'))
    <script>
        $(document).ready(function () {
            new PNotify({
                title: "{{session()->get('flash_notif.judul')}}",
                text: "{{session()->get('flash_notif.pesan')}}",
                icon: "fa {{session()->get('flash_notif.icon')}} fa-4x fa-blink",
                type: "{{session()->get('flash_notif.type')}}"
            });
        })
    </script>
    @endif

@livewireScripts
@stack('script')

