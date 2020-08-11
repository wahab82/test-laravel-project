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
							<h1>Ordering {{$product->name}}</h1>

							@if(count($errors) > 0)
								@foreach($errors->all() as $error)
									<div class="alert alert-danger">
										{{$error}}
									</div>
								@endforeach
							@endif

							{!! Form::open(['action' => ['OrdersController@storeOrder'], 'method' => 'POST']) !!}
								<div class="form-group">
									{{Form::label('quantity', 'Quantitiy of product')}}
									{{Form::number('quantity', '', ['class' => 'form-control', 'placeholder' => 'Quantitiy of product'])}}
								</div>
								<div class="form-group">
									{{Form::label('email', 'Email')}}
									{{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email'])}}
								</div>
								<div class="form-group">
									{{Form::label('shipping_address_1', 'Shipping Address 1')}}
									{{Form::text('shipping_address_1', '', ['class' => 'form-control', 'placeholder' => 'Shipping Address 1'])}}
								</div>
								<div class="form-group">
									{{Form::label('shipping_address_2', 'Shipping Address 2')}}
									{{Form::text('shipping_address_2', '', ['class' => 'form-control', 'placeholder' => 'Shipping Address 2'])}}
								</div>
								<div class="form-group">
									{{Form::label('shipping_address_3', 'Shipping Address 2')}}
									{{Form::text('shipping_address_3', '', ['class' => 'form-control', 'placeholder' => 'Shipping Address 3'])}}
								</div>
								<div class="form-group">
									{{Form::label('city', 'City')}}
									{{Form::text('city', '', ['class' => 'form-control', 'placeholder' => 'City'])}}
								</div>
								<div class="form-group">
									{{Form::label('country_code', 'Country Code')}}
									{{Form::text('country_code', '', ['class' => 'form-control', 'placeholder' => 'Country Code'])}}
								</div>
								<div class="form-group">
									{{Form::label('zip_postal_code', 'Zip/Postal Code')}}
									{{Form::text('zip_postal_code', '', ['class' => 'form-control', 'placeholder' => 'Zip/Postal Code'])}}
								</div>
								{{Form::hidden('product_id', $product->id)}}
								{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>