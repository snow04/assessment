<?php
class Report extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('ReportTable_model', 'dt_report_mdl');
	}

	function fetch_user(){
		$fetch_data = $this->dt_report_mdl->make_datatables();
		$data = array();
		foreach($fetch_data as $row)
		{
			$sub_array = array();
			$sub_array[] = $row->id;
			$sub_array[] = $row->product;
			$sub_array[] = $row->price;
			$sub_array[] = $row->stock;
			$sub_array[] = $row->total_sales;

//			$sub_array[] = '
//			<button class="btn btn-warning btn-sm btn-update-product" id="'.$row->id.'"><i class="fa fa-edit"></i></button>
//			<button class="btn btn-danger btn-sm btn-delete-product" id="'.$row->id.'"><i class="fa fa-trash"></i></button>
//			';

			$data[] = $sub_array;
		}
		$output = array(
			"draw"                    =>     intval($_POST["draw"]),
			"recordsTotal"          =>      $this->dt_report_mdl->get_all_data(),
			"recordsFiltered"     =>     $this->dt_report_mdl->get_filtered_data(),
			"data"                    =>     $data
		);
		echo json_encode($output);
	}

}
