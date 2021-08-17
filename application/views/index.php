<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Assessment</title>
	<!-- CSS only -->
	<?php $this->load->view('base/header_includes'); ?>
	<?php $this->load->view('datatable/header'); ?>

</head>
<body>

	<div class="container mt-4">
		<h4>Assessment</h4>
		<p class="text-mute">Developer: AG Nieve</p>

		<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
			<li class="nav-item" role="presentation">
				<button class="nav-link active" id="pills-product-tab" data-bs-toggle="pill"
						data-bs-target="#pills-product" type="button" role="tab"
						aria-controls="pills-product" aria-selected="true">Products</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="pills-sales-tab" data-bs-toggle="pill"
						data-bs-target="#pills-sales" type="button" role="tab"
						aria-controls="pills-sales" aria-selected="false">Sales</button>
			</li>

			<li class="nav-item" role="presentation">
				<button class="nav-link" id="pills-report-tab" data-bs-toggle="pill"
						data-bs-target="#pills-report" type="button" role="tab"
						aria-controls="pills-report" aria-selected="false">Reports</button>
			</li>
		</ul>

		<div class="tab-content" id="pills-tabContent">
			<div class="tab-pane fade show active" id="pills-product" role="tabpanel" aria-labelledby="pills-product-tab">
				<form action="" class="mb-4" id="productForm">
					<input type="hidden" name="id" id="id">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<input type="text" name="product" id="product" class="form-control" placeholder="Product">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<input type="number" name="stock" id="stock" class="form-control" placeholder="Stock">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<input type="number" name="price" id="price" class="form-control" placeholder="Price"  min="1" step="1">
							</div>
						</div>
						<div class="col-md-3">
							<button class="btn btn-primary" type="submi">Save</button>
							<button class="btn btn-success" id="btn-refresh" type="button">Refresh</button>
						</div>
					</div>
				</form>

				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-borderless table-hover" id="productTable">
								<thead>
								<tr>
									<th>#</th>
									<th>Product</th>
									<th>Stocks</th>
									<th>Price</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="pills-sales" role="tabpanel" aria-labelledby="pills-sales-tab">

				<form action="" class="mb-4" id="salesForm">
					<input type="hidden" name="product_id" id="product_id">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<input type="text" name="s_product" id="s_product" class="form-control" placeholder="Product" readonly>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<input type="hidden" name="s_stock" id="s_stock">
								<input type="number" name="s_price" id="s_price" class="form-control" placeholder="Stock" readonly>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<input type="number" name="s_quantity" id="s_quantity" class="form-control" placeholder="Quantity">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<input type="number" name="s_amount" id="s_amount" class="form-control" placeholder="Amount"  min="1" step="1" readonly>
							</div>
						</div>
						<div class="col-md-3">
							<button class="btn btn-primary" type="submi">Save</button>
							<button class="btn btn-success" id="btn-refresh" type="button">Refresh</button>
						</div>
					</div>
				</form>
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-borderless table-hover" id="selectProductTable" width="100%">
							<thead>
							<tr>
								<th>#</th>
								<th>Product</th>
								<th>Stocks</th>
								<th>Price</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="pills-report" role="tabpanel" aria-labelledby="pills-report-tab">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-borderless table-hover" id="reportTable" width="100%">
							<thead>
							<tr>
								<th>#</th>
								<th>Product</th>
								<th>Current Price</th>
								<th>Stocks</th>
								<th>Total Sales</th>
<!--								<th>Action</th>-->
							</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- JavaScript Bundle with Popper -->
	<?php $this->load->view('base/footer_includes'); ?>
	<?php $this->load->view('datatable/footer'); ?>
	<script src="<?=base_url('support/scripts/base.js')?>"></script>
	<script src="<?=base_url('support/scripts/productTable.js')?>"></script>
	<script src="<?=base_url('support/scripts/selectProductTable.js')?>"></script>
	<script src="<?=base_url('support/scripts/product.js')?>"></script>

	<script src="<?=base_url('support/scripts/sale.js')?>"></script>
	<script src="<?=base_url('support/scripts/reportTable.js')?>"></script>
</body>
</html>
