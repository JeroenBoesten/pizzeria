<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Pizzeria {{ $storeName }}</title>
    <style>
        html {
            padding: 1em;
            font-family: Arial, serif;
            color: #333;
        }

        h1 {
            margin-bottom: .1em;
        }

        table {
            border-collapse: collapse;
        }

        th {
            text-align: left;
        }

        td {
            width: 250px;
            text-align: left;
            border: 1px solid #333;
        }
    </style>
</head>
<body>
<h1>1. Bestellingen</h1>
<hr />
<table>
    <thead>
    <tr>
        <th>Bodem</th>
        <th>Topping</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
    <tr>
        <td>{{ $order['pizza']['base'] }}</td>
        <td>{{ $order['pizza']['topping'] }}</td>
        <td>
            <form>
                <select title="status">
                    <option>Bestelling ontvangen</option>
                    <option>Pizza voorbereid</option>
                    <option>In de oven</option>
                    <option>Bezorger onderweg</option>
                    <option>Afgeleverd</option>
                </select>
                <button type="submit">Wijzig status</button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
