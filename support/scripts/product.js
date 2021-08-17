
let action = 'add';

$('#btn-refresh').click(function()
{
	$('#productForm')[0].reset();
	action = 'add';
});

$('#productForm').submit(function(e){
	e.preventDefault();

	$.post(`${base_url}/product/api_${action}_product`, $(this).serialize(), function(response){

		if(response.status)
		{
			Swal.fire(
				'Successfully Saved',
				`${response.result}`,
				'success'
			).then(()=>
			{
				$('#productForm')[0].reset();
				dataTable.ajax.reload();
			});
		}
	},'json');

});

$(document).on('click','.btn-update-product', function()
{
	let id = $(this).attr('id');
	$.get(`${base_url}/product/api_get_product/${id}`, function(response){
		$('#id').val(id);
		$('#product').val(response.result[0].product);
		$('#stock').val(response.result[0].stock);
		$('#price').val(response.result[0].price);
	},'json');

	action = 'update';
});

$(document).on('click','.btn-delete-product', function()
{
	const id = $(this).attr('id');
	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
		if (result.isConfirmed) {
			$.get(`${base_url}/product/api_delete_product/${id}`, function(response){
				if(response.status == true)
				{
					Swal.fire(
						'Deleted!',
						'Product has been deleted.',
						'success'
					).then(()=>{
						dataTable.ajax.reload();
					});
				}
			},'json');
		}
	})
});
