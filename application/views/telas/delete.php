<?php
$iduser = $this->uri->segment(3);
if ($iduser == NULL)
    redirect('crud/retrieve');
$query = $this->crud_model->get_byid($iduser)->row();
echo form_open("crud/delete/$iduser");
echo form_label('Nome Completo');
echo form_input(array('name' => 'nome'), set_value('nome', $query->nome), 'disabled = "disabled" class="form-control"');
echo form_label('Email');
echo form_input(array('name' => 'email'), set_value('email', $query->email), 'disabled = "disabled" class="form-control"');
echo form_label('Login');
echo form_input(array('name' => 'login'), set_value('login', $query->login), 'disabled = "disabled" class="form-control"');
echo form_label('Senha');
//por segurança, pego o id vindo do BD, ao invés de pegar a URI e envio pelo formulário
echo form_hidden('idusuario',$query->id);
echo '<br>';
echo form_submit(array('name' => 'cadastrar'), 'Excluir', 'class = "btn btn-success"');
echo form_close();
