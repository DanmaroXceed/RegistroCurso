<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Registros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
        }
        th {
            background: #4f46e5;
            color: #fff;
            text-align: left;
            padding: 6px;
        }
        td {
            padding: 5px;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2>Reporte de Registros</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Nombre</th>
                <th>Institución</th>
                <th>Cargo</th>
                <th>Entidad Fed.</th>
                <th>Clave Elector</th>
                <th>Pasaporte</th>
                <th>CURP</th>
                <th>Correo Comp.</th>
                <th>Teléfono</th>
                <th>Extensión</th>
                <th>Celular</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datos as $registro)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $registro->email }}</td>
                <td>{{ $registro->a_pat }}</td>
                <td>{{ $registro->a_mat }}</td>
                <td>{{ $registro->nombre }}</td>
                <td>{{ $registro->inst }}</td>
                <td>{{ $registro->cargo }}</td>
                <td>{{ $registro->e_fed }}</td>
                <td>{{ $registro->c_elec }}</td>
                <td>{{ $registro->pasap }}</td>
                <td>{{ $registro->c_curp }}</td>
                <td>{{ $registro->email_comp }}</td>
                <td>{{ $registro->tel }}</td>
                <td>{{ $registro->ext }}</td>
                <td>{{ $registro->cel }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
