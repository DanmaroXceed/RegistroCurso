<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registro Confirmación</title>
    <link rel="icon" href="{{ asset('FiscaliaLogo.jpeg') }}" type="image/x-icon" />
    <style>
        body { font-family: Arial, sans-serif; font-size: 12pt; }
        .title { text-align: center; font-size: 18pt; font-weight: bold; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        td { padding: 8px; border: 1px solid #ccc; }
    </style>
</head>
<body>
    <div class="title">Constancia de Registro</div>
    <p>Se hace constar que la persona con los siguientes datos ha completado su registro:</p>

    <table>
        <tr>
            <td><strong>Nombre:</strong></td>
            <td>{{ $registro->nombre }}</td>
        </tr>
        <tr>
            <td><strong>Apellidos:</strong></td>
            <td>{{ $registro->a_pat }} {{ $registro->a_mat }}</td>
        </tr>
        <tr>
            <td><strong>Correo Institucional:</strong></td>
            <td>{{ $registro->email }}</td>
        </tr>
        <tr>
            <td><strong>Institución:</strong></td>
            <td>{{ $registro->inst }}</td>
        </tr>
        <tr>
            <td><strong>Cargo:</strong></td>
            <td>{{ $registro->cargo }}</td>
        </tr>
        <tr>
            <td><strong>Entidad Federativa:</strong></td>
            <td>{{ $registro->e_fed }}</td>
        </tr>
        <tr>
            <td><strong>Clave de Elector:</strong></td>
            <td>{{ $registro->c_elec }}</td>
        </tr>
        <tr>
            <td><strong>CURP:</strong></td>
            <td>{{ $registro->c_curp }}</td>
        </tr>
        <tr>
            <td><strong>Correo Complementario:</strong></td>
            <td>{{ $registro->email_comp }}</td>
        </tr>
        <tr>
            <td><strong>Teléfono:</strong></td>
            <td>{{ $registro->tel }}</td>
        </tr>
        <tr>
            <td><strong>Celular:</strong></td>
            <td>{{ $registro->cel }}</td>
        </tr>
    </table>

    <p style="margin-top: 30px;">Fecha de emisión: {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}</p>
</body>
</html>
