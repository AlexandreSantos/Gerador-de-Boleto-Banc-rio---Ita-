<?php
// +----------------------------------------------------------------------+
// | BoletoPhp - Versão Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo está disponível sob a Licença GPL disponível pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Você deve ter recebido uma cópia da GNU Public License junto com     |
// | esse pacote; se não, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colaborações de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de João Prado Maia e Pablo Martins F. Costa				  |
// | 																	  |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Equipe Coordenação Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenvolvimento Boleto Itaú: Glauber Portella		                  |
// +----------------------------------------------------------------------+

$nosso_numero = $_POST['nosso_numero'];
$numero_documento = $_POST['numero_documento'];

$sacado = $_POST['sacado'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$CEP = $_POST['cep'];
$matricula = $_POST['matricula'];
$cpf = $_POST['cpf'];

$data_vencimento = $_POST['data_vencimento'];
$valor_cobrado = $_POST['valor_cobrado'];

$demonstrativo1 = $_POST['demonstrativo1'];
$demonstrativo2 = $_POST['taxa_boleto'];
$demonstrativo3 = $_POST['demonstrativo3'];

$descricao1 = $_POST['descricao1'];
$descricao2 = $_POST['descricao2'];
$descricao3 = $_POST['descricao3'];
$descricao4 = $_POST['descricao4'];

// ------------------------- DADOS DINÂMICOS DO SEU CLIENTE PARA A GERAÇÃO DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formulário c/ POST, GET ou de BD (MySql,Postgre,etc)	//

// DADOS DO BOLETO PARA O SEU CLIENTE
$dias_de_prazo_para_pagamento = 5;
if($demonstrativo2 == 'sim') {
	$taxa_boleto = "3,00";
}else{
	$taxa_boleto = 0;
}
$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006"; 
$valor_cobrado = $valor_cobrado; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

$dadosboleto["nosso_numero"] = $nosso_numero;  // Nosso numero - REGRA: Máximo de 8 caracteres!
$dadosboleto["numero_documento"] = $numero_documento;	// Num do pedido ou nosso numero
$dadosboleto["data_vencimento"] = $data_vencimento; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emissão do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = "$sacado - $matricula - <strong>CPF:</strong> $cpf";
$dadosboleto["endereco1"] = $endereco;
$dadosboleto["endereco2"] = "$cidade - $estado - CEP: $CEP";

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = $demonstrativo1;
if ($demonstrativo2 == 'sim') { $dadosboleto["demonstrativo2"] = "Taxa bancária - R$ ".$taxa_boleto;};
$dadosboleto["demonstrativo3"] = $demonstrativo3;
$dadosboleto["instrucoes1"] = "- $descricao1";
$dadosboleto["instrucoes2"] = "- $descricao2";
$dadosboleto["instrucoes3"] = "- $descricao3";
$dadosboleto["instrucoes4"] = "&nbsp; $descricao4";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "";
$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"] = "";		
$dadosboleto["uso_banco"] = ""; 	
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "";


// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //


// DADOS DA SUA CONTA - ITAÚ
$dadosboleto["agencia"] = "6476"; // Num da agencia, sem digito
$dadosboleto["conta"] = "07274";	// Num da conta, sem digito
$dadosboleto["conta_dv"] = "6"; 	// Digito do Num da conta

// DADOS PERSONALIZADOS - ITAÚ
$dadosboleto["carteira"] = "175";  // Código da Carteira

// SEUS DADOS
$dadosboleto["identificacao"] = "AWU - American World University";
$dadosboleto["cpf_cnpj"] = "31036114/0001-15";
$dadosboleto["endereco"] = "Rua Monsenhor Jerônimo 736";
$dadosboleto["cidade_uf"] = "Rio de Janeiro - RJ - Brasil";
$dadosboleto["cedente"] = "GPS E P DESPORTIVAS";

// NÃO ALTERAR!
include("include/funcoes_itau.php"); 
include("include/layout_itau.php");
?>
