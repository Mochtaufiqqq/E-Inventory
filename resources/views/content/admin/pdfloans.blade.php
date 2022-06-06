<!DOCTYPE html>
<html>
<head>
	<title>E - Inventory Report Loans</title>
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
		<h5>Loans Reports Data</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
                <th scope="col">No</th>
                <th scope="col">Loans Code</th>
                <th scope="col">User Name</th>
                <th scope="col">Item Name</th>
                <th scope="col">Addres</th>
                <th scope="col">Purpose</th>
                <th scope="col">Loan Date</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($loans as $l)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $l->loans_code }}</td>
                <td>{{ $l->user->name }}</td>
                <td>{{ $l->goods->name }}</td>
                <td>{{ $l->user->address }}</td>
                <td>{{ $l->purpose }}</td>
                <td>{{ $l->created_at }}</td>
                <td>
                    @if($l->acceptance_status === 1)
                    <h5><span class="badge bg-opacity-25 bg-success text-success">Borrowing</span>
                    </h5>
                    @elseif($l->acceptance_status === 0)
                    <h5><span class="badge bg-opacity-25 bg-danger text-danger">Rejected</span></h5>
                    @elseif($l->acceptance_status === 2)
                    <h5><span class="badge bg-opacity-25 bg-success text-success">Returned</span>
                    </h5>
                    @else
                    <h5><span class="badge bg-opacity-100 bg-warning text-white">Waiting</span></h5>
                    @endif
                </td>
              </tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>