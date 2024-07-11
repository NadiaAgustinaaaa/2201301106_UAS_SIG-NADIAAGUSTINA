<?php
class M_Akun extends CI_Model
{
    public function tambah($data)
    {
        $this->db->insert('login',$data);
    }

    public function getdata()
    {
        return $this->db->get('login');
    }
    public function getdataid($id)
    {
        $this->db->where('id',$id);
        return $this->db->get('login');
    }
    public function edit($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('login',$data);

    }
    public function hapus($id)
    {
        $this->db->where('id',$id);
         $this->db->delete('login');
    }

    
}
?>