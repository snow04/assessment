<?php

class Sale extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sale_model', 'sale_mdl');
	}
	function fetch_user(){
		$fetch_data = $this->sale_mdl->make_datatables();
		$data = array();
		foreach($fetch_data as $row)
		{
			$sub_array = array();
			$sub_array[] = $row->id;
			$sub_array[] = $row->product;
			$sub_array[] = $row->quantity;
			$sub_array[] = $row->price;
			$sub_array[] = $row->sale;

			$sub_array[] = '
			<button class="btn btn-warning btn-sm btn-update-product" id="'.$row->id.'"><i class="fa fa-edit"></i></button>
			<button class="btn btn-danger btn-sm btn-delete-product" id="'.$row->id.'"><i class="fa fa-trash"></i></button>
			';

			$data[] = $sub_array;
		}
		$output = array(
			"draw"                    =>     intval($_POST["draw"]),
			"recordsTotal"          =>      $this->sale_mdl->get_all_data(),
			"recordsFiltered"     =>     $this->sale_mdl->get_filtered_data(),
			"data"                    =>     $data
		);
		echo json_encode($output);
	}

	function api_add_sale()
	{
		$data = array(
			"product_id"=>$_POST['product_id'],
			"quantity"=>$_POST['s_quantity'],
			"price"=>$_POST['s_price'],
			"amount"=>$_POST['s_amount']
		);

		$res = $this->sale_mdl->add_sale($data);
		echo json_encode(array("status"=>true,"result"=>$res));
	}

	function api_update_sale()
	{
		$data = array(
			"id"=>$_POST['id'],
			"product_id"=>$_POST['product_id'],
			"quantity"=>$_POST['s_quantity'],
			"price"=>$_POST['s_price'],
			"amount"=>$_POST['s_amount']
		);

		$res = $this->sale_mdl->update_sale($data);
		echo json_encode(array("status"=>true,"result"=>$res));
	}

	function api_delete_sale($id)
	{
		$res = $this->sale_mdl->delete_sale($id);
		echo json_encode(array("status"=>true,"result"=>$res));
	}

	function api_get_sale($id)
	{
		$res = $this->sale_mdl->get_sale($id);
		echo json_encode(array("status"=>true,"result"=>$res));
	}
}
