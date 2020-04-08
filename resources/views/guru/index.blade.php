@extends('layouts.tema1.app')
@section('konten')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Semua Guru</h5>
            </div>
            <div class="card-block">
                @livewire('guru');
            </div>
        </div>
    </div>

</div>
@endsection
