<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model {

    public function do_insert($dados = NULL) {
        if ($dados != NULL):
            $this->db->insert('curso_ci', $dados);
            $this->session->set_flashdata('cadastrook', 'Cadastro efetuado com sucesso'); //Envia para a view pela sessão esta variavel: 'cadastrook' com a msg 
            redirect('crud/create');
        endif;
    }

    public function do_update($dados = NULL, $condicao = NULL) {
        if ($dados != NULL && $condicao != NULL):
            $this->db->update('curso_ci', $dados, $condicao);
            $this->session->set_flashdata('edicaook', 'Cadastro alterado com sucesso'); //Envia para a view pela sessão esta variavel: 'edicaook' com a msg 
            redirect(current_url());
        endif;
    }

    public function do_delete($condicao = NULL) {
        if ($condicao != NULL):
            $this->db->delete('curso_ci', $condicao);
            $this->session->set_flashdata('excluirok', 'Registro excluido com sucesso'); //Envia para a view pela sessão esta variavel: 'edicaook' com a msg 
            redirect('crud/retrieve');
            endif;
    }

    public function get_all() {
        return $this->db->get('curso_ci');
    }

    public function get_byid($id = NULL) {
        if ($id != NULL):
            $this->db->where('id', $id);
            $this->db->limit(1); //Como estou buscando pelo id, deve retornar somente uma linha.
            return $this->db->get('curso_ci');
        else:
            return FALSE;

        endif;
    }

}
