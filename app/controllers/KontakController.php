<?php 

namespace App\Controllers;
use App\Controller;
use Selvi\Exception;
use App\Models\Kontak;

class KontakController extends Controller {

    function __construct() {
        $this->validateToken();
        $this->validatePengguna();
        $this->load(Kontak::class, 'Kontak');
    }

    function rowException($idKontak) {
        $data = $this->Kontak->row($idKontak);
        if(!$data) {
            Throw new Exception('Kontak not found', 'kontak/not-found', 404);
        }
        return $data;
    }

    function result() {
        $order = [];
        $sort = $this->input->get('sort');
        if($sort !== null) {
            $order = \buildOrder($sort);
        }

        $orWhere = [];
        $search = $this->input->get('search');
        if($search !== null) {
            $orWhere = \buildSearch(['nmKontak'], $search);
        }

        $where = [];
        return jsonResponse($this->Kontak->result($where, $orWhere, $order));
    }

    function row() {
        $idKontak = $this->uri->segment(2);
        $data = $this->rowException($idKontak);
        return jsonResponse($data);
    }

    function insert() {
        $data = json_decode($this->input->raw(), true);
        $idKontak = $this->Kontak->insert($data);
        if($idKontak === false) {
            Throw new Exception('Failed to insert', 'kontak/insert-failed');
        }
        return jsonResponse(['idKontak' => $idKontak], 201);
    }

    function update() {
        $idKontak = $this->uri->segment(2);
        $this->rowException($idKontak);
        $data = json_decode($this->input->raw(), true);
        if(!$this->Kontak->update($idKontak, $data)) {
            Throw new Exception('Failed to insert', 'kontak/insert-failed');
        }
        return response('', 204);
    }

    function delete() {
        $idKontak = $this->uri->segment(2);
        $this->rowException($idKontak);
        if(!$this->Kontak->delete($idKontak)) {
            Throw new Exception('Failed to insert', 'kontak/insert-failed');
        }
        return response('', 204);
    }

}