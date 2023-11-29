@extends('partials.main')
@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $products }}</h3>

                            <p>Products</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('product') }}" class="small-box-footer">More Info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $category }}</h3>

                            <p>Category</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('category.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><sup style="font-size: 20px">$</sup>{{ $price }}</h3>

                            <p>Total Price</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cash-add"></i>
                        </div>
                        <a href="{{ route('product') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $stock }}</h3>

                            <p>Total Stock</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ route('product') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="card mx-1" style="width:49%; height:400px;">
                        <div id="container" style="width:100%; height:400px;"></div>
                    </div>
                    <div class="card mx-1" style="width:49%; height:400px;">
                        <div id="line" style="width:100%; height:400px;"></div>
                    </div>
                    <div class="card mx-1" style="width:100%; height:400px;">
                        <div id="pie" style="width:100%; height:400px;"></div>
                    </div>
                </div>

            </div>

            <ul id="product-list" style="display: none;">
                @foreach ($categories as $product)
                    <li data-product-name="{{ $product->name }}" data-product-count="{{ $product->products->count() }}">
                    </li>
                @endforeach
            </ul>
            <ul id="price-list" style="display: none;">
                @foreach ($categories as $p)
                    <li data-product-name="{{ $p->name }}"
                        data-product-sum="{{ $p->products->pluck('price')->sum() }}">
                    </li>
                @endforeach
            </ul>
            <ul id="stock-list" style="display: none;">
                @foreach ($categories as $s)
                    <li data-product-name="{{ $s->name }}"
                        data-product-stock="{{ $s->products->pluck('stock')->sum() }}">
                    </li>
                @endforeach
            </ul>


            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script>
        var productList = document.getElementById('product-list');
        var products = [];
        var priceList = document.getElementById('price-list');
        var prices = [];
        var stockList = document.getElementById('stock-list');
        var stocks = [];

        for (var i = 0; i < productList.children.length; i++) {
            var li = productList.children[i];
            products.push({
                name: li.getAttribute('data-product-name'),
                count: li.getAttribute('data-product-count'),
            });
        }
        for (var i = 0; i < priceList.children.length; i++) {
            var li = priceList.children[i];
            prices.push({
                name: li.getAttribute('data-product-name'),
                sum: li.getAttribute('data-product-sum'),
            });
        }
        for (var i = 0; i < stockList.children.length; i++) {
            var li = stockList.children[i];
            stocks.push({
                name: li.getAttribute('data-product-name'),
                stock: li.getAttribute('data-product-stock'),
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            Highcharts.chart('container', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: 'Total Product/Category'
                },
                plotOptions: {
                    series: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: [{
                            enabled: true,
                            distance: 20
                        }, {
                            enabled: true,
                            distance: -40,
                            format: '{point.percentage:.1f}%',
                            style: {
                                fontSize: '1.2em',
                                textOutline: 'none',
                                opacity: 0.7
                            },
                            filter: {
                                operator: '>',
                                property: 'Total',
                                value: 10
                            }
                        }]
                    }
                },
                series: [{
                    name: 'Total',
                    colorByPoint: true,
                    data: products.map(function(product) {
                        return {
                            name: product.name,
                            y: parseFloat(product.count),

                        };
                    })
                }]
            });
        });
        // Data retrieved from https://gs.statcounter.com/browser-market-share#monthly-202201-202201-bar

        // Create the chart
        document.addEventListener('DOMContentLoaded', function() {
            Highcharts.chart('line', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Total Price Product/Category',
                    align: 'left'
                },
                subtitle: {
                    text: 'Source: <a ' +
                        'href="https://en.wikipedia.org/wiki/List_of_continents_and_continental_subregions_by_population"' +
                        'target="_blank">Wikipedia.org</a>',
                    align: 'left'
                },
                xAxis: {
                    categories: ['Price'],
                    title: {
                        text: null
                    },
                    gridLineWidth: 1,
                    lineWidth: 0
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Price (dollars)',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    },
                    gridLineWidth: 0
                },
                tooltip: {
                    valueSuffix: ' dollars'
                },
                plotOptions: {
                    bar: {
                        borderRadius: '50%',
                        dataLabels: {
                            enabled: true
                        },
                        groupPadding: 0.1
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: 10,
                    y: 160,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                    shadow: true
                },
                credits: {
                    enabled: false
                },
                series: prices.map(function(price) {
                        return {
                            name: price.name,
                            data: [parseFloat(price.sum)],

                        };
                    })
            });
        })
        document.addEventListener('DOMContentLoaded', function() {
            Highcharts.chart('pie', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: 'Total Stock Product/Category'
                },
                plotOptions: {
                    series: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: [{
                            enabled: true,
                            distance: 20
                        }, {
                            enabled: true,
                            distance: -40,
                            format: '{point.percentage:.1f}%',
                            style: {
                                fontSize: '1.2em',
                                textOutline: 'none',
                                opacity: 0.7
                            },
                            filter: {
                                operator: '>',
                                property: 'Total',
                                value: 10
                            }
                        }]
                    }
                },
                series: [{
                    name: 'Total',
                    colorByPoint: true,
                    data: stocks.map(function(stock) {
                        return {
                            name: stock.name,
                            y: parseFloat(stock.stock),

                        };
                    })
                }]
            });
        })

    </script>
@endsection
