<x-app-layout>
    <x-slot name="header">
        <nav aria-label="breadcrumb " style="margin-top: -60px">
            <ol class="breadcrumb ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
        </nav>
    </x-slot>

    <section class="section">
        <div class="row">
            <!--map-->
            <div class="col-md-8 col-12">
                <div class="card shadow-sm">
                    @include('layouts.maps.map-header')
                    @include('layouts.maps.map-body')
                </div>
            </div>

            <div class="col-md-4 col-12" id="list">
                <!-- List Object -->
                <div class="card shadow">
                    <div class="overflow-auto" id="panel">
                        <div class="card-header">
                            <h5 class="card-title text-center">
                                @foreach ($project as $item)
                                    {{ $item->name }}
                                @endforeach
                            </h5>
                        </div>
                        <div class="card-body">
                            <table class="table overflow-auto" width="100%">
                                <thead>
                                    <tr>
                                        <th>Access point</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    <?php $no = 1; ?>
                                    @foreach ($sondir as $item)
                                        <tr>
                                            <td>Sondir {{ $item->number }}</td>
                                            <td>
                                                <button title="info on map"
                                                    onclick="showInfoOnMap({{ $item }}, 'sondir')"
                                                    class="btn btn-primary btn-sm"><i class="fa fa-info fa-xs"></i>
                                                </button>
                                                <button title="route"
                                                    onclick="calcRoute({{ $item->lat }},{{ $item->lng }})"
                                                    class="btn btn-primary btn-sm"><i class="fa fa-road fa-xs"></i>
                                                </button>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr class="table-success">
                                        <td colspan="2" class="text-sm">
                                            RECOMMENDATION:
                                        </td>
                                    </tr>
                                    <tr class="table-success">
                                        <td colspan="2">
                                            <?php $result = ''; ?>
                                            @foreach ($sondir as $item)
                                                <?php
                                                if ($item->recommendation == 1) {
                                                    $result = '(Bor pile) Pondasi Dalam';
                                                    break;
                                                }
                                                if ($item->recommendation == 2) {
                                                    $result = '(Sumuran) Pondasi Dangkal';
                                                }
                                                ?>
                                            @endforeach
                                            <h3> {{ $result }}</h3>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Table Result-->
        <div class="row" id="row-sondir-table" style="display: none">
            <div class="col-md-8 col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="card-title text-center">
                            <span id="s-table-name"></span> Data
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table-sm table-bordered overflow-auto" width="100%" id="sondirTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">DEPTH</th>
                                        <th class="text-center">NK</th>
                                        <th class="text-center">HP</th>
                                        <th colspan="2" class="text-center">SELISIH</th>
                                        <th class="text-center">JHP</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">M</th>
                                        <th class="text-center">kg/cm2</th>
                                        <th class="text-center">kg/cm2</th>
                                        <th class="text-center">a</th>
                                        <th class="text-center">2a</th>
                                        <th class="text-center">kg/cm</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-sondir">

                                </tbody>
                                <tfoot id="tfoot-sondir">
                                    <tr>
                                        <td colspan="1">Keterangan</td>
                                        <td colspan="5">Agung</td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">Pelaksana</td>
                                        <td colspan="5">Agung</td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">Operator</td>
                                        <td colspan="5"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</x-app-layout>
