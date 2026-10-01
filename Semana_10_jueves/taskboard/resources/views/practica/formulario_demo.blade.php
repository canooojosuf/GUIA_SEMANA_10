<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Sandbox de formulario</title>
</head>

<body>
    <h1>Laboratorio de formularios</h1>

    <!--- <form action="#" method="GET">--->
    <form action="/practica/enviar" method="POST"> 
        @csrf
        <label for="cliente">Cliente</label>
        <input id="cliente" name="cliente_nombre" type="text"><br>

        <label for="monto">Monto</label>
        <input id="monto" name="monto" type="number" step="0.01"><br>

        <label for="correo">Correo</label>
        <input id="correo" name="correo" type="email"><br>

        <label for= "checkbox">¿Es una transacción recurrente?</label>
        <input id="checkbox" name="checkbox" type="checkbox" value="1"><br>

 
        <label for="estado">Estado</label>
        <select id="estado" name="estado">
            <option value="Iniciada">Iniciada</option>
            <option value="Completada">Completada</option>
        </select><br>

        <button type="submit">Enviar (modo prueba)</button>
    </form>
</body>

</html>