<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Resumen de Resultados</title>
    <link rel="icon" href="{{ asset('FiscaliaLogo.jpeg') }}" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

    <script>
        window.addEventListener('load', function() {
            const card1 = document.querySelector('#p1Chart').closest('.card');
            const card2 = document.querySelector('#p2Chart').closest('.card');
            const card6 = document.querySelector('#p6Chart').closest('.card');

            // Obtener la altura de la primera card
            const altura = card1.offsetHeight;

            // Aplicar la misma altura a la segunda card
            card2.style.height = altura + 'px';
            card6.style.height = altura + 'px';
        });

        // Opcional: si quieres que se ajuste al redimensionar la ventana
        window.addEventListener('resize', function() {
            const card1 = document.querySelector('#p1Chart').closest('.card');
            const card2 = document.querySelector('#p2Chart').closest('.card');
            const card6 = document.querySelector('#p6Chart').closest('.card');
            const altura = card1.offsetHeight;
            card2.style.height = altura + 'px';
            card6.style.height = altura + 'px';
        });
    </script>

    <style>
        .chart-container {
            width: 100%;
            height: 100%;
            /* ocupa toda la altura del card */
            position: relative;
            /* recomendado para Chart.js */
        }

        .chart-container canvas {
            width: 100% !important;
            height: 100% !important;
        }
    </style>
</head>

<body class="bg-light p-4">

    <div class="container">
        <h2 class="text-center mb-4">Resumen de Resultados</h2>

        <div class="row">
            <!-- P1 -->
            <div class="col-md-6 mb-4">
                <div class="card p-3 shadow-sm">
                    <h5>1. Nivel de satisfacción</h5>
                    <canvas id="p1Chart"></canvas>
                </div>
            </div>

            <!-- P2 -->
            <div class="col-md-6 mb-4 d-flex">
                <div class="card p-3 shadow-sm">
                    <h5>2. ¿Cree que la duración del curso fue lo suficientemente adecuada para satisfacer sus
                        expectativas de formación?</h5>
                    <div class="chart-container">
                        <canvas id="p2Chart"></canvas>
                    </div>
                </div>
            </div>

            <!-- P3 -->
            <div class="col-md-6 mb-4">
                <div class="card p-3 shadow-sm">
                    <h5>3. ¿Cómo calificaría la formación impartida por las instructoras?</h5>
                    <canvas id="p3Chart"></canvas>
                </div>
            </div>

            <!-- P6 -->
            <div class="col-md-6 mb-4 d-flex">
                <div class="card p-3 shadow-sm">
                    <h5>6. ¿La formación impartida le ha resultado útil para el desarrollo de su trabajo diario?</h5>
                    <div class="chart-container">
                        <canvas id="p6Chart"></canvas>
                    </div>
                </div>
            </div>

            <!-- P4 -->
            <div class="col-md-12 mb-4">
                <div class="card p-3 shadow-sm">
                    <h5>4. ¿Las instructoras han proporcionado ejemplos y contextualizado la formación?</h5>
                    <ul class="list-group">
                        @foreach ($p4_counts as $op => $count)
                            <li class="list-group-item d-flex justify-content-between">
                                <span>{{ $op }}</span>
                                <span class="badge bg-primary">{{ $count }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- P5 -->
            <div class="col-md-6 mb-4">
                <div class="card p-3 shadow-sm">
                    <h5>5. ¿Cual ha sido la actividad que más le ha aportado en la formación?</h5>
                    <ul class="list-group">
                        @foreach ($p5_respuestas as $resp)
                            <li class="list-group-item">{{ $resp }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- P7 -->
            <div class="col-md-6 mb-4">
                <div class="card p-3 shadow-sm">
                    <h5>7. Sugerencias de mejora para el curso:</h5>
                    <ul class="list-group">
                        @foreach ($p7_respuestas as $resp)
                            <li class="list-group-item">{{ $resp }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        // P1 Pastel
        new Chart(document.getElementById('p1Chart'), {
            type: 'pie',
            data: {
                labels: {!! json_encode(array_keys($p1_counts)) !!},
                datasets: [{
                    data: {!! json_encode(array_values($p1_counts)) !!},
                    backgroundColor: ['#28a745', '#17a2b8', '#ffc107', '#6c757d', '#dc3545']
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            generateLabels: function(chart) {
                                const original = Chart.overrides[chart.config.type].plugins.legend.labels
                                    .generateLabels;
                                const labels = original(chart);
                                return labels.filter((item, i) => chart.data.datasets[0].data[i] > 0);
                            }
                        }
                    },
                    datalabels: {
                        color: '#fff',
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        formatter: (value) => value > 0 ? value : ''
                    },
                },
            },
            plugins: [ChartDataLabels]
        });

        // P2 barras
        new Chart(document.getElementById('p2Chart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_keys($p2_counts)) !!},
                datasets: [{
                    data: {!! json_encode(array_values($p2_counts)) !!},
                    backgroundColor: ['#28a745', '#dc3545']
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                    datalabels: {
                        anchor: 'center',
                        align: 'center',
                        color: '#fff',
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        formatter: (value) => value
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                },
                maintainAspectRatio: false,
            },
            plugins: [ChartDataLabels]
        });

        // P3 pastel
        new Chart(document.getElementById('p3Chart'), {
            type: 'pie',
            data: {
                labels: {!! json_encode(array_keys($p3_counts)) !!},
                datasets: [{
                    data: {!! json_encode(array_values($p3_counts)) !!},
                    backgroundColor: ['#28a745', '#17a2b8', '#ffc107', '#6c757d', '#dc3545']
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            generateLabels: function(chart) {
                                const original = Chart.overrides[chart.config.type].plugins.legend.labels
                                    .generateLabels;
                                const labels = original(chart);
                                return labels.filter((item, i) => chart.data.datasets[0].data[i] > 0);
                            }
                        }
                    },
                    datalabels: {
                        color: '#fff',
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        formatter: (value) => value > 0 ? value : ''
                    }
                }
            },
            plugins: [ChartDataLabels]
        });

        // P6 barras
        new Chart(document.getElementById('p6Chart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_keys($p6_counts)) !!},
                datasets: [{
                    data: {!! json_encode(array_values($p6_counts)) !!},
                    backgroundColor: ['#28a745', '#dc3545']
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                    datalabels: {
                        anchor: 'center',
                        align: 'center',
                        color: '#fff',
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        formatter: (value) => value
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                },
                maintainAspectRatio: false,
            },
            plugins: [ChartDataLabels]
        });
    </script>

</body>

</html>
