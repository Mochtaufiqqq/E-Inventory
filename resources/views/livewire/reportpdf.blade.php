<!DOCTYPE html>
<html>
<head>
	<title>E - Inventory Report Goods</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Goods Report Data</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
                <th scope="col">No</th>
                <th scope="col">Item Name</th>
                <th scope="col">Stock</th>
                <th scope="col">Brand</th>
                <th scope="col">Product Code</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($goods as $g)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $g->name }}</td>
                <td>{{ $g->stock }}</td>
                <td>{{ $g->brand }}</td>
                <td>{{ $g->productcode }}</td>
              </tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>