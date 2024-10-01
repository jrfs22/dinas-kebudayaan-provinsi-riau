@extends('layouting.auth.main')

@section('title', 'Visi & Misi')

@section('breadcrumb')
    <x-card.breadcrumb title="Home" subtitle="Visi & Misi" route="{{ route('visi-misi') }}" />
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-6 d-flex align-items-stretch">
            <div class="card card-body">
                <h4 class="card-title">Edit Visi & Misi</h4>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 d-flex align-items-stretch">
            <div class="card card-body">
                <h4 class="card-title">Visi & Misi</h4>
            </div>
        </div>
    </div>
@endsection
