<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
        <style>
        .btn-primary {
            background-color: #007bff;
            color: #fff;
            margin-bottom: 16px;
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .navbar {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            max-width: none;
            height: 72px;
        }

        .navbar-icon {
            height: 72px;
        }

        .navbar-menu{
            display: flex;
            flex-direction: row;
        }

        .navbar-menu-item{
            margin: 8px;
        }

        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid;
        }
        th, td, tr {
            text-align: center;

        }
    </style>
</head>
<body>
    <div class="navbar">
            <a href="/product">
                            <img class="navbar-icon" src="../logo_rigthttext.jpg" alt="" />
            </a>
            <div class="navbar-menu">
                <a class = "navbar-menu-item" href="/cart">Keranjang</a>
            </div>
        </div>
    <h1>Keranjang</h1>
    <table>
        <th>No.</th>
        <th>harga</th>
        <th>Nama Produk</th>
        <th>Delete Produk</th>

        @foreach ($products as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>

            </tr>
        @endforeach
    </table>

    <form action="{{ route('cart.checkout') }}" method="GET">
        @csrf
        <input class="btn-primary" type="submit" value="Checkout">
    </form>
</body>
</html>