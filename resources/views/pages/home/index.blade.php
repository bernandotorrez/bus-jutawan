@extends('layouts.main')

@section('title', 'Home')

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery-ui.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/animate/animate.css')}}">
<style>
    .custom {
        width: 65px !important;
        height: 65px !important;
        border-color: red !important;
        font-size: 20px !important;
        box-shadow: 5px 5px 5px #607690;
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

    .black-background {
        background-color: black !important;
    }

    .blockui-growl-message {
        display: none;
        text-align: left;
        padding: 15px;
        background-color: #455a64;
        color: #fff;
        border-radius: 3px;
    }
    .blockui-animation-container { display: none; }
    .multiMessageBlockUi {
        display: none;
        background-color: #455a64;
        color: #fff;
        border-radius: 3px;
        padding: 15px 15px 10px 15px;
    }
    .multiMessageBlockUi i { display: block }

    .img-button {
        margin: -0.5em !important;
    }

    .p0  {
        margin-left: 0em !important;
    }

    .p1  {
        margin-left: -3.2em !important;
    }

    .p2  {
        margin-left: -6.5em !important;
    }

    .mobile {
        margin-top: 0px;
    }

    @media screen and (max-width: 600px) {
        .img-button {
            width: 75px !important;
            height: auto !important;
            padding-left: 10px !important;
            margin-top: -6px !important;
            margin-left: -9px !important;
        }

        .p0  {
            margin-left: 0em !important;
        }

        .p1  {
            margin-left: -1.3em !important;
        }

        .p2  {
            margin-left: -2.6em !important;
        }

        .mobile {
            margin-top: 10em !important;
        }
    }

    @media screen and (min-width: 1920px) {
        .mobile {
            margin-top: 20em !important;
        }

        .img-button {
            width: 300px !important;
            height: auto !important;
            padding-left: 10px !important;
            margin-top: -6px !important;
            margin-left: -9px !important;
        }

        .p0  {
            margin-left: 0em !important;
        }

        .p1  {
            margin-left: -6.2em !important;
        }

        .p2  {
            margin-left: -12.5em !important;
        }

        .img-rp {
            width: 200% !important;
            max-width: 200% !important;
            height: auto !important;
            margin-left: -8em;
        }
    }

    @media screen and (min-width: 2500px) {
        .mobile {
            margin-top: 35em !important;
        }

        .img-button {
            width: 300px !important;
            height: auto !important;
            padding-left: 10px !important;
            margin-top: -6px !important;
            margin-left: -9px !important;
        }

        .p0  {
            margin-left: 0em !important;
        }

        .p1  {
            margin-left: -6.2em !important;
        }

        .p2  {
            margin-left: -12.8em !important;
        }
    }

    @media screen and (min-width: 2560px) {
        .mobile {
            margin-top: 50em !important;
        }

        .img-button {
            width: 325px !important;
            height: auto !important;
            padding-left: 10px !important;
            margin-top: -6px !important;
            margin-left: -9px !important;
        }

        .p0  {
            margin-left: 0em !important;
        }

        .p1  {
            margin-left: -6.8em !important;
        }

        .p2  {
            margin-left: -13.6em !important;
        }


    }
</style>
@endpush

@section('content')
<div class="text-center someElement">
    <div class="mobile"></div>
    @php $no = 1; @endphp
    @php $noChunk = 0; @endphp
    @foreach($rewardsAndPunishments as $chunk)
    <p class="p{{$noChunk}}">
        @foreach($chunk as $data)
        @if(array_key_exists('id_reward', $data))
            <img class="img-fluid img-button parallelogram" width="150px" height="100px"
                src="{{ asset('assets/button/active/'.$no.'.png') }}" onclick="showRewardOrPunishment(this)"
                onmouseover="changeToGray(this)" onmouseout="changeToActive(this)" data-id="{{ $data['uuid_reward'] }}"
                data-category='reward' data-clicked="0" data-image-active="{{ asset('assets/button/active/'.$no.'.png') }}"
                data-image-gray="{{ asset('assets/button/gray/'.$no.'.png') }}"
                data-reward-punishment="{{ asset($data['image_reward']) }}"
                />
        @else
            <img class="img img-fluid img-button parallelogram" width="150px" height="100px"
                src="{{ asset('assets/button/active/'.$no.'.png') }}" onclick="showRewardOrPunishment(this)"
                onmouseover="changeToGray(this)" onmouseout="changeToActive(this)" data-id="{{ $data['uuid_punishment'] }}"
                data-category='punishment' data-clicked="0"
                data-image-active="{{ asset('assets/button/active/'.$no.'.png') }}"
                data-image-gray="{{ asset('assets/button/gray/'.$no.'.png') }}"
                data-reward-punishment="{{ asset($data['image_punishment']) }}"
                />
        @endif
        @php $no++; @endphp
        @endforeach

    </p>
    @php $noChunk++; @endphp
    @endforeach

    {{-- Modal --}}
    @foreach($rewardsAndPunishments as $chunk)
        @foreach($chunk as $data)
            @if(array_key_exists('id_reward', $data))
            <div class="modal black-background black-modal" id="rewardOrPunishmentModal-{{ $data['uuid_reward'] }}" tabindex="-1" role="dialog"
                aria-labelledby="rewardOrPunishmentModalLabel" aria-modal="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <p>
                                <h1 class="title">
                                    <img class="img img-fluid img-rp" src="{{ asset($data['image_reward']) }}"/>
                                </h1>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="modal black-background black-modal" id="rewardOrPunishmentModal-{{ $data['uuid_punishment'] }}" tabindex="-1" role="dialog"
                aria-labelledby="rewardOrPunishmentModalLabel" aria-modal="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <p>
                                <h1 class="title">
                                    <img class="img img-fluid img-rp" src="{{ asset($data['image_punishment']) }}"/>
                                </h1>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    @endforeach

</div>

@endsection

@push('scripts')
<script src="{{ asset('assets/js/jquery-ui-1.12.1.js') }}"></script>
<script src="{{ asset('assets/js/shim.js')}}"></script>
<script src="{{ asset('plugins/blockui/jquery.blockUI.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script>

    function changeToGray(el) {
        var grayImage = el.getAttribute('data-image-gray');
        var clicked = el.getAttribute('data-clicked');

        if(clicked == '0') {
            el.setAttribute('src', grayImage)
        }
    }

    function changeToActive(el) {
        var activeImage = el.getAttribute('data-image-active');
        var clicked = el.getAttribute('data-clicked');

        if(clicked == '0') {
            el.setAttribute('src', activeImage)
        }
    }

    function showRewardOrPunishment(el) {
        // el.disabled = true
        var clicked = el.getAttribute('data-clicked');

        if(clicked == '0') {
            changeToGray(el)
            el.setAttribute('data-clicked', '1');
        } else {
            getRewardOrPunishment(el);
        }

    }

    function getRewardOrPunishment(el) {
        var urlReward = "{{ route('home.reward') }}"
        var urlPunishment = "{{ route('home.punishment') }}"
        var id = el.getAttribute('data-id');
        var category = el.getAttribute('data-category');
        var image = el.getAttribute('data-reward-punishment');

        //$('#image_reward_punishment').attr('src', image)
        $('#rewardOrPunishmentModal-'+id).modal('show');
    }

    function openURL(el) {
        var urlReward = "{{ route('home.reward') }}"
        var urlPunishment = "{{ route('home.punishment') }}"
        var id = el.getAttribute('data-id');
        var category = el.getAttribute('data-category');
        var url = (category == 'reward') ? urlReward : urlPunishment;

        window.open(url+'/'+id, '_blank');
    }
</script>
@endpush
