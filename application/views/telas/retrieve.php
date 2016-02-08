<?php

echo '<h2>Lista de usuários</h2>';
if ($this->session->flashdata('excluirok')):
    echo '<p>' . $this->session->flashdata('excluirok') . '</p>'; //Recupero da sessão esta variavel: 'edicaook' com a msg para exibir ao usuário vinda da Model 
endif;
$this->table->set_heading('ID', 'Nome', 'Email', 'Login', 'Operações');
foreach ($usuarios as $linha):
    $this->table->add_row($linha->id, $linha->nome, $linha->email, $linha->login, anchor("crud/update/$linha->id", 'Editar') . ' - ' .
            anchor("crud/delete/$linha->id", 'Excluir'));
endforeach;
echo $this->table->generate();
