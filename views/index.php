<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Box Content</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container-xl"><br>
		<div class="table">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-8">
							<h2>Products <b>Box Content</b></h2>
						</div>
						<div class="col-sm-4">
							<a href="#addProductModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Add New Product</span></a>
						</div>
					</div>
				</div>
				<table id= 'table_content' class="table table-hover" style="display:none;"><br>
					<thead>
						<tr>
							<th>Id</th>
							<th>Category</th>
							<th>Name</th>
							<th>Reference</th>
							<th>Stock</th>
							<th>Price</th>
							<th>Weight</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody id='content_products'>
					</tbody>
				</table>
				<div id = 'msg' style="display:none;"></div>
			</div>
		</div>        
	</div>

	<!-- New Modal HTML -->
	<div id="addProductModal" class="modal fade" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Add Product</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">					
						<select id="categories_new" class="form-select form-select-sm">
							<option selected>Select category</option>
						</select>
						<div class="form-group">
							<label>Name</label>
							<input id="new_name"type="text" class="form-control" required="">
						</div>
						<div class="form-group">
							<label>Reference</label>
							<input id="new_reference"type="etxt" class="form-control" required="">
						</div>
						<div class="form-group">
							<label>Stock</label>
							<input id="new_stock"type="text" class="form-control" required="">
						</div>
						<div class="form-group">
							<label>Price</label>
							<input id="new_price"type="text" class="form-control" required="">
						</div>					
						<div class="form-group">
							<label>Weight</label>
							<input id="new_weight"type="text" class="form-control" required="">
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input id="new_product" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Edit Product</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">					
						<select id="categories_edit" class="form-select form-select-sm">
							<option selected>Select category</option>
						</select>
						<div class="form-group">
							<label>Name</label>
							<input id="edit_name"type="text" class="form-control" required="">
						</div>
						<div class="form-group">
							<label>Reference</label>
							<input id="edit_reference"type="etxt" class="form-control" required="">
						</div>
						<div class="form-group">
							<label>Stock</label>
							<input id="edit_stock"type="text" class="form-control" required="">
						</div>
						<div class="form-group">
							<label>Price</label>
							<input id="edit_price"type="text" class="form-control" required="">
						</div>					
						<div class="form-group">
							<label>Weight</label>
							<input id="edit_weight"type="text" class="form-control" required="">
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<a style="color:white;" type="button" id="edit_product" class="btn btn-info" value="">Save</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete Product</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<a style="color:white;" type="button" id="id_delete" class="btn btn-danger" value="">Delete</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="scripts/scripts.js"></script>
</body>
</html>