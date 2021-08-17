<?php
class Product extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DatatableProduct_model', 'dt_product_mdl');
		$this->load->model('Product_model', 'product_mdl');
	}

	public function index()
	{
		$this->load->view('index.php');
	}

	function fetch_user($for){
		$fetch_data = $this->dt_product_mdl->make_datatables();
		$data = array();
		foreach($fetch_data as $row)
		{
			$sub_array = array();
			$sub_array[] = $row->id;
			$sub_array[] = $row->product;
			$sub_array[] = $row->stock;
			$sub_array[] = $row->price;
			if($row->stock > 0)
			{
				$sub_array[] = '<span class="badge bg-success">Available</span>';
			}
			else
			{
				$sub_array[] = '<span class="badge bg-danger">Not Available</span>';
			}

			if($for == 'product')
			{
				$sub_array[] = '
				<button class="btn btn-warning btn-sm btn-update-product" id="'.$row->id.'"><i class="fa fa-edit"></i></button>
				<button class="btn btn-danger btn-sm btn-delete-product" id="'.$row->id.'"><i class="fa fa-trash"></i></button>
				';
			}
			else
			{
				$disables = '';

				if($row->stock <= 0)
				{
					$disables = 'disabled';
				}

				$sub_array[] = '
				<button class="btn btn-success btn-sm btn-select-product" id="'.$row->id.'" '.$disables.'>Select</button>
				';
			}
			$data[] = $sub_array;
		}
		$output = array(
			"draw"                    =>     intval($_POST["draw"]),
			"recordsTotal"          =>      $this->dt_product_mdl->get_all_data(),
			"recordsFiltered"     =>     $this->dt_product_mdl->get_filtered_data(),
			"data"                    =>     $data
		);
		echo json_encode($output);
	}

	function api_add_product()
	{
		$data = array(
			"product"=>$_POST['product'],
			"stock"=>$_POST['stock'],
			"price"=>$_POST['price']
		);

		$res = $this->product_mdl->add_product($data);
		echo json_encode(array("status"=>true,"result"=>$res));
	}

	function api_update_product()
	{
		$data = array(
			"id"=>$_POST['id'],
			"product"=>$_POST['product'],
			"stock"=>$_POST['stock'],
			"price"=>$_POST['price']
		);

		$res = $this->product_mdl->update_product($data);
		echo json_encode(array("status"=>true,"result"=>$res));
	}

	function api_delete_product($id)
	{
		$res = $this->product_mdl->delete_product($id);
		echo json_encode(array("status"=>true,"result"=>$res));
	}

	function api_get_product($id)
	{
		$res = $this->product_mdl->get_product($id);
		echo json_encode(array("status"=>true,"result"=>$res));
	}
}
