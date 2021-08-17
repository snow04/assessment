<?php
class Sale_model extends CI_Model
{
	private $table = 'sales';

	public function __construct()
	{
		parent::__construct();
	}

	public function add_sale($data)
	{
		$res = $this->db->insert($this->table,$data);
		$query = $this->db->select('*')->from('products')->where('id', $data['product_id'])->get();
		$quantity = $data['quantity'];
		$old_stock =  $query->result()[0]->stock;

		$this->db->where('id', $data['product_id'])->update('products', array("stock"=> ($old_stock - $quantity)));
		return ($res) ? 'Sales Successfully Added' : 'Something went wrong';
	}

	public function update_sale($data)
	{
		$id = $data['id'];
		unset($data['id']);

		$res = $this->db->where('id', $id)->update($this->table, $data);
		return ($res) ? 'Transaction Successfullly updated!': 'Something went wrong';
	}

	public function delete_sale($id)
	{
		$res = $this->db->where('id', $id)->delete($this->table);
		return ($res) ? 'Transaction Successfullly deleted!': 'Something went wrong';
	}

	public function get_sale($id)
	{
		$res = $this->db->select('*')->from($this->table)->where('id',$id)->get();
		return $res->result();
	}

}
