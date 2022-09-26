<?php
	
	require_once "conexaoSQL/Conexao.php";
	
	date_default_timezone_set('America/Sao_Paulo');
	
	$hojeSistema = date('Y.m.d');
	
	$datahoje = date('Y.m.d 00:00:00');
		
	$hoje = date('Y'); //PEGA DATA ATUAL PARA PREENCHER AUTOMATICO NA BAIXA
	
	$data = date('d/m/Y');
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		
			<link rel="shortcut icon" type="imagex/png" href="fav.png">
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Sistema Cálculo de Parceiros</title>

			<!--Carrega as bibliotecas JavaSript para as máscaras de CPF, Celular, etc. -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.9/jquery.inputmask.bundle.min.js"></script>

			<!--CHAMANDO O ARQUIVO CSS E JAVA SCRIPT-->
			<link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />
			<link rel="stylesheet" type="text/javascript" href="javascript/javascript.js" media="screen" />
			
			<script type="text/javascript">
				function limitText(limitField, limitNum) { //FUNÇÃO PARA TRAVAR OS 11 CARACTERES DO CPF E OS 44 DO CONHECIMENTO
					if (limitField.value.length > limitNum) {
						limitField.value = limitField.value.substring(0, limitNum);
					}
				}	
			</script>

		</head>
		
	<!---------------------------COMEÇANDO CORPO DA PÁGINA---------------------------->

	<body>
		
		<!-- =========================================== ********************************** ==============================
			===================================================== DIV CABECALHO ============================================
			=========================================== ********************************======================================-->
		
		<div id="cabecalho" style="z-index:1000;background-color: white;   display: flex;  align-items: center; box-shadow: 0 3px 0 rgba(0, 0, 0, .3),  0 2px 7px rgba(0, 0, 0, 0.2);    color: black;  height:3.2rem; top:0px; left:0px; 
		margin: 0 auto;     position:fixed;      width: 100%; "> 
			 &nbsp; <img src="inicial.png" title="Página Inicial" style="width: 110px; height: 38px; text-align: center;" />
				
			<label onclick="mostraPrincipal()" title="Tela Inicial" for="logins" style="cursor: pointer; text-align: center; margin-left:-7rem; font-size: 1.1rem; font-weight:normal; margin-top: -1.2rem;"><br>Sistema Cálculo de Parceiros</label>  
		
			<label class="botaoSair" style=" display: flex;  align-items: center; text-align: center; position:fixed; margin-top:-0.1rem;  right:7rem; width: 9rem;  color: white; font-size: 0.9rem;
			height: 1.7rem;   background-color: gray; border-radius:5px; text-align:center; z-index:1000;">&nbsp;Versão 1.4.22</label>
		
			
				<label class="botaoSair" style=" display: flex;  align-items: center; text-align: center; position:fixed; margin-top:0rem; right:5px; width: 6rem;  cursor:pointer; color: white; font-size: 1rem;
				height: 1.7rem;   background-color: #f24a4a; border-radius:5px; text-align:center; z-index:1000;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sair</label>
					
		</div>
		
		
		<!-- =========================================== ********************************** ==============================
		====================================================== DIV PRINCIPAL =============================
		=========================================== ********************************======================================-->
		
		<div id="login-container" style=" margin-top:4rem; margin-left:1rem; width:97%; height: 90%;">
		
			<form action="" method="get" enctype="multipart/form-data">
				<label style='margin-left:0rem; width: 100%; height: 3.6rem;font-size: 0.9rem; color: white; background-color: #eb7171; 
					margin-top:-0.5rem; text-align:center; font-weight: bold; border-radius:5px; display: flex; justify-content: center; align-items: center; '>
					&nbsp;ESCANEAR DOCUMENTO PARA CÁLCULO: &nbsp;
					<input type="text" id="sonumero" value="" name="chavecte" class="somente-numero" title="Chave CT-e" onKeyDown="limitText(this,44);" onKeyUp="limitText(this,44);" 
					placeholder="CHAVE CT-e" style="margin-top: 1rem; color: white; font-size: 0.9rem; width: 30rem; height: 2rem; text-align: center; background-color: transparent;
					border-radius: 10px 5px; border-color:white; border-width:2px;"/>
					<!-- BOTÃO ENVIAR--><input type="submit" value="Calcular" class="botao01" style="margin-top: 1rem; font-size: 0.9rem;  background-color: #eb4949; width: 10rem; height: 2.2rem; border-radius: 6px;">  
				</label>
			</form>
					
			<?php
				try {
					$Conexao    = Conexao::getConnection(); 
					
					
					$usuarios2   = $query2->fetchAll();
				
						echo "<table>";
							echo "<tr>";
								echo "<td><label style='height: 2rem;font-size: 0.9rem; color: white; background-color: #3582cc ; 
										margin-top:-0.5rem; text-align:left; font-weight: bold; border-radius:5px; display: flex; justify-content: center; align-items: center; '>FILIAL</label><br></td>";
										
								echo "<td><label style='height: 2rem;font-size: 0.9rem; color: white; background-color: #3582cc ; 
										margin-top:-0.5rem; text-align:left; font-weight: bold; border-radius:5px; display: flex; justify-content: center; align-items: center; '>TIPO</label><br></td>";
									
								echo "<td><label style=' height: 2rem;font-size: 0.9rem; color: white; background-color: #3582cc; 
										margin-top:-0.5rem; text-align:left; font-weight: bold; border-radius:5px; display: flex; justify-content: center; align-items: center; '>CTO</label><br></td>";
										
								echo "<td><label style=' height: 2rem;font-size: 0.9rem; color: white; background-color: #3582cc; 
										margin-top:-0.5rem; text-align:left; font-weight: bold; border-radius:5px; display: flex; justify-content: center; align-items: center; '>DESTINATÁRIO</label><br></td>";
								
								echo "<td><label style='height: 2rem;font-size: 0.9rem; color: white; background-color: #3582cc; 
										margin-top:-1.6rem; text-align:center; font-weight: bold; border-radius:5px; display: flex; justify-content: center; align-items: center; '>DATA EMISSÃO</td>";
								
								echo "<td><label style=' width: 7rem; height: 2rem;font-size: 0.9rem; color: white; background-color: #3582cc; 
										margin-top:-0.5rem; text-align:left; font-weight: bold; border-radius:5px; display: flex; justify-content: center; align-items: center; '>PESO</label><br></td>";
								
								echo "<td><label style='width: 8rem; height: 2rem;font-size: 0.9rem; color: white; background-color: #3582cc; 
										margin-top:-0.5rem; text-align:left; font-weight: bold; border-radius:5px; display: flex; justify-content: center; align-items: center; '>PESO CUBADO</label><br></td>";
								
								echo "<td><label style='width: 8rem; height: 2rem;font-size: 0.9rem; color: white; background-color: #3582cc; 
										margin-top:-0.5rem; text-align:left; font-weight: bold; border-radius:5px; display: flex; justify-content: center; align-items: center; '>TOTAL FRETE</label><br></td>";
										
								echo "<td><label style='width: 13rem; height: 2rem;font-size: 0.9rem; color: white; background-color: #3582cc; 
										margin-top:-0.5rem; text-align:left; font-weight: bold; border-radius:5px; display: flex; justify-content: center; align-items: center; '>CIDADE DESTINO</label><br></td>";
									
								echo "<td><label style='width:3rem; height: 2rem;font-size: 0.9rem; color: white; background-color: #3582cc; 
										margin-top:-0.5rem; text-align:left; font-weight: bold; border-radius:5px; display: flex; justify-content: center; align-items: center; '>UF</label><br></td>";
							
							echo "</tr>";
								
						
						foreach($usuarios2 as $busca_usuario2) {		
														
							echo "<tr>";								
								echo "<td>";
									echo "<label style=' height: 1.6rem;font-size: 0.7rem; color: black; background-color: #ebf0f5; 
									margin-top:-1.1rem; text-align:left; font-weight: normal; border-radius:5px; display: flex; justify-content: 
									center; align-items: center;'>".$busca_usuario2['xxxx']."</label><br>";
								echo "</td>";
								echo "<td>";
									echo "<label style='height: 1.6rem;font-size: 0.7rem; color: black; background-color: #ebf0f5; 
									margin-top:-1.1rem; text-align:left; font-weight: normal; border-radius:5px; display: flex; justify-content: 
									center; align-items: center;'>".$busca_usuario2['yyyyy']."</label><br>";
								echo "</td>";
								echo "<td>";
									echo "<label style='height: 1.6rem;font-size: 0.7rem; color: black; background-color: #ebf0f5; 
									margin-top:-1.1rem; text-align:left; font-weight: normal; border-radius:5px; display: flex; justify-content: 
									center; align-items: center;'>".$busca_usuario2['zzzzzzzz']."</label><br>";
								echo "</td>";
								echo "<td>";
									echo "<label style='height: 1.6rem;font-size: 0.7rem; color: black; background-color: #ebf0f5; 
									margin-top:-1.1rem; text-align:left; font-weight: normal; border-radius:5px; display: flex; justify-content: 
									center; align-items: center;'>".$busca_usuario2['kkkkkkk']."</label><br>";
								echo "</td>";
								echo "<td>";
									echo "<label style='; height: 1.6rem;font-size: 0.7rem; color: black; background-color: #ebf0f5; 
									margin-top:-1.1rem; text-align:left; font-weight: normal; border-radius:5px; display: flex; justify-content: 
									center; align-items: center;'>".$busca_usuario2['1']."</label><br>";
								echo "</td>";
								echo "<td>";
									echo "<label style=' height: 1.6rem;font-size: 0.7rem; color: black; background-color: #ebf0f5; 
									margin-top:-1.1rem; text-align:left; font-weight: normal; border-radius:5px; display: flex; justify-content: 
									center; align-items: center;'>".$busca_usuario2['2']."</label><br>";
								echo "</td>";
								echo "<td>";
									echo "<label style=' width: 8rem; height: 1.6rem;font-size: 0.7rem; color: black; background-color: #ebf0f5; 
									margin-top:-1.1rem; text-align:left; font-weight: normal; border-radius:5px; display: flex; justify-content: 
									center; align-items: center;'>".$busca_usuario2['3']."</label><br>";
								echo "</td>";
								echo "<td>";
									echo "<label style=' width: 8rem; height: 1.6rem;font-size: 0.7rem; color: black; background-color: #ebf0f5; 
									margin-top:-1.1rem; text-align:left; font-weight: normal; border-radius:5px; display: flex; justify-content: 
									center; align-items: center;'>R$ ".$busca_usuario2['4']."</label><br>";
								echo "</td>";
								echo "<td>";
									echo "<label style=' height: 1.6rem;font-size: 0.7rem; color: black; background-color: #ebf0f5; 
									margin-top:-1.1rem; text-align:left; font-weight: normal; border-radius:5px; display: flex; justify-content: 
									center; align-items: center;'>".$busca_usuario2['5']."</label><br>";
								echo "</td>";
								echo "<td>";
									echo "<label style=' height: 1.6rem;font-size: 0.7rem; color: black; background-color: #ebf0f5; 
									margin-top:-1.1rem; text-align:left; font-weight: normal; border-radius:5px; display: flex; justify-content: 
									center; align-items: center;'>".$busca_usuario2['6']."</label><br>";
								echo "</td>";
							echo "</tr>";
						}
						echo "</table>";
					}	catch (Exception $e){	}
				?>
		
				<label style='margin-left:0rem; width: 100%; height: 3.6rem;font-size: 0.9rem; color: white; background-color: #3582cc; 
							margin-top:-0.5rem; text-align:center; font-weight: bold; border-radius:5px; display: flex; justify-content: center; align-items: center; '>&nbsp;POSSÍVEIS PARCEIROS: <?php echo $cidade_destino;?>&nbsp;</label><br>
				
				<?php
				try {
					$Conexao    = Conexao::getConnection(); 
					
					$usuarios2   = $query2->fetchAll();
				
						echo "<table>";
							echo "<tr>";
								echo "<td><label style='height: 2rem;font-size: 0.9rem; color: white; background-color: green ; 
										margin-top:-0.5rem; text-align:left; font-weight: bold; border-radius:5px; display: flex; justify-content: center; align-items: center; '>PARCEIRO 01</label><br></td>";
									
								echo "<td><label style=' height: 2rem;font-size: 0.9rem; color: white; background-color: green; 
										margin-top:-0.5rem; text-align:left; font-weight: bold; border-radius:5px; display: flex; justify-content: center; align-items: center; '>PARCEIRO 02</label><br></td>";
										
								echo "<td><label style=' height: 2rem;font-size: 0.9rem; color: white; background-color: green; 
										margin-top:-0.5rem; text-align:left; font-weight: bold; border-radius:5px; display: flex; justify-content: center; align-items: center; '>PARCEIRO 03</label><br></td>";
								
								echo "<td><label style='height: 2rem;font-size: 0.9rem; color: white; background-color: green; 
										margin-top:-1.6rem; text-align:center; font-weight: bold; border-radius:5px; display: flex; justify-content: center; align-items: center; '>PARCEIRO 04</td>";
								
								echo "<td><label style=' width: 7rem; height: 2rem;font-size: 0.9rem; color: white; background-color: green; 
										margin-top:-0.5rem; text-align:left; font-weight: bold; border-radius:5px; display: flex; justify-content: center; align-items: center; '>PARCEIRO 05</label><br></td>";
								
								echo "<td><label style='width: 8rem; height: 2rem;font-size: 0.9rem; color: white; background-color: green; 
										margin-top:-0.5rem; text-align:left; font-weight: bold; border-radius:5px; display: flex; justify-content: center; align-items: center; '>PARCEIRO 06</label><br></td>";
																
							echo "</tr>";								
											
						foreach($usuarios2 as $busca_usuario2) {
												
							echo "<tr>";
							
								// ====================== ------------------------------------- =======================
								// ====================== CALCULO DO PRIMEIRO POSSÍVEL PARCEIRO =======================
								// ====================== ------------------------------------- =======================
								
								echo "<td>";
									
									if($busca_usuario2['PARCEIRO1'] == NULL){
										echo "<label style=' height: 1.6rem;font-size: 0.7rem; color: black; background-color: #ebf0f5; 
									margin-top:-1.1rem; text-align:left; font-weight: normal; border-radius:5px; display: flex; justify-content: 
									center; align-items: center;'>-</label><br>";	
									}	
									else{						
						
										$usuarios3   = $query3->fetchAll();
										
										foreach($usuarios3 as $busca_usuario3) {
											
											
											$tarifa_parceiro1 = $busca_usuario3['TARIFA']; ///SALVA A TARIFA EM UMA VARIAVEL
											
											echo "<label style=' height: 1.6rem;font-size: 0.7rem; color: black; background-color: #ebf0f5; 
											margin-top:-1.1rem; text-align:left; font-weight: normal; border-radius:5px; display: flex; justify-content: 
											center; align-items: center;'>".$tarifa_parceiro1."</label><br>";											
										}
										
										// ====================== ------------------------------------- =======================
										// ====================== ESTE SELECT PARA PEGAR TODAS AS INFORMAÇÕES =================
										// ============ PARA REALIZAR O CÁLCULO ATRAVÉS DA TARIFA ENCONTRADA NO BANCO ==========
										// ====================== ------------------------------------- =======================
																										
										$usuarios3   = $query3->fetchAll();
										
										foreach($usuarios3 as $busca_usuario3) {
																
											$valor_por_kg = $valor_por_kg/1000; ///DIVIDE POR 100 PARA CONVERTER		
											
											$ad_valorem = $ad_valorem/100; ///DIVIDE POR 100 PARA CONVERTER A %																													
											
											$base_calculo = $total_frete - $agd - $icms; //RETIRA O AGD E ICMS DO DOCUMENTO PARA REALIZAR A BASE DE CÁLCULO
											
											$resultado_parceiro1 = $base_calculo * $ad_valorem; ///REALIZA O CÁLCULO : BASE DE CALCULO SEM TAXAS * ADVALOREM DO PARCEIRO 1
											
											// ============ REALIZA O ÚLTIMO CÁLCULO PARA COMPARAR SE RESULTADO DO ADVALOREM É MAIOR QUE O VALOR MÍNIMO
											
											if($resultado_parceiro1 > $valor_minimo_parceiro1){ $resultado_final_parceiro1 = $resultado_parceiro1; } 
											else { $resultado_final_parceiro1 = $valor_minimo_parceiro1; }
											
											// ====================== ------------------------------------- =======================
											//VERIFICA SE PARCEIRO CALCULA POR ADVALOREM OU POR PESO MINIMO
											// ====================== ------------------------------------- =======================
											
											echo "<label style=' font-size: 0.7rem; color: black; background-color: #ebf0f5; 
											margin-top:-1.1rem; text-align:left; font-weight: normal; border-radius:5px; display: flex; justify-content: 
											center; align-items: center;'>AGD: ".$agd."<br> ICMS: ".$icms."<br> BASE DE CÁLCULO SEM TAXAS: ".$base_calculo."<br> ADVALOREM: "
											.$ad_valorem."%<br> PRIMEIRO CÁLCULO: R$ ".substr($resultado_parceiro1,0,-2)."<br> VALOR MÍNIMO: R$ ".$valor_minimo_parceiro1.
											"<br> PESO MÍNIMO: R$ ".$valor_peso_minimo."<br>RESULTADO: R$".$resultado_final_parceiro1."</label><br>";											
										}
									}
								echo "</td>";
								
								// ====================== ------------------------------------- =======================
								// ====================== CALCULO DO SEGUNDO POSSÍVEL PARCEIRO =======================
								// ====================== ------------------------------------- =======================
								
								echo "<td>";
								
									if($busca_usuario2['xxx'] == NULL){
										echo "<label style=' height: 1.6rem;font-size: 0.7rem; color: black; background-color: #ebf0f5; 
									margin-top:-1.1rem; text-align:left; font-weight: normal; border-radius:5px; display: flex; justify-content: 
									center; align-items: center;'>-</label><br>";	
									}	
									else{
																
										$usuarios3   = $query3->fetchAll();
										
										foreach($usuarios3 as $busca_usuario3) {
											
											
											$tarifa_parceiro2 = $busca_usuario3['oo']; ///SALVA A TARIFA EM UMA VARIAVEL
											
											echo "<label style=' height: 1.6rem;font-size: 0.7rem; color: black; background-color: #ebf0f5; 
											margin-top:-1.1rem; text-align:left; font-weight: normal; border-radius:5px; display: flex; justify-content: 
											center; align-items: center;'>".$tarifa_parceiro2."</label><br>";											
										}
										
										// ====================== ------------------------------------- =======================
										// ====================== ESTE SELECT PARA PEGAR TODAS AS INFORMAÇÕES =================
										// ============ PARA REALIZAR O CÁLCULO ATRAVÉS DA TARIFA ENCONTRADA NO BANCO ==========
										// ====================== ------------------------------------- =======================
										
										$usuarios3   = $query3->fetchAll();
										
										foreach($usuarios3 as $busca_usuario3) {
											
											$categoria = $busca_usuario3['1']; ///SALVA A CATEGORIA PARA SABER O QUE DE FATO IRÁ CALCULAR, SE SOBRE FAIXA DE PESO, ADVALOREM OU ETC...
											
											$valor_peso_minimo = $busca_usuario3['2']; ///
											
											$valor_por_kg = $busca_usuario3['3']; /// ====== CALCULA VALOR POR KG
											
											$valor_por_kg = $valor_por_kg/1000; ///DIVIDE POR 100 PARA CONVERTER		
											
											$ad_valorem = $busca_usuario3['4']; ///SALVA ADVALOREM EM UMA VARIAVEL
											
											$ad_valorem = $ad_valorem/100; ///DIVIDE POR 100 PARA CONVERTER A %																													
											
											$base_calculo = $total_frete - $agd - $icms; //RETIRA O AGD E ICMS DO DOCUMENTO PARA REALIZAR A BASE DE CÁLCULO
											
											$resultado_parceiro1 = $base_calculo * $ad_valorem; ///REALIZA O CÁLCULO : BASE DE CALCULO SEM TAXAS * ADVALOREM DO PARCEIRO 1
											
											$valor_minimo_parceiro1 = $busca_usuario3['5']; ///PEGA O VALOR MINIMO DO PARCEIRO 1
											
											// ============ REALIZA O ÚLTIMO CÁLCULO PARA COMPARAR SE RESULTADO DO ADVALOREM É MAIOR QUE O VALOR MÍNIMO
											
											if($resultado_parceiro1 > $valor_minimo_parceiro1){ $resultado_final_parceiro2 = $resultado_parceiro1; } 
											else { $resultado_final_parceiro2 = $valor_minimo_parceiro1; }
											
											if($categoria == "PESO FAIXA"){
												
												$excedente = $busca_usuario3['1']; ///PEGA O VALOR DO EXCEDENTE
												
												$faixas_ate = $busca_usuario3['2']; ///PEGA O MÁXIMO DAQUELA FAIXA
												
												$frete_na_faixa = $busca_usuario3['3']; ///VALOR DO FRETE NAQUELA FAIXA
												
												if($peso < $faixas_ate){
													$resultado_final_parceiro2 = $frete_na_faixa;
												}
												else{
													$calcula_excedente = $peso-$faixas_ate; //RETIRA OS 100 DO LIMITE PARA PEGAR APENAS QUANTOS KG FORAM EXCEDENTES
													$calcula_excedente = $calcula_excedente * $excedente; //MULTIPLICA O EXCEDENTE PELO VALOR DO KG
													$resultado_final_parceiro2 = $frete_na_faixa + $calcula_excedente; //RESULTADO FINAL: SOMA O MINIMO + EXCEDENTE :)
												}
												
											}
											
											else{												
												// ====================== ------------------------------------- =======================
												//VERIFICA SE PARCEIRO CALCULA POR ADVALOREM OU POR PESO MINIMO
												// ====================== ------------------------------------- =======================
												
												if($ad_valorem == 0){ 
												
													if($peso < 100){
														$resultado_final_parceiro2 = $valor_peso_minimo;
													}
													else {													
														$calcula_excedente = $peso-100; //RETIRA OS 100 DO LIMITE PARA PEGAR APENAS QUANTOS KG FORAM EXCEDENTES
														$calcula_excedente = $calcula_excedente * $valor_por_kg; //MULTIPLICA O EXCEDENTE PELO VALOR DO KG
														$resultado_final_parceiro2 = $valor_peso_minimo + $calcula_excedente; //RESULTADO FINAL: SOMA O MINIMO + EXCEDENTE :)
													}												 
												
												}
											}
											echo "<label style=' font-size: 0.7rem; color: black; background-color: #ebf0f5; 
											margin-top:-1.1rem; text-align:left; font-weight: normal; border-radius:5px; display: flex; justify-content: 
											center; align-items: center;'>AGD: ".$agd."<br> ICMS: ".$icms."<br> BASE DE CÁLCULO SEM TAXAS: ".$base_calculo."<br> ADVALOREM: "
											.$ad_valorem."%<br> PRIMEIRO CÁLCULO: R$ ".substr($resultado_parceiro1,0,-2)."<br> VALOR MÍNIMO: R$ ".$valor_minimo_parceiro1.
											"<br> PESO MÍNIMO: R$ ".$valor_peso_minimo."<br>RESULTADO: R$".$resultado_final_parceiro2."</label><br>";											
										}
									}
								echo "</td>";
								
								// ====================== ------------------------------------- =======================
								// ====================== CALCULO DO TERCEIRO POSSÍVEL PARCEIRO =======================
								// ====================== ------------------------------------- =======================
								
								echo "<td>";
								
								if($busca_usuario2['3'] == NULL){
										echo "<label style=' height: 1.6rem;font-size: 0.7rem; color: black; background-color: #ebf0f5; 
									margin-top:-1.1rem; text-align:left; font-weight: normal; border-radius:5px; display: flex; justify-content: 
									center; align-items: center;'>-</label><br>";	
									}	
									else{
																
										$usuarios3   = $query3->fetchAll();
										
										foreach($usuarios3 as $busca_usuario3) {											
											
											$tarifa_parceiro3 = $busca_usuario3['3']; ///SALVA A TARIFA EM UMA VARIAVEL
											
											echo "<label style=' height: 1.6rem;font-size: 0.7rem; color: black; background-color: #ebf0f5; 
											margin-top:-1.1rem; text-align:left; font-weight: normal; border-radius:5px; display: flex; justify-content: 
											center; align-items: center;'>".$tarifa_parceiro3."</label><br>";											
										}
										
										// ====================== ------------------------------------- =======================
										// ====================== ESTE SELECT PARA PEGAR TODAS AS INFORMAÇÕES =================
										// ============ PARA REALIZAR O CÁLCULO ATRAVÉS DA TARIFA ENCONTRADA NO BANCO ==========
										// ====================== ------------------------------------- =======================
																				
										$usuarios3   = $query3->fetchAll();
										
										foreach($usuarios3 as $busca_usuario3) {
											
											$valor_peso_minimo = $busca_usuario3['3']; ///
											
											$valor_por_kg = $busca_usuario3['3']; /// ====== CALCULA VALOR POR KG
											
											$valor_por_kg = $valor_por_kg/1000; ///DIVIDE POR 100 PARA CONVERTER		
											
											$ad_valorem = $busca_usuario3['3']; ///SALVA ADVALOREM EM UMA VARIAVEL
											
											$ad_valorem = $ad_valorem/100; ///DIVIDE POR 100 PARA CONVERTER A %																													
											
											$base_calculo = $total_frete - $agd - $icms; //RETIRA O AGD E ICMS DO DOCUMENTO PARA REALIZAR A BASE DE CÁLCULO
											
											$resultado_parceiro1 = $base_calculo * $ad_valorem; ///REALIZA O CÁLCULO : BASE DE CALCULO SEM TAXAS * ADVALOREM DO PARCEIRO 1
											
											$valor_minimo_parceiro1 = $busca_usuario3['3']; ///PEGA O VALOR MINIMO DO PARCEIRO 1
											
											// ============ REALIZA O ÚLTIMO CÁLCULO PARA COMPARAR SE RESULTADO DO ADVALOREM É MAIOR QUE O VALOR MÍNIMO
											
											if($resultado_parceiro1 > $valor_minimo_parceiro1){ $resultado_final_parceiro1 = $resultado_parceiro1; } 
											else { $resultado_final_parceiro1 = $valor_minimo_parceiro1; }
											
											// ====================== ------------------------------------- =======================
											//VERIFICA SE PARCEIRO CALCULA POR ADVALOREM OU POR PESO MINIMO
											// ====================== ------------------------------------- =======================
											
											if($ad_valorem == 0){ 
											
												if($peso < 100){
													$resultado_final_parceiro1 = $valor_peso_minimo;
												}
												else {													
													$calcula_excedente = $peso-100; //RETIRA OS 100 DO LIMITE PARA PEGAR APENAS QUANTOS KG FORAM EXCEDENTES
													$calcula_excedente = $calcula_excedente * $valor_por_kg; //MULTIPLICA O EXCEDENTE PELO VALOR DO KG
													$resultado_final_parceiro1 = $valor_peso_minimo + $calcula_excedente; //RESULTADO FINAL: SOMA O MINIMO + EXCEDENTE :)
												}												 
											
											}
											
											echo "<label style=' font-size: 0.7rem; color: black; background-color: #ebf0f5; 
											margin-top:-1.1rem; text-align:left; font-weight: normal; border-radius:5px; display: flex; justify-content: 
											center; align-items: center;'>AGD: ".$agd."<br> ICMS: ".$icms."<br> BASE DE CÁLCULO SEM TAXAS: ".$base_calculo."<br> ADVALOREM: "
											.$ad_valorem."%<br> PRIMEIRO CÁLCULO: R$ ".substr($resultado_parceiro1,0,-2)."<br> VALOR MÍNIMO: R$ ".$valor_minimo_parceiro1.
											"<br> PESO MÍNIMO: R$ ".$valor_peso_minimo."<br>RESULTADO: R$".$resultado_final_parceiro1."</label><br>";											
										}
									}
								echo "</td>";
								
								// ====================== ------------------------------------- =======================
								// ====================== CALCULO DO QUARTO POSSÍVEL PARCEIRO =======================
								// ====================== ------------------------------------- =======================
								
								echo "<td>";
								
									if($busca_usuario2['4'] == NULL){
										echo "<label style=' height: 1.6rem;font-size: 0.7rem; color: black; background-color: #ebf0f5; 
									margin-top:-1.1rem; text-align:left; font-weight: normal; border-radius:5px; display: flex; justify-content: 
									center; align-items: center;'>-</label><br>";	
									}	
									else{
									
										$usuarios3   = $query3->fetchAll();
										
										foreach($usuarios3 as $busca_usuario3) {											
											
											$tarifa_parceiro4 = $busca_usuario3['4']; ///SALVA A TARIFA EM UMA VARIAVEL
											
											echo "<label style=' height: 1.6rem;font-size: 0.7rem; color: black; background-color: #ebf0f5; 
											margin-top:-1.1rem; text-align:left; font-weight: normal; border-radius:5px; display: flex; justify-content: 
											center; align-items: center;'>".$tarifa_parceiro4."</label><br>";											
										}
										
										// ====================== ------------------------------------- =======================
										// ====================== ESTE SELECT PARA PEGAR TODAS AS INFORMAÇÕES =================
										// ============ PARA REALIZAR O CÁLCULO ATRAVÉS DA TARIFA ENCONTRADA NO BANCO ==========
										// ====================== ------------------------------------- =======================
									
										$usuarios3   = $query3->fetchAll();
										
										foreach($usuarios3 as $busca_usuario3) {
											
											$valor_peso_minimo = $busca_usuario3['4']; ///
											
											$valor_por_kg = $busca_usuario3['4']; /// ====== CALCULA VALOR POR KG
											
											$valor_por_kg = $valor_por_kg/1000; ///DIVIDE POR 100 PARA CONVERTER		
											
											$ad_valorem = $busca_usuario3['4']; ///SALVA ADVALOREM EM UMA VARIAVEL
											
											$ad_valorem = $ad_valorem/100; ///DIVIDE POR 100 PARA CONVERTER A %																													
											
											$base_calculo = $total_frete - $agd - $icms; //RETIRA O AGD E ICMS DO DOCUMENTO PARA REALIZAR A BASE DE CÁLCULO
											
											$resultado_parceiro1 = $base_calculo * $ad_valorem; ///REALIZA O CÁLCULO : BASE DE CALCULO SEM TAXAS * ADVALOREM DO PARCEIRO 1
											
											$valor_minimo_parceiro1 = $busca_usuario3['4']; ///PEGA O VALOR MINIMO DO PARCEIRO 1
											
											// ============ REALIZA O ÚLTIMO CÁLCULO PARA COMPARAR SE RESULTADO DO ADVALOREM É MAIOR QUE O VALOR MÍNIMO
											
											if($resultado_parceiro1 > $valor_minimo_parceiro1){ $resultado_final_parceiro1 = $resultado_parceiro1; } 
											else { $resultado_final_parceiro1 = $valor_minimo_parceiro1; }
											
											// ====================== ------------------------------------- =======================
											//VERIFICA SE PARCEIRO CALCULA POR ADVALOREM OU POR PESO MINIMO
											// ====================== ------------------------------------- =======================
											
											if($ad_valorem == 0){ 
											
												if($peso < 100){
													$resultado_final_parceiro1 = $valor_peso_minimo;
												}
												else {													
													$calcula_excedente = $peso-100; //RETIRA OS 100 DO LIMITE PARA PEGAR APENAS QUANTOS KG FORAM EXCEDENTES
													$calcula_excedente = $calcula_excedente * $valor_por_kg; //MULTIPLICA O EXCEDENTE PELO VALOR DO KG
													$resultado_final_parceiro1 = $valor_peso_minimo + $calcula_excedente; //RESULTADO FINAL: SOMA O MINIMO + EXCEDENTE :)
												}												 
											
											}
											
											echo "<label style=' font-size: 0.7rem; color: black; background-color: #ebf0f5; 
											margin-top:-1.1rem; text-align:left; font-weight: normal; border-radius:5px; display: flex; justify-content: 
											center; align-items: center;'>AGD: ".$agd."<br> ICMS: ".$icms."<br> BASE DE CÁLCULO SEM TAXAS: ".$base_calculo."<br> ADVALOREM: "
											.$ad_valorem."%<br> PRIMEIRO CÁLCULO: R$ ".substr($resultado_parceiro1,0,-2)."<br> VALOR MÍNIMO: R$ ".$valor_minimo_parceiro1.
											"<br> PESO MÍNIMO: R$ ".$valor_peso_minimo."<br>RESULTADO: R$".$resultado_final_parceiro1."</label><br>";											
										}
									}
								echo "</td>";
																
							echo "</tr>";
							
						}
						echo "</table>";
					}	catch (Exception $e){	}
				?>
				
		
		</div>
		
		
		<!-- =========================================== ********************************** ===========================
		======================================================== DIV RODAPÉ ===========================================
		=========================================== ********************************======================================-->
		<div id="rodape">
			<label style="background-color: #042f66;    text-align: center;    font-weight:normal;    width:100%;
			color:white;     position:fixed;     bottom:0px;       font-size: 0.9rem;    height: 1.8rem;">
				<?php echo date('Y'); ?> 
			</label>
		</div>
			
	</body>
	
</html>
