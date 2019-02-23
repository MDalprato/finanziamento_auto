<form action="index.php">
  Prezzo chiavi in mano - IPT esclusa: <input type="number" name="pcim" value="46800"><br>  
  Anticipo: <input type="number" name="a" value="468"><br>
  Rata mensile: <input type="numer" name="rm" value="1046.43"><br>
   Numero rate mensili: <input type="numer" name="nr" value="23"><br>
 
Valore futuro garantito (pari alla rata finale residua) : <input type="number" name="vfg" value="25122"><br> 
Spese istruttoria pratica: <input type="number" name="sip" value="300"><br>
Spese di incasso rata (mese): <input type="number" name="sir" value="3"><br>
Costo comunicazioni periodiche (annuo): <input type="number" name="ccp" value="1"><br>
Imposta di bollo/sostitutiva (come per legge addebitata sulla prima rata) <input type="number" name="ibs" value="115"><br>
  
  <input type="submit" value="Calcola">
</form>



<?php
	
	$pcim = $_GET["pcim"];
	$a = $_GET["a"];
	$rm = $_GET["rm"];
	$nr = $_GET["nr"];
	$vfg = $_GET["vfg"];
	$sip = $_GET["sip"];
	$sir = $_GET["sir"];
	$ccp = $_GET["ccp"];
	$ibs = $_GET["ibs"];
	
	$rate_totali = $rm * $nr;
	
	$rate_totali_e_anticipo = $rate_totali + $a;
	$rate_totali_e_anticipo_e_vfg = $rate_totali_e_anticipo + $vfg;
	$sir_totale = $sir * $nr;
	$ccp_totale = ($ccp/12) * $nr;
	$sir_sip_ccp_ibs_totali = $sir_totale + $sip + $ccp_totale + $ibs;
	$investimento_totale =  $rate_totali_e_anticipo_e_vfg + $sir_sip_ccp_ibs_totali;
	$differenza_contanti_investimento = $investimento_totale - $pcim;
	
	$interessi_mensili = $differenza_contanti_investimento / $nr;
	$rata_senza_interessi =  $rm - $interessi_mensili;
	?>
	
	<table border="1">
  <tr>
    <th>Oggetto</th>
    <th>Valore</th>
  </tr>
  <tr>
    <td>Valore auto in contanti</td>
    <td><?php echo $pcim;?></td>
  </tr>
    <tr>
    <td>Rate + anticipo</td>
    <td><?php echo $rate_totali_e_anticipo;?></td>
  </tr>
   <tr>
    <td>Rate + anticipo + valore futuro garantito</td>
    <td><?php echo $rate_totali_e_anticipo_e_vfg;?></td>
  </tr>

   <tr>
    <td>Tasse varie</td>
    <td><?php echo $sir_sip_ccp_ibs_totali;?></td>
  </tr>
 <tr>
    <td>Costo effettivo auto se fatto pagata con il finanziamento</td>
    <td><?php echo $investimento_totale;?></td>
  </tr>
   <tr>
    <td>Interessi regalati alla finanziaria</td>
    <td><?php echo $differenza_contanti_investimento;?></td>
  </tr>
   <tr>
    <td>Interessi mensili pagati</td>
    <td><?php echo $interessi_mensili;?></td>
  </tr>
   <tr>
    <td>Rata mensile se non avesse interessi interessi</td>
    <td><?php echo $rata_senza_interessi;?></td>
  </tr>
</table>
	<?php

	?>