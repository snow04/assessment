<?php
class Product_model extends CI_Model
{
	private $table = 'products';

	public function __construct()
	{
		parent::__construct();
	}

	public function add_product($data)
	{
		$res = $this->db->insert($this->table,$data);
		return ($res) ? 'Product Successfully Added' : 'Something went wrong';
	}

	public function update_product($data)
	{
		$id = $data['id'];
		unset($data['id']);

		$res = $this->db->where('id', $id)->update($this->table, $data);
		return ($res) ? 'Product Successfullly updated!': 'Something went wrong';
	}

	public function delete_product($id)
	{
		$res = $this->db->where('id', $id)->delete($this->table);
		return ($res) ? 'Product Successfullly deleted!': 'Something went wrong';
	}

	public function get_product($id)
	{
		$res = $this->db->select('*')->from($this->table)->where('id',$id)->get();
		return $res->result();
	}

}
