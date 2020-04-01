@extends('layouts.tema1.app')

@section('konten')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>Normal Sign In</h5>
            </div>
            <div class="card-block">
                @livewire('lw-jurusan')
            </div>
        </div>
    </div>

</div>

@endsection
