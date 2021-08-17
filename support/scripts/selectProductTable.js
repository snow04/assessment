var dataTable = $('#selectProductTable').DataTable({
	"processing":true,
	"serverSide":true,
	"order":[],
	"ajax":{
		url:`${base_url}/product/fetch_user/sales`,
		type:"POST"
	},
	"columnDefs":[
		{
			"targets":[0, 3, 4],
			"orderable":false,
		},
	],
});

