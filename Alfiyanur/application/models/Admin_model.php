<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_model
{

    public function countJmlUser()
    {

        $query = $this->db->query(
            "SELECT COUNT(id) as jml_user
                               FROM mst_user"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->jml_user;
        } else {
            return 0;
        }
    }

    public function countUserAktif()
    {

        $query = $this->db->query(
            "SELECT COUNT(id) as user_aktif
                               FROM mst_user
                               WHERE is_active = 1"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->user_aktif;
        } else {
            return 0;
        }
    }

    public function countUserTakAktif()
    {

        $query = $this->db->query(
            "SELECT COUNT(id) as user_tak_aktif
                               FROM mst_user
                               WHERE is_active = 0"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->user_tak_aktif;
        } else {
            return 0;
        }
    }

    public function countUserPerbulan()
    {
        $query = $this->db->query(
            "SELECT CONCAT(YEAR(date_created),'/',MONTH(date_created)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan
                FROM mst_user
                WHERE CONCAT(YEAR(date_created),'/',MONTH(date_created))=CONCAT(YEAR(NOW()),'/',MONTH(NOW()))
                GROUP BY YEAR(date_created),MONTH(date_created);"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->jumlah_bulanan;
        } else {
            return 0;
        }
    }

    public function getAllUserLimit()
    {
        $this->db->select('*');
        $this->db->from('mst_user');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get()->result_array();
        return $query;
    }


    public function getAllUser()
    {
        $this->db->select('*');
        $this->db->from('mst_user');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function getUserEdit($id)
    {
        $query = $this->db->get_where('mst_user', ['id' => $id])->row_array();
        return $query;
    }
}
