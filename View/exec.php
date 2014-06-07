<?php 
	require_once('../Controller/prolixo.php');
	require_once('../Config/link.php');
	require_once('../Model/LixeiraDAO.php');

	$pro = new Prolixo();
	$link = new Link();
	//Connecta com a base de dados
	echo $link->getConn();

	$pro->setStatus('ok');

	echo $pro->getStatus();

/* Teste Insert */

	$lixeira = new LixeiraDAO();
	$lixeira->setNome('a');
	$lixeira->setIdentificador('987654');
	$lixeira->setStatus('23');
	$idLixeira = $lixeira->save($lixeira);
	var_dump($idLixeira);

/* Teste Update */
	$lixeira->setId($idLixeira);
	$lixeira->setIdentificador('6666454');
	var_dump($lixeira->update($lixeira));

/* Teste Find */
	$a = $lixeira->findById(10);

/* Teste Delete */
	$b = $a->delete(10);
	var_dump($a);

	

?>
