<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url'); //Terceira forma de carregar um Helper(URL) onde este vale para todo o controlador Crud
        $this->load->helper('form');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('table');
        $this->load->model('crud_model');
    }

    public function index() {
        //A primeira forma de carregar um Helper(URL) é configurando o autoload no caminho: config/autoload.php/$autoload['helper'] = array('url'); Este vale para todo o sistema 
        //Segunda forma (abaixo comentado) de carregar um Helper(URL) onde este vale apenas para o index
        //$this->load->helper('url'); 
        $dados = array(
            'titulo' => 'CRUD com codeIgniter',
            'tela' => '',
        );
        $this->load->view('crud', $dados);
    }

    public function create() {
        //inicio: validacao do form
        $this->form_validation->set_rules('nome', 'NOME', 'trim|required|max_length[50]|ucwords');
        $this->form_validation->set_message('is_unique', 'Este %s já está cadastrado no sistema'); //Configurar antes a msg. Ao executar, a msg volta ao padrão
        $this->form_validation->set_rules('email', 'EMAIL', 'trim|required|max_length[50]|strtolower|valid_email|is_unique[curso_ci.email]');
        $this->form_validation->set_rules('login', 'LOGIN', 'trim|required|max_length[25]|strtolower|is_unique[curso_ci.login]');
        $this->form_validation->set_rules('senha', 'SENHA', 'trim|required|strtolower'); //será convertido em MD5...então não há necessidade desta regra: max_length[32]
        $this->form_validation->set_message('matches', 'O campo %s está diferente do campo %s'); //Configurar antes a msg. Ao executar, a msg volta ao padrão
        $this->form_validation->set_rules('senha2', 'REPITA A SENHA', 'trim|required|strtolower|matches[senha]'); //será convertido em MD5...então não há necessidade desta regra: max_length[32]
        //fim: validacao do form
        if ($this->form_validation->run() == TRUE)://se a validação passar, então insiro no banco com método post
            $dados = elements(array('nome', 'email', 'login', 'senha',), $this->input->post()); //o metodo post() é o mesmo que fazer: $_POST
            $dados['senha'] = md5($dados['senha']); //criptografa a senha com MD5
            $this->crud_model->do_insert($dados); //Chamo o método da classe MODEL que faz o insert
        //ou         
        //$this->load->model('crud_model','crud_apelido'); podemos dar um apelido, e aqui chamei de crud_apelido
        //$this->crud_apelido->do_insert($dados);
        endif;
        $dados = array(
            'titulo' => 'CRUD &raquo; Create',
            'tela' => 'create',
        );
        $this->load->view('crud', $dados);
    }

    public function retrieve() {
        $dados = array(
            'titulo' => 'CRUD &raquo; Retrieve',
            'tela' => 'retrieve',
            'usuarios' => $this->crud_model->get_all()->result(), //Esta linha tem na documentação Active Record
        );
        $this->load->view('crud', $dados);
    }

    public function update() {
        //inicio: validacao do form
        //Copiados da função CREATE, porém com algumas alterações...
        $this->form_validation->set_rules('nome', 'NOME', 'trim|required|max_length[50]|ucwords');
//Esta linha foi comentada para não extender a aula, mas deve-se fazer uma regra para este update...
//        $this->form_validation->set_message('is_unique', 'Este %s já está cadastrado no sistema'); //Configurar antes a msg. Ao executar, a msg volta ao padrão
//        $this->form_validation->set_rules('email', 'EMAIL', 'trim|required|max_length[50]|strtolower|valid_email|is_unique[curso_ci.email]');
//        $this->form_validation->set_rules('login', 'LOGIN', 'trim|required|max_length[25]|strtolower|is_unique[curso_ci.login]');
        $this->form_validation->set_rules('senha', 'SENHA', 'trim|required|strtolower'); //será convertido em MD5...então não há necessidade desta regra: max_length[32]
        $this->form_validation->set_message('matches', 'O campo %s está diferente do campo %s'); //Configurar antes a msg. Ao executar, a msg volta ao padrão
        $this->form_validation->set_rules('senha2', 'REPITA A SENHA', 'trim|required|strtolower|matches[senha]'); //será convertido em MD5...então não há necessidade desta regra: max_length[32]
        //fim: validacao do form
        if ($this->form_validation->run() == TRUE)://se a validação passar, então insiro no banco com método post
            $dados = elements(array('nome', 'senha',), $this->input->post()); //o metodo post() é o mesmo que fazer: $_POST
            $dados['senha'] = md5($dados['senha']); //criptografa a senha com MD5
            $this->crud_model->do_update($dados, array('id' => $this->input->post('idusuario'))); //Chamo o método da classe MODEL que faz o insert
        endif;
        $dados = array(
            'titulo' => 'CRUD &raquo; Update',
            'tela' => 'update',
        );
        $this->load->view('crud', $dados);
    }

    public function delete() {
        if ($this->input->post('idusuario') > 0):
            $this->crud_model->do_delete(array('id' => $this->input->post('idusuario'))); //Chamo o método da classe MODEL que faz o insert
        endif;

        $dados = array(
            'titulo' => 'CRUD &raquo; Delete',
            'tela' => 'delete',
        );
        $this->load->view('crud', $dados);
    }

}
