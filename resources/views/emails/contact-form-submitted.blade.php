<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submitted</title>
</head>
<body>
    <h2>Mensaje enviado desde el formulario de contacto:</h2>
    <p><strong>Nombre:</strong> {{ $name }}</p>
    <p><strong>Correo Electrónico:</strong> {{ $email }}</p>
    <p><strong>Mensaje:</strong> {{ $pregunta }}</p>
</body>
</html>
