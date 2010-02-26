<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gerador de Boleto AWU</title>
<style type="text/css">
<!--
* {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
input {
	width: 250px;
}
a.tooltip{
	position:relative;
	font:12px arial, verdana, helvetica, sans-serif;
	padding:0;
	color:#0000FF;
	text-decoration:none;
	border-bottom:2px dotted #039;
	cursor:help;
	z-index:50;
	font-weight:bold;
}
       a.tooltip:hover{
            background:transparent;
            z-index:55;
       }
       a.tooltip span{
            display:none;
       }
       a.tooltip:hover span{
	display:block;
	position:absolute;
	width:350px;
	top:2em;
	text-align:justify;
	left:-7em;
	font: 12px arial, verdana, helvetica, sans-serif;
	padding:5px 10px;
	border:1px solid #999;
	color:#333333;
	background-color: #FFFFFF;
      }
-->
</style>
<link rel="shortcut icon" href="favicon.png" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

</head>

<body>
<form id="form1" name="form1" method="post" action="boleto_itau.php">
<table width="647" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td width="242" align="right">Nosso Número <br />
    (Máximo de 8 Caracteres, Ex. 12345678)</td>
    <td width="389" align="left"><span id="sprytextfield3">
      <input name="nosso_numero" type="text" id="nosso_numero" maxlength="8" />
      <span class="textfieldRequiredMsg">Preencha o campo.</span></span></td>
  </tr>
  <tr>
    <td align="right">Número do Documento<br />
    Número do pedido do nosso número</td>
    <td align="left"><span id="sprytextfield4">
      <input name="numero_documento" type="text" id="numero_documento" maxlength="4" />
      <span class="textfieldRequiredMsg">Preencha o campo.</span></span></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><hr /></td>
    </tr>
  <tr>
    <td align="right">Sacado</td>
    <td align="left"><input type="text" name="sacado" id="sacado" /></td>
  </tr>
  <tr>
    <td align="right">Endereço Sacado</td>
    <td align="left"><input type="text" name="endereco" id="endereco" /></td>
  </tr>
  <tr>
    <td align="right">Cidade Sacado</td>
    <td align="left"><input type="text" name="cidade" id="cidade" /></td>
  </tr>
  <tr>
    <td align="right">Estado Sacado</td>
    <td align="left"><input type="text" name="estado" id="estado" /></td>
  </tr>
  <tr>
    <td align="right">CEP Sacado</td>
    <td align="left"><input type="text" name="cep" id="cep" /></td>
  </tr>
  <tr>
    <td align="right">Matrícula</td>
    <td align="left"><input type="text" name="matricula" id="matricula" /></td>
  </tr>
  <tr>
    <td align="right">CPF</td>
    <td align="left"><input type="text" name="cpf" id="cpf" /></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><hr /></td>
    </tr>
  <tr>
    <td align="right">Data Vencimento<br />
      (Ex.DD/MM/AA) </td>
    <td align="left"><span id="sprytextfield1">
    <input type="text" name="data_vencimento" id="data_vencimento" />
    <span class="textfieldRequiredMsg">Valor Inválido</span><span class="textfieldInvalidFormatMsg"><br />Formato de data Inv?do.</span></span></td>
  </tr>
  <tr>
    <td align="right">Valor Cobrado<br />
      (Ex. 125,00)</td>
    <td align="left"><span id="sprytextfield2">
    <input type="text" name="valor_cobrado" id="valor_cobrado" />
    <span class="textfieldRequiredMsg">Valor Inválido.</span><span class="textfieldInvalidFormatMsg"><br />Formato de mo? inv?da.</span></span></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><hr /></td>
    </tr>
  <tr>
    <td align="right">Demonstrativo 1</td>
    <td align="left"><input type="text" name="demonstrativo1" id="demonstrativo1" value="Pagamento Referente a Livros da AWU/LAD/USA" /></td>
  </tr>
  <tr>
    <td align="right">Demonstrativo 2 (Taxa Boleto)</td>
    <td align="left">
      <select name="taxa_boleto" id="taxa_boleto">
        <option value="sim" selected="selected">Sim</option>
        <option value="nao">Não</option>
      </select>
      </td>
  </tr>
  <tr>
    <td align="right">Demonstrativo 3</td>
    <td align="left"><input type="text" name="demonstrativo3" id="demonstrativo3" value="AWU/LAD/USA - http://www.awu.com.br" /></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><hr /></td>
    </tr>
  <tr>
    <td align="right">Descrição 1:</td>
    <td align="left"><input type="text" name="descricao1" id="descricao1" value="Após vencimento multa de 2% a.m + juros 0,03% a.d" /></td>
  </tr>
  <tr>
    <td align="right">Descrição 2:</td>
    <td align="left"><input type="text" name="descricao2" id="descricao2" value="Em caso de dúvidas entre em contato conosco: +55 (21) 3276-3744 ou contato@awu.com.br" /></td>
  </tr>
  <tr>
    <td align="right">Descrição 3:</td>
    <td align="left"><input type="text" name="descricao3" id="descricao3" />
     <a href="#" class="tooltip"><img src="imagens/interrogacao.png" border="0" alt="Tool Tip" />
     <span>Coloque em Descrição 4 o nome do produto com o valor, exemplo:<br />
     		<strong>Descrição 1</strong>: Livro Metodologia da Pesquisa Científica 1 - R$ 50,00 / Livro Didádica e Andragogia - R$ 40,00/<br />
      </span></a>
    </td>
  </tr>
    <tr>
    <td align="right">Descrição 4:</td>
    <td align="left"><input type="text" name="descricao4" id="descricao4" />
   </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="button" id="button" value="Gerar Boleto" /></td>
    </tr>
</table>
</form>
 
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "date", {format:"dd/mm/yyyy", validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "currency", {format:"dot_comma", validateOn:["blur", "change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["blur", "change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {validateOn:["blur", "change"]});
//-->
</script>
</body>
</html>
