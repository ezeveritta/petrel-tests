<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- PRESENTACIÓN -->
    <section>
        <h2 class="bb tc">RENDIMIENTO ACADÉMICO</h2>
        <p class="tj">
            Certifico que {{ $data['Alumno']['Apellido'] }}, {{ $data['Alumno']['Nombre'] }}
            - {{ $data['Documento']['Tipo'] }}: {{ $data['Documento']['Nro'] }} Legajo Nro: {{ $data['Alumno']['Legajo'] }} que cursa sus estudios en la
            carrera {{ $data['Carrera'] }} Plan: {{ $data['Plan']['Nro'] }}/{{ $data['Plan']['Anio'] }} ha cursado y aprobado las siguientes asignaturas:
        </p>
    </section>

    <!-- INFORMACIÓN -->
    <table class="bb">
        <tr class="b">
            <th>Materia</th>
            <th>Fecha</th>
            <th>Calificación</th>
            <th>L/R/E/P</th>
            <th>Libro - Folio</th>
        </tr>

        <tr><th class="tl" style="text-indent: 26px">{{ $data['Materias'][0]['Anio'] }}</th></tr>

        @foreach($data['Materias'] as $mat)
        <tr>
            <td>{{ $mat['Materia'] }}</td>
            <td class="tc">{{ $mat['Fecha'] }}</td>
            <td class="tc">{{ $mat['Nota'] }}</td>
            <td class="tc">{{ $mat['CondicionAprobacion'] }}</td>
            <td></td>
        </tr>
        @endforeach
    </table>
    
    <!-- FINAL -->
    <section>
        <p class="tj">
            Promedio general de las materias aprobadas: {{ $data['Promedio'] }}
            <br>
            Se extiende este certificado para su presentación ante las autoridades que corresponda, 
            en {{ $data['Lugar'] }} el {{ date('d-m-Y') }}.
            <br>
            Fecha de ingreso a la carrera: {{ $data['FechaIngresoCarrera'] }}
        </p>
    </section>
    

    <style>
        table { width: 100%; border-collapse: collapse; }
        .b { border: 1px solid black; }
        .bb { border-bottom: 1px solid gray; }
        .tc { text-align: center; }
        .tl { text-align: left; }
        .tr { text-align: right; }
        .tj { text-align: justify; }
    </style>
</body>
</html>