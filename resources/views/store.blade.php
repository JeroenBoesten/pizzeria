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
            <form method="POST" action="{{ route('store.updateOrder', ['store' => $storeName, 'orderId' => $order['id']]) }}">
                @csrf
                @method('PATCH')
                <select name="status" title="status">
                    <option value="received" @if($order['status'] === 'received') selected @endif>Bestelling ontvangen</option>
                    <option value="preparing" @if($order['status'] === 'preparing') selected @endif>Pizza voorbereid</option>
                    <option value="in_oven" @if($order['status'] === 'in_oven') selected @endif>In de oven</option>
                    <option value="in_delivery" @if($order['status'] === 'in_delivery') selected @endif>Bezorger onderweg</option>
                    <option value="delivered" @if($order['status'] === 'delivered') selected @endif>Afgeleverd</option>
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
