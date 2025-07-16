<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte de Registros</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <link rel="icon" href="{{ asset('FiscaliaLogo.jpeg') }}" type="image/x-icon" />
</head>

<body class="bg-gray-100 p-6">

    <h1 class="text-2xl font-bold mb-6 text-center text-indigo-700">Reporte de Registros</h1>

    <div id='tabla' class="overflow-x-auto shadow border border-gray-300 rounded-lg">
        <table class="min-w-full divide-y divide-gray-300 text-sm">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="px-4 py-2 text-left min-w-[40px]">#</th>
                    <th class="px-4 py-2 text-left min-w-[200px]">Email</th>
                    <th class="px-4 py-2 text-left min-w-[150px]">Apellido Paterno</th>
                    <th class="px-4 py-2 text-left min-w-[150px]">Apellido Materno</th>
                    <th class="px-4 py-2 text-left min-w-[150px]">Nombre</th>
                    <th class="px-4 py-2 text-left min-w-[180px]">Institución</th>
                    <th class="px-4 py-2 text-left min-w-[150px]">Cargo</th>
                    <th class="px-4 py-2 text-left min-w-[150px]">Entidad Federativa</th>
                    <th class="px-4 py-2 text-left min-w-[150px]">Clave Elector</th>
                    <th class="px-4 py-2 text-left min-w-[120px]">Pasaporte</th>
                    <th class="px-4 py-2 text-left min-w-[150px]">CURP</th>
                    <th class="px-4 py-2 text-left min-w-[200px]">Correo Complementario</th>
                    <th class="px-4 py-2 text-left min-w-[120px]">Teléfono</th>
                    <th class="px-4 py-2 text-left min-w-[100px]">Extensión</th>
                    <th class="px-4 py-2 text-left min-w-[120px]">Celular</th>
                    <th class="px-4 py-2 text-left min-w-[160px]">Comprobante</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($datos as $registro)
                    <tr>
                        <td class="px-4 py-2 whitespace-nowrap">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 whitespace-nowrap">{{ $registro->email ?? '' }}</td>
                        <td class="px-4 py-2 whitespace-nowrap">{{ $registro->a_pat ?? '' }}</td>
                        <td class="px-4 py-2 whitespace-nowrap">{{ $registro->a_mat ?? '' }}</td>
                        <td class="px-4 py-2 whitespace-nowrap">{{ $registro->nombre ?? '' }}</td>
                        <td class="px-4 py-2 whitespace-nowrap">{{ $registro->inst ?? '' }}</td>
                        <td class="px-4 py-2 whitespace-nowrap">{{ $registro->cargo ?? '' }}</td>
                        <td class="px-4 py-2 whitespace-nowrap">{{ $registro->e_fed ?? '' }}</td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <button type="button" class="btn btn-link p-0" data-bs-toggle="modal"
                                data-bs-target="#modalDocument" data-title="INE de {{ $registro->nombre }}"
                                data-img="{{ asset('storage/' . $registro->ine) }}">
                                {{ $registro->c_elec ?? '' }}
                            </button>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <button type="button" class="btn btn-link p-0" data-bs-toggle="modal"
                                data-bs-target="#modalDocument" data-title="Pasaporte de {{ $registro->nombre }}"
                                data-img="{{ asset('storage/' . $registro->f_pasap) }}">
                                {{ $registro->pasap ?? '' }}
                            </button>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <button type="button" class="btn btn-link p-0" data-bs-toggle="modal"
                                data-bs-target="#modalDocument" data-title="CURP de {{ $registro->nombre }}"
                                data-img="{{ asset('storage/' . $registro->curp) }}">
                                {{ $registro->c_curp ?? '' }}
                            </button>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">{{ $registro->email_comp ?? '' }}</td>
                        <td class="px-4 py-2 whitespace-nowrap">{{ $registro->tel ?? '' }}</td>
                        <td class="px-4 py-2 whitespace-nowrap">{{ $registro->ext ?? '' }}</td>
                        <td class="px-4 py-2 whitespace-nowrap">{{ $registro->cel ?? '' }}</td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            @if ($registro->comp)
                                <a href="{{ asset('storage/' . $registro->comp) }}" target="_blank"
                                    class="text-indigo-600 underline">
                                    Ver PDF
                                </a>
                            @else
                                Sin PDF
                            @endif
                        </td>
                    </tr>
                @endforeach
                <!-- Modal -->
                <div class="modal fade" id="modalDocument" tabindex="-1" aria-labelledby="modalDocumentLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="modalDocumentLabel">Comprobante</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Cerrar"></button>
                            </div>

                            <div class="modal-body text-center">
                                <img id="modalDocumentImg" src="" alt="Documento" class="img-fluid" />
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>

                        </div>
                    </div>
                </div>

            </tbody>
        </table>
    </div>

    {{-- <div class="flex justify-center mt-6">
        <a href="{{ route('exportar.pdf') }}" class="btn btn-primary">
            Descargar Tabla en PDF
        </a>
    </div> --}}

</body>

<script>
    const modalDocument = document.getElementById('modalDocument');
    modalDocument.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget;
        const title = button.getAttribute('data-title');
        const img = button.getAttribute('data-img');

        modalDocument.querySelector('.modal-title').textContent = title;
        modalDocument.querySelector('#modalDocumentImg').src = img;
        modalDocument.querySelector('#modalDocumentImg').alt = title;
    });
</script>

</html>
