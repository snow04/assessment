var dataTable = $('#reportTable').DataTable({
	"processing":true,
	"serverSide":true,
	"order":[],
	"ajax":{
		url:`${base_url}/report/fetch_user`,
		type:"POST"
	},
	"columnDefs":[
		{
			"targets":[0, 3, 4],
			"orderable":false,
		},
	],
});

