@extends('layouts.backend')

@section('title', 'Dashboard')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-gradient-info"><i class="fas fa-gavel"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Regulasi</span>
                            <span class="info-box-number">{{ $regulationTotal }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-gradient-pink"><i class="fas fa-bullhorn"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Informasi Publik</span>
                            <span class="info-box-number">{{ $publicInformationTotal }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-gradient-lime text-white"><i class="fas fa-question"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">FAQ</span>
                            <span class="info-box-number">{{ $faqTotal }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Grafik Data Regulasi</h3>
                    {{-- <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div> --}}
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div id="regulation-chart"></div>
                    </div>
                </div>

            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Grafik Data Informasi Publik</h3>
                    {{-- <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div> --}}
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div id="public-information-chart"></div>
                    </div>
                </div>

            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Grafik Data Informasi Setiap Saat</h3>
                    {{-- <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div> --}}
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div id="anytime-information-chart"></div>
                    </div>
                </div>

            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Grafik Data Informasi Berkala</h3>
                    {{-- <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div> --}}
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div id="periodic-information-chart"></div>
                    </div>
                </div>

            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Grafik Data Informasi Serta Merta</h3>
                    {{-- <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div> --}}
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div id="immediately-information-chart"></div>
                    </div>
                </div>

            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Grafik Data Informasi Lainnya</h3>
                    {{-- <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div> --}}
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div id="other-information-chart"></div>
                    </div>
                </div>

            </div>
        </div>



    </section>
@endsection

@section('scripts')
    <!-- Highcharts -->
    <script src="{{ asset('highcharts/highcharts.js') }}"></script>
    <script src="{{ asset('highcharts/exporting.js') }}"></script>
    <script src="{{ asset('highcharts/export-data.js') }}"></script>
    <script src="{{ asset('highcharts/accessibility.js') }}"></script>
    <script src="{{ asset('highcharts/brand-dark.js') }}"></script>

    <script type="text/javascript">
        // Regulation Chart
        Highcharts.chart('regulation-chart', {
            chart: {
                type: 'bar'
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: [
                    @foreach ($regulationChart as $item)
                        '{{ $item->category }}',
                    @endforeach
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [
                {
                    name: 'Jumlah Regulasi',
                    data: [
                        @foreach ($regulationChart as $item)
                        {{ $item->regListTotal }},
                    @endforeach
                    ]
                }
            ]
        });

    </script>
    <script type="text/javascript">
        // Public Information Chart
        Highcharts.chart('public-information-chart', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 60
                }
            },
            title: {
                text: '',
                align: 'left'
            },
            subtitle: {
                text: '',
                align: 'left'
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45
                }
            },
            series: [{
                name: 'Medals',
                data: [
                    ['Informasi Setiap Saat ({{ $anytimeInformationListCount }})', {{ $anytimeInformationListCount }}],
                    ['Informasi Berkala ({{ $periodicInformationListCount }})', {{ $periodicInformationListCount }}],
                    ['Informasi Serta Merta ({{ $immediatelyInformationListCount }})', {{ $immediatelyInformationListCount }}],
                    ['Informasi Lainnya ({{ $otherInformationListCount }})', {{ $otherInformationListCount }}],

                ]
            }]
        });

    </script>

    <script type="text/javascript">
        // Anytime Information Chart
        Highcharts.chart('anytime-information-chart', {
            chart: {
                type: 'bar'
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: [
                    @foreach ($anytimeInformationChart as $item)
                        '{{ $item->category }}',
                    @endforeach
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [
                {
                    name: 'Jumlah Informasi',
                    data: [
                        @foreach ($anytimeInformationChart as $item)
                        {{ $item->informationListTotal }},
                    @endforeach
                    ]
                }
            ]
        });


    </script>

    <script type="text/javascript">
        // Periodic Information Chart
        Highcharts.chart('periodic-information-chart', {
            chart: {
                type: 'bar'
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: [
                    @foreach ($periodicInformationChart as $item)
                        '{{ $item->category }}',
                    @endforeach
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [
                {
                    name: 'Jumlah Informasi',
                    data: [
                        @foreach ($periodicInformationChart as $item)
                        {{ $item->informationListTotal }},
                    @endforeach
                    ]
                }
            ]
        });


    </script>

    <script type="text/javascript">
        // Immediately Information Chart
        Highcharts.chart('immediately-information-chart', {
            chart: {
                type: 'bar'
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: [
                    @foreach ($immediatelyInformationChart as $item)
                        '{{ $item->category }}',
                    @endforeach
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [
                {
                    name: 'Jumlah Informasi',
                    data: [
                        @foreach ($immediatelyInformationChart as $item)
                        {{ $item->informationListTotal }},
                    @endforeach
                    ]
                }
            ]
        });


    </script>

    <script type="text/javascript">
        // Other Information Chart
        Highcharts.chart('other-information-chart', {
            chart: {
                type: 'bar'
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: [
                    @foreach ($otherInformationChart as $item)
                        '{{ $item->category }}',
                    @endforeach
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [
                {
                    name: 'Jumlah Informasi',
                    data: [
                        @foreach ($otherInformationChart as $item)
                        {{ $item->informationListTotal }},
                    @endforeach
                    ]
                }
            ]
        });


    </script>
@endsection
