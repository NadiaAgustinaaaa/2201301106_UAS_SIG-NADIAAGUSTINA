<?php
class DapurModel extends CI_Model
{
    public function tambah($data)
    {
        $this->db->insert('dapur', $data);
    }

    public function getdata()
    {
        return $this->db->get('dapur');
    }
    public function getdataid($id)
    {
        $this->db->where('id_dapur', $id);
        return $this->db->get('dapur');
    }
    public function edit($data, $id_dapur)
    {
        $this->db->where('id_dapur', $id_dapur);
        $this->db->update('dapur', $data);
    }
    public function hapus($id)
    {
        $this->db->where('id_dapur', $id);
        $this->db->delete('dapur');
    }
}
