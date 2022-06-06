<!DOCTYPE html>
<html>
<head>
	<title>E - Inventory Report Users</title>
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
		<h5>Users Report Data</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->address }}</td>
              </tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>