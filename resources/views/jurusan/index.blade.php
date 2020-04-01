@extends('layouts.tema1.app')

@section('konten')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Data Jurusan</h5>
            </div>
            <div class="card-block">
                @livewire('lw-jurusan')
            </div>
        </div>
    </div>

</div>

@endsection
