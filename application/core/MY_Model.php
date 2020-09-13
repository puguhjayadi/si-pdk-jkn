<?php

date_default_timezone_set('Asia/Jakarta');

class MY_Model extends CI_Model
{
    protected $table;
    protected $primaryKey;

    function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        if (is_object($data)) {
            $data = (array) $data;
        }

        if (empty($data)) {
            return false;
        }
        $result = $this->db->insert($this->table, $data);

        if (!$result) {
            return $result;
        }

        $this->lastInsertId = $this->db->insert_id();

        return $result;
    }

    public function update($id, $data)
    {
        if (is_object($data)) {
            $data = (array) $data;
        }

        if (empty($data)) {
            return false;
        }

        $result = $this->db->where($this->primaryKey, $id)->update($this->table, $data);

        if (!$result) {
            return $result;
        }

        return $result;
    }
    
    public function delete($id)
    {
        $result = $this->db->delete($this->table, [$this->primaryKey => $id]);
        if (!$result) {
            return $result;
        }
        return $result;
    }

    public function findId($id)
    {
        return $this->db->get_where($this->table, [$this->primaryKey => $id])->row();
    }

    public function findAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function findRows()
    {
        return $this->db->get($this->table)->num_rows();
    }

    public function findSelect($dataSelect, $dataWhere = '')
    {
        if (is_object($dataSelect)) {
            $dataSelect = (array) $dataSelect;
        }

        if (empty($dataSelect)) {
            return false;
        }

        if($dataWhere != ''){
            $result = $this->db->select(implode(',', $dataSelect))->from($this->table)->where($dataWhere)->get()->result();
        } else {
            $result = $this->db->select(implode(',', $dataSelect))->from($this->table)->get()->result();
        }

        if (!$result) {
            return $result;
        }
        return $result;
    }

    public function findWhereMany($dataWhere)
    {
        if (is_object($dataWhere)) {
            $dataWhere = (array) $dataWhere;
        }

        if (empty($dataWhere)) {
            return false;
        }

        return $this->db->get_where($this->table, $dataWhere)->result();
    }

    public function findWhere($id, $fieldWhere)
    {
        return $this->db->get_where($this->table, [$fieldWhere => $id])->result();
    }


    public function runSql($sql)
    {
        if ($this->db->query($sql)){
            return true;
        }
        else{
            return false;
        }
    }

    public function resultSql($sql)
    {
        return $this->db->query($sql)->result();
    }

}