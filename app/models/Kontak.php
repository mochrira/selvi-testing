<?php 

namespace App\Models;
use Selvi\Database\Manager;

class Kontak {

    private $db;

    function __construct() {
        $this->db = Manager::get('main');
    }

    function result($where = [], $orWhere = [], $order = []) {
        return $this->db->where($where)->orWhere($orWhere)->order($order)->get('kontak')->result();
    }

    function row($idKontak) {
        return $this->db->where([['idKontak', $idKontak]])->get('kontak')->row();
    }

    function insert($data) {
        $insert = $this->db->insert('kontak', $data);
        if($insert) {
            return $this->db->getlastid();
        }
        return $insert;
    }

    function update($idKontak, $data) {
        return $this->db->where([['idKontak', $idKontak]])->update('kontak', $data);
    }

    function delete($idKontak) {
        return $this->db->where([['idKontak', $idKontak]])->delete('kontak');
    }

}