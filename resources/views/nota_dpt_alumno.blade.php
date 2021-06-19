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
        <img src="https://www.uncoma.edu.ar/wp-content/uploads/2018/04/LOGOUNC-e1522858761795.png" alt="UNCOMA" />
        <h2 class="tc ml-1">
            Universidad Nacional del Comahue <br>
            Centro Universitario Regional Zona Atlántica <br>
            Departamento de Alumnos
        </h2>
    </header>

    <hr>

    {!! $datos['contenido'] !!}
    
    <!-- FIRMA -->
    <section>
        <img src="{{ public_path('images/'.$datos['firma']) }}" alt="firma">
    </section>
    
    <!-- FOOTER -->
    <section>
        <p>
        </p>
    </section>
    

    <style>
        body > * { width: 80%; margin-left: 10%; }
        header img { float: left; width: 120px; height: 120px; }
        .b { border: 1px solid black; }
        .bb { border-bottom: 1px solid gray; }
        .tc { text-align: center; }
        .ml-1 { margin-left: 20px; }
        img { width: 210px; float: right; margin-top: 15px; }
    </style>
</body>
</html>