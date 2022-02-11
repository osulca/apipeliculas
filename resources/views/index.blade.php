<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<p>
<table border="1">
    <thead>
    <tr>
        <th>Titulo</th>
        <th>Año</th>
        <th>Genero</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody id="iteracion">

    </tbody>
</table>
<br>
<button id="get">GET</button>
</p>

<p>
    <input type="text" id="titulo"><br>
    <input type="number" id="año"><br>
    <input type="text" id="genero"><br>
    <button id="post">POST</button>
</p>

<p>
    <button id="delete">DELETE</button>
</p>

<p>
    <button id="put">UPDATE</button>
</p>
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $("#get").click(function () {
            $.get('/peliculas', function (data) {
                data.forEach(function (item) {
                    var fila = $("<tr>" +
                        "          <td>" + item.titulo + "</td>" +
                        "          <td>" + item.año + "</td>" +
                        "          <td>" + item.genero + "</td>" +
                        "          <td><button onclick='borrar(" + item.id + ")'>Borrar</button></td>" +
                        "</tr>");
                    $("#iteracion").append(fila);
                });
            });
        });

        $("#post").click(function () {
            $.post("/peliculas",
                {
                    titulo: $("#titulo").val(),
                    año: $("#año").val(),
                    genero: $("#genero").val()
                },
                function (data, status) {
                    alert("Data: " + data + "\nStatus: " + status);
                });
        });

        $("#delete").click(function () {
            $.ajax({
                url: '/peliculas/5',
                type: 'DELETE',
                success: function (data, status) {
                    alert("Data: " + data + "\nStatus: " + status);
                }
            });
        });

        $("#put").click(function () {
            $.ajax({
                url: '/peliculas/1',
                type: 'put',
                data: {
                    titulo: $("#titulo").val(),
                    año: $("#año").val(),
                    genero: $("#genero").val()
                },
                success: function (data, status) {
                    alert("Data: " + data + "\nStatus: " + status);
                }
            });
        });
    });
</script>
</body>
</html>
