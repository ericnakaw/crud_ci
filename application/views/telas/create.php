<?php
echo form_open('crud/create');
echo validation_errors('<p>', '</p>');
if($this->session->flashdata('cadastrook')):
    echo '<p>'.$this->session->flashdata('cadastrook').'</p>'; 
endif;
echo form_label('Nome Completo');
echo form_input(array('name' => 'nome'), set_value('nome'), 'autofocus class="form-control"');
echo form_label('Email');
echo form_input(array('name' => 'email'), set_value('email'), 'class="form-control"');
echo form_label('Login');
echo form_input(array('name' => 'login'), set_value('login'), 'class="form-control"');
echo form_label('Senha');
echo form_password(array('name' => 'senha'), set_value('senha'), 'class="form-control"');
echo form_label('Repita a senha');
echo form_password(array('name' => 'senha2'), set_value('senha2'), 'class="form-control"');
echo form_submit(array('name' => 'cadastrar'), 'Cadastrar', 'class = "btn btn-success"');
echo form_close();
