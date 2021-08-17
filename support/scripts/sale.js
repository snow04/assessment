
let sale_action ='';

$(document).on('click', '.btn-select-product', function()
{
	sale_action = 'add';
	const id  = $(this).attr('id');
	$.get(`${base_url}/product/api_get_product/${id}`, function(response)
	{
		$('#product_id').val(id);
		$('#s_product').val(response.result[0].product);
		let stock = response.result[0].stock;
		let price = response.result[0].price;
		$('#s_stock').val(stock);
		$('#s_price').val(price);
	},'json');
});

$('#salesForm').submit(function(e)
{
	e.preventDefault();
	$.post(`${base_url}/sale/api_${sale_action}_sale`, $(this).serialize(), function(response){

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

$('input[name="s_quantity"]').keyup(function()
{
	let price = $('#s_price').val();
	let quantity  = parseInt($('#s_quantity').val());
	let stock = parseInt($('#s_stock').val());
	
	if(stock < quantity)
	{
		Swal.fire(
			'Error Adding',
			`Quantity is greater than the stock left`,
			'error'
		).then(()=>
		{
			$('#s_quantity').val('');
		});
	}
	$('#s_amount').val((price * quantity));

});
