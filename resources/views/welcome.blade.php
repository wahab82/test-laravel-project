<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Laravel</title>

		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

		<!-- Styles -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	</head>
	<body>
		<div class="flex-center">
			<div class="content">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-8">

							@if(session('success'))
								<div class="alert alert-success">
									{{session('success')}}
								</div>
							@endif

							@if(session('error'))
								<div class="alert alert-danger">
									{{session('error')}}
								</div>
							@endif

							<div class="card">
								<h1 class="card-header">Products</h1>

								<div class="card-body">
									@if(count($products) > 0)
										<table class="table table-striped">
											<tr>
												<th>Name</th>
												<th>Image</th>
												<th>Action</th>
											</tr>
											@foreach($products as $product)
												<tr>
													<td>{{$product->name}}</td>
													<td><img src="https://dummyimage.com/300" width="50"></td>
													<td><a href="/orders/{{$product->id}}/order" class="btn btn-secondary">Order</a></td>
												</tr>
											@endforeach
										</table>
									@else
										<p>No Products added yet</p>    
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
