<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de tu compra</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 14px;
            line-height: 1.4;
            color: #333333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Detalles de tu compra en Plar Hub:</h1>
        <p>¡Gracias por comprar en PLAR HUB!</p><br>

        <p>¡Estamos encantados de comunicarte que tu solicitud ha sido procesada por completo y pronto la recibirás! Tu pedido será entregado en los días hábiles de Lunes a Viernes. Todos los pedidos realizados durante el fin de semana se procesarán el día Lunes. Los siguientes productos han sido procesados y están en camino hacia ti:</p><br>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartContent as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->price }}€</td>
                    <td>{{ $item->subtotal }}€</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <p>Total de la compra con tasas incluidad: {{ Cart::total() }}€</p>
        <p>¡Gracias por elegir Plar Hub!</p>
        <img src="http://localhost/EntornoServidor/PlarHub/Pruebas_Laravel/public/storage/Logo.png" alt="Logo de Plar Hub">
    </div>
</body>

</html>