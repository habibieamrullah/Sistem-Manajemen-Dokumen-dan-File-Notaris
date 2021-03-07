<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_model
{

    public function countLapHarian()
    {
        $id_user =  $this->session->userdata('id');
        $query = $this->db->query(
            "SELECT COUNT(file_upload) as lap_harian
                               FROM lap_harian
                               WHERE id_user = $id_user"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->lap_harian;
        } else {
            return 0;
        }
    }

    public function countLapBulanan()
    {
        $id_user =  $this->session->userdata('id');
        $query = $this->db->query(
            "SELECT COUNT(file_upload) as lap_bulanan
                               FROM lap_bulanan
                               WHERE id_user = $id_user"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->lap_bulanan;
        } else {
            return 0;
        }
    }

    public function countLapTahunan()
    {
        $id_user =  $this->session->userdata('id');
        $query = $this->db->query(
            "SELECT COUNT(file_upload) as lap_tahunan
                               FROM lap_tahunan
                               WHERE id_user = $id_user"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->lap_tahunan;
        } else {
            return 0;
        }
    }

    public function countLapLain()
    {
        $id_user = $this->session->userdata('id');
        $query = $this->db->query(
            "SELECT COUNT(file_upload) as lap_lain
                        FROM lap_lain
                        WHERE id_user = $id_user"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->lap_lain;
        } else {
            return 0;
        }
    }

    public function countDokKerja()
    {
        $id_user = $this->session->userdata('id');
        $query = $this->db->query(
            "SELECT COUNT(file_upload) as dok_kerja
                        FROM dok_kerja
                        WHERE id_user = $id_user"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->dok_kerja;
        } else {
            return 0;
        }
    }

    public function countDokPribadi()
    {
        $id_user = $this->session->userdata('id');
        $query = $this->db->query(
            "SELECT COUNT(file_upload) as dok_pribadi
                        FROM dok_pribadi
                        WHERE id_user = $id_user"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->dok_pribadi;
        } else {
            return 0;
        }
    }

    public function countScanUtama()
    {
        $id_user = $this->session->userdata('id');
        $query = $this->db->query(
            "SELECT COUNT(file_upload) as scan_utama
                        FROM scan_utama
                        WHERE id_user = $id_user"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->scan_utama;
        } else {
            return 0;
        }
    }

    public function countScanPendukung()
    {
        $id_user = $this->session->userdata('id');
        $query = $this->db->query(
            "SELECT COUNT(file_upload) as scan_pendukung
                        FROM scan_pendukung
                        WHERE id_user = $id_user"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->scan_pendukung;
        } else {
            return 0;
        }
    }

    public function getLapHarianLimit()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('lap_harian');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getLapBulananLimit()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('lap_bulanan');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getLapTahunanLimit()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('lap_tahunan');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getLapLainLimit()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('lap_lain');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getDokKerjaLimit()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('dok_kerja');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getDokPribadiLimit()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('dok_pribadi');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getScanUtamaLimit()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('scan_utama');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getScanPendukungLimit()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('scan_pendukung');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get()->result_array();
        return $query;
    }


    public function getLapHarian()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('lap_harian');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getLapBulanan()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('lap_bulanan');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getLapTahunan()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('lap_tahunan');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getLapLain()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('lap_lain');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getDokKerja()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('dok_kerja');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getDokPribadi()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('dok_pribadi');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getScanUtama()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('scan_utama');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getScanPendukung()
    {
        $id_user =  $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('scan_pendukung');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }
}
