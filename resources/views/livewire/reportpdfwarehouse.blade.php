<!DOCTYPE html>
<html>
<head>
	<title>E - Inventory Report Warehouse</title>
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
		<h5>Warehouse Report Data</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
                <th>No</th>
                <th>Name Item</th>
                <th>Total</th>
                <th>Brand</th>
                <th>Item Condition</th>
                <th>Product Code</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($warehouses as $w)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $w->name }}</td>
                <td>{{ $w->total }}</td>
                <td>{{ $w->brand }}</td>
                <td>{{ $w->itemcondition }}</td>
                <td>{{ $w->productcode }}</td>
              </tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>