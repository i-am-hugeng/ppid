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
                            <span class="info-box-number">1,410</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-gradient-pink"><i class="fas fa-bullhorn"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Informasi Publik</span>
                            <span class="info-box-number">1,410</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-gradient-lime text-white"><i class="fas fa-question"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">FAQ</span>
                            <span class="info-box-number">1,410</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Title</h3>
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
                        <div id="container"></div>
                    </div>
                </div>

                <div class="card-footer">
                    Footer
                </div>

            </div>
        </div>



    </section>
@endsection

@section('scripts')
    <!-- Highcharts -->
    <script src="{{ asset('highcharts/highcharts.js') }}"></script>
    {{-- <script src="{{ asset('highcharts/exporting.js') }}"></script>
    <script src="{{ asset('highcharts/export-data.js') }}"></script>
    <script src="{{ asset('highcharts/accessibility.js') }}"></script> --}}
    <script src="{{ asset('highcharts/brand-dark.js') }}"></script>

    <script type="text/javascript">
        // Data retrieved from https://netmarketshare.com/
        // Make monochrome colors
        const colors = Highcharts.getOptions().colors.map((c, i) =>
            // Start out with a darkened base color (negative brighten), and end
            // up with a much brighter color
            Highcharts.color(Highcharts.getOptions().colors[0])
            .brighten((i - 3) / 7)
            .get()
        );

        // Build the chart
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Browser market shares in February, 2022',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    colors,
                    borderRadius: 5,
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                        distance: -50,
                        filter: {
                            property: 'percentage',
                            operator: '>',
                            value: 4
                        }
                    }
                }
            },
            series: [{
                name: 'Share',
                data: [{
                        name: 'Chrome',
                        y: 74.03
                    },
                    {
                        name: 'Edge',
                        y: 12.66
                    },
                    {
                        name: 'Firefox',
                        y: 4.96
                    },
                    {
                        name: 'Safari',
                        y: 2.49
                    },
                    {
                        name: 'Internet Explorer',
                        y: 2.31
                    },
                    {
                        name: 'Other',
                        y: 3.398
                    }
                ]
            }]
        });
    </script>
@endsection
