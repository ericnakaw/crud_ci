<?php
$iduser = $this->uri->segment(3);
//Se o segmento 3 vier vazio, redireciona para a página retrieve
if ($iduser == NULL)
    redirect('crud/retrieve');
//Se o segmento 3 não vier vazio, faço uma query com o $iduser que peguei da  URI
$query = $this->crud_model->get_byid($iduser)->row();
echo form_open("crud/update/$iduser");
//Erros de validação serão impressos nesta linha de codigo
echo validation_errors('<p>', '</p>');
if ($this->session->flashdata('edicaook')):
    echo '<p>' . $this->session->flashdata('edicaook') . '</p>';//Recupero da sessão esta variavel: 'edicaook' com a msg para exibir ao usuário vinda da Model 
endif;
echo form_label('Nome Completo');
echo form_input(array('name' => 'nome'), set_value('nome', $query->nome), 'autofocus class="form-control"');
echo form_label('Email');
echo form_input(array('name' => 'email'), set_value('email', $query->email), 'disabled = "disabled" class="form-control"');
echo form_label('Login');
echo form_input(array('name' => 'login'), set_value('login', $query->login), 'disabled = "disabled" class="form-control"');
echo form_label('Senha');
echo form_password(array('name' => 'senha'), set_value('senha'), 'class="form-control"');
echo form_label('Repita a senha');
echo form_password(array('name' => 'senha2'), set_value('senha2'), 'class="form-control"');
echo form_hidden('idusuario',$query->id);//por segurança, pego o id vindo do BD, ao invés de pegar a URI e envio pelo formulário
echo '<br>';
echo form_submit(array('name' => 'cadastrar'), 'Salvar', 'class = "btn btn-success"');
echo form_close();
