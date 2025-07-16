<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Constancia de Registro</title>
    <link rel="icon" href="{{ asset('FiscaliaLogo.jpeg') }}" type="image/x-icon" />
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
            color: #333;
            background: #fff;
            margin: 40px;
        }

        .title {
            text-align: center;
            font-size: 22pt;
            font-weight: bold;
            color: #2d3748;
            margin-bottom: 20px;
        }

        .subtitle {
            text-align: center;
            font-size: 20pt;
            font-weight: bold;
            color: #313c4e;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 20px;
            line-height: 1.5;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        td:first-child {
            font-weight: bold;
            background-color: #f0f4f8;
            width: 30%;
        }

        .photos {
            margin-top: 40px;
            text-align: center;
        }

        .photos-title {
            font-size: 14pt;
            font-weight: bold;
            margin-bottom: 20px;
            color: #2c5282;
        }

        .photo-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

        .photo-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 400px;
            text-align: center;
        }

        .photo-item img {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
            border: 3px solid #cbd5e0;
            border-radius: 10px;
        }

        .photo-caption {
            margin-top: 10px;
            font-size: 11pt;
            color: #555;
            font-weight: bold;
        }

        .footer {
            margin-top: 30px;
            font-size: 10pt;
            color: #666;
        }
    </style>
</head>

<body>

    <div class="title">Constancia de Registro</div>
    <div class="subtitle">Curso en Materia de Violencia de Género</div>

    <p>Se hace constar que la persona con los siguientes datos ha completado su registro:</p>

    <table>
        <tr>
            <td>Nombre:</td>
            <td>{{ $registro->nombre }}</td>
        </tr>
        <tr>
            <td>Apellidos:</td>
            <td>{{ $registro->a_pat }} {{ $registro->a_mat }}</td>
        </tr>
        <tr>
            <td>Correo Electronico:</td>
            <td>{{ $registro->email }}</td>
        </tr>
        <tr>
            <td>Institución:</td>
            <td>{{ $registro->inst }}</td>
        </tr>
        <tr>
            <td>Cargo:</td>
            <td>{{ $registro->cargo }}</td>
        </tr>
        <tr>
            <td>Entidad Federativa:</td>
            <td>{{ $registro->e_fed }}</td>
        </tr>
        <tr>
            <td>Clave de Elector:</td>
            <td>{{ $registro->c_elec }}</td>
        </tr>
        <tr>
            <td>CURP:</td>
            <td>{{ $registro->c_curp }}</td>
        </tr>
        <tr>
            <td>Correo Complementario:</td>
            <td>{{ $registro->email_comp }}</td>
        </tr>
        <tr>
            <td>Teléfono:</td>
            <td>{{ $registro->tel }}</td>
        </tr>
        <tr>
            <td>Celular:</td>
            <td>{{ $registro->cel }}</td>
        </tr>
    </table>

    <div style="page-break-after: always;"></div>
    
    <!-- Bloque de fotos -->
    <div class="photos">
        <div class="photos-title">Documentos Adjuntos</div>
        <div class="photo-grid">
            @if ($registro->ine)
                <div class="photo-item">
                    <div class="photo-caption">INE</div>
                    <img src="{{ public_path('storage/' . $registro->ine) }}" alt="Foto INE">
                </div>
            @endif

            @if ($registro->curp)
                <div class="photo-item">
                    <div class="photo-caption">CURP</div>
                    <img src="{{ public_path('storage/' . $registro->curp) }}" alt="Foto CURP">
                </div>
            @endif

            @if ($registro->f_pasap)
                <div class="photo-item">
                    <div class="photo-caption">Pasaporte</div>
                    <img src="{{ public_path('storage/' . $registro->f_pasap) }}" alt="Foto Pasaporte">
                </div>
            @endif
        </div>
    </div>


    <div class="footer">
        Fecha de emisión: {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}
    </div>

</body>

</html>
