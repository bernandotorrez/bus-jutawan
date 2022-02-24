@extends('layouts.main')

@section('title', $category)

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery-ui.css')}}">
<link href="{{ asset('assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/components/cards/card.css') }}" rel="stylesheet" type="text/css" />
<style>
    .custom {
        width: 65px !important;
        height: 65px !important;
        border-color: red !important;
        font-size: 20px !important;
    }

    .parallelogram {
        transform: skew(-15deg);
    }

    .btn-secondary:hover {
        background: gray;
    }

    .trapezoid {
        border-bottom: 50px !important;
        border-left: 25px !important;
        border-right: 25px !important;
    }

    .purple {
        background-color: purple;
        width: 100%;
    }

    .red {
        background-color: red;
        width: 100%;
    }
</style>
@endpush

@section('content')
<div class="row layout-top-spacing">

    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
        <div class="widget-content-area br-4">

            <h6 class="text-center">{{ $category }}</h6>

            <div class="col-2 layout-spacing">

            </div>

            <div class="card component-card_7 {{ $color }} justify-align-center vertical-align-center">
                <div class="card-body">
                    <br>
                    @if(isset($data->id_reward))
                        <h5 class="card-text text-center"> {{ $data->reward }} </h5>
                    @else
                        <h5 class="card-text text-center"> {{ $data->punishment }} </h5>
                    @endif

                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')
<script src="{{ asset('assets/js/jquery-ui-1.12.1.js') }}"></script>
<script src="{{ asset('assets/js/shim.js')}}"></script>
@endpush
