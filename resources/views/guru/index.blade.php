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
                    <x-tema1.modal header="Hola" class="btn btn-primary"/>
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
                            <tbody>
                            </tbody>
                    </table>
                    </div>
                </p>
            </div>
        </div>
    </div>

</div>
@endsection
