<?php
echo '<meta charset=UTF-8>';
require_once 'includes/funcoesUteis.inc';
validaAutenticacao('frmlogin.php', 'RES');
echo '<h2> Ambiente do Usuário Restrito </h2>';
echo '<a href=logout.php?p=frmlogin.php>Logout</a>';
echo '<a href=frmAtualizar.php> Atualizar Dados </a>';
