<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!-- HEADER -->
    <header>
        <img src="https://www.uncoma.edu.ar/wp-content/uploads/2018/04/LOGOUNC-e1522858761795.png" alt="UNCOMA"
            style="float: left; width: 120px; height: 120px" />
        <h2 style="text-align: center; margin-left: 20px">
            Universidad Nacional del Comahue
            <br>
            Centro Universitario Regional Zona Atlántica
            <br>
            Departamento de Alumnos
        </h2>
    </header>

    <hr>

    <!-- INFORMACIÓN -->
    <section style="text-align: justify">
        <p>
            El Departamento de Alumnos del Centro Universitario Regional Zona Atlántica de la Universidad Nacional
            del Comahue certifica que: <b>{{ $datos['Alumno']['Apellido'] }}, {{ $datos['Alumno']['Nombre'] }}</b> — 
            {{ $datos['Documento']['Tipo'] }}: <b>{{ $datos['Documento']['Nro'] }}</b> Legajo Nro: <b>{{ $datos['Alumno']['Legajo'] }}</b>, 
            estudiante de la carrera <b>{{ $datos['Carrera'] }}</b>, ha cursado y aprobado las asignaturas correspondientes al 
            Plan de Estudios Ordenanza (CS) N.° <b>{{ $datos['Plan']['Nro'] }}/{{ $datos['Plan']['Anio'] }}</b>.
        </p>
        <p>
            Se adjunta el Rendimiento Académico, el Plan de Estudios, y los programas de las asignaturas aprobadas con examen final 
            o promoción, que son copia fiel de los originales que obran en dependencia del Centro Regional.
        </p>
        <p>
            La escala de calificación que rige en esta Universidad según Reglamentación General de Administración Académica de carreras de Grado, 
            Ordenanza (CS) N° 273/18 es la siguiente:
        </p>
        <ul>
            <li>
                Sobresaliente: diez (10); Distinguido: nueve (9); Muy Bueno: ocho (8); Bueno siete (7); seis (6); Suficiente: cinco (5); cuatro (4); Insuficiente: tres (3); dos (2); uno (1).
            </li>
        </ul>
        <p>
            Se deja constancia que la estudiante no registra sanción disciplinaria.
        </p>
        <p>
            <?php $date = date('d-m-Y'); ?>
            A pedido del/la estudiante, y para ser presentado ante las autoridades que lo requieran, se extiende 
            el presente en la Ciudad de {{ $datos['Lugar'] }}, para <b>{{ $date }}</b>.-
        </p>
    </section>
    
    <!-- FIRMA -->
    <section>
        <p class="tj">
            firma
        </p>
    </section>
    
    <!-- FOOTER -->
    <section>
        <p>
        </p>
    </section>
    

    <style>
        body > * {
            width: 80%;
            margin-left: 10%;
        }
        .b { border: 1px solid black; }
        .bb { border-bottom: 1px solid gray; }
        .tc { text-align: center; }
        .tl { text-align: left; }
        .tr { text-align: right; }
        .tj { text-align: justify; }
    </style>
</body>
</html>