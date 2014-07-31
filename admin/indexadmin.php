<?php
echo '<meta charset=UTF-8>';
require_once '../includes/funcoesUteis.inc';
validaAutenticacao('../frmlogin.php', 'ADM');
echo '<h2> Ambiente do Usuário Administrativo </h2>';
echo '<a href=../logout.php?p=frmlogin.php>Logout</a>';

