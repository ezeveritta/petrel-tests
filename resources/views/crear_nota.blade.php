<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
</head>
<body>
    <form action="{{ route('generar.pdf.nota') }}" method="POST" enctype="multipart/form-data" class="container w-75 py-5">
        @csrf
        <h2 class="text-center">Crear nota</h2>
        <div class="alert alert-info" role="alert">
            Puedes editar el contenido y agregar entre otras cosas:
            <ul>
                <li>Sanciones disciplinarias</li>
                <li>Cambiar fecha</li>
                <li>Localidad</li>
            </ul>
        </div>
        <div id="contenido_editable" contenteditable="true" class="border rounded px-4 py-2 bg-light" onkeyup="obtenerContenido()">
            <!-- INFORMACIÓN -->
            <section style="text-align: justify">
                <p>
                    El Departamento de Alumnos del Centro Universitario Regional Zona Atlántica de la Universidad Nacional
                    del Comahue certifica que: <b>{{ $datos['Alumno']['Apellido'] }}, {{ $datos['Alumno']['Nombre'] }}</b> — 
                    {{ $datos['Documento']['Tipo'] }}: <b>{{ $datos['Documento']['Nro'] }}</b> Legajo Nro. <b>{{ $datos['Alumno']['Legajo'] }}</b>, 
                    estudiante de la carrera <b>{{ $datos['Carrera'] }}</b>, ha cursado y aprobado las asignaturas correspondientes al 
                    Plan de Estudios Ordenanza (CS) N.º <b>{{ $datos['Plan']['Nro'] }}/{{ $datos['Plan']['Anio'] }}</b>.
                </p>
                <p>
                    Se adjunta el Rendimiento Académico, el Plan de Estudios, y los programas de las asignaturas aprobadas con examen final 
                    o promoción, que son copia fiel de los originales que obran en dependencia del Centro Regional.
                </p>
                <p>
                    La escala de calificación que rige en esta Universidad según Reglamentación General de Administración Académica de carreras de Grado, 
                    Ordenanza (CS) N.º 273/18 es la siguiente:
                </p>
                <ul>
                    <li>
                        Sobresaliente: diez (10); Distinguido: nueve (9); Muy Bueno: ocho (8); Bueno siete (7); seis (6); Suficiente: cinco (5); cuatro (4); Insuficiente: tres (3); dos (2); uno (1).
                    </li>
                </ul>
                <p>
                    <?php $date = date('d-m-Y'); ?>
                    A pedido del/la estudiante, y para ser presentado ante las autoridades que lo requieran, se extiende 
                    el presente en la Ciudad de {{ $datos['Lugar'] }}, para <b>{{ $date }}</b>.-
                </p>
            </section>
        </div>

        <textarea name="contenido" id="contenido" class="d-none"></textarea>

        <div class="form-group border-top pt-1 mt-2">
            <label for="firma" class="h6">Agregar Firma</label>
            <input type="file" name="firma" id="firma" class="form-control">
        </div>

        <div class="form-group mt-2">
            <input type="submit" value="Generar PDF" class="form-control btn btn-primary" onsubmit="obtenerContenido()">
        </div>
    </form>

    <script>
        function obtenerContenido(){
            document.getElementById("contenido").value = document.getElementById("contenido_editable").innerHTML;
        }
    </script>
</body>
</html>