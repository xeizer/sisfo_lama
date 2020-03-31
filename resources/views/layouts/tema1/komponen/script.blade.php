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


<script type="text/javascript" src="{{ asset('mega-able/files/assets/pages/google-maps/gmaps.js') }}"></script>

<script src="{{ asset('mega-able/files/assets/js/pcoded.min.js') }}"></script>
<script src="{{ asset('mega-able/files/assets/js/vertical/vertical-layout.min.js') }}"></script>

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

