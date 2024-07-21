<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Pizza bestelling</title>
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
            margin-bottom: 300px;
        }

        th {
            text-align: left;
        }

        td {
            width: 300px;
            text-align: left;
            border: 1px solid #333;
        }

        .alert.alert-danger {
            color: red;
            font-style: italic;
        }
    </style>
</head>
<body>
<h1>1. Pizza keuze</h1>
<hr />
<form method="POST" action="{{ route('customer.placeOrder') }}">
    @csrf
    <div>
        <label for="store">Pizzeria: </label>
        <select name="store" id="store"><option value="dominos">Dominos</option><option value="new_york_pizza">New York Pizza</option></select>
        @error('store')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="base">Bodem: </label>
        <select name="base" id="base"><option value="classic">Classic</option><option value="cheesy_crust">Cheesy Crust</option></select>
        @error('base')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="topping">Topping: </label>
        <select name="topping" id="topping"><option value="hawaii">Hawaii</option><option value="hot_n_spicy">Hot & Spicy</option></select>
        @error('topping')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit">Plaats bestelling &raquo;</button>
</form>

<h1>2. Bestellingen</h1>
<hr />
<table>
    <thead>
    <tr>
        <th>Pizzeria</th>
        <th>Pizza</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
    <tr>
        <td>{{ $order['store_name'] }}</td>
        <td>{{ $order['pizza']['base'] }} / {{ $order['pizza']['topping'] }}</td>
        <td>-</td>
    </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
