<?php

class ModelNikah extends CI_Model
{
	var $table = "nikah";
	var $primaryKey = "id_nikah";

	// function untuk get all data nikah
	public function getAll($method = '')
	{
		if ($method == '') {
			return $this->db->get($this->table)->result();
		} elseif ($method == 'join') {
			$this->db->join('pendeta', 'pendeta.id_pendeta= nikah.id_pendeta');
			//$this->db->join('jemaat', 'jemaat.id_jemaat= nikah.id_jemaat');
			return $this->db->get($this->table)->result();
		}
	}

	// function untuk get data by primary_key
	public function getByPrimaryKey($id)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->get($this->table)->row();
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function insertGetId($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($id, $data)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->update($this->table, $data);
	}

	public function delete($id)
	{
		return $this->db->where($this->primaryKey, $id)->delete($this->table);
	}
}
