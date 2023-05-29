<h4 class="text-center text-danger">Olá <b>{$USER}</b>, seja bem vindo! O que deseja fazer agora?</h4>
<section id="ds_dd" class="row">
		
		<div class="text-center ">
			
			<a id="font_ss" href="{$PAG_CONTA}" class="btn btn-cssc"><i class="glyphicon glyphicon-home"></i> Minha Conta</a><c></c>
			<a id="font_ss" href="{$PAG_CLIENTE_PEDIDOS}" class="btn btn-cssc"><i class="glyphicon glyphicon-barcode"></i> Pedidos</a><c></c>
			<a id="font_ss" href="{$PAG_CLIENTE_DADOS}" class="btn btn-cssc"><i class="glyphicon glyphicon-edit"></i> Meus Dados</a><c></c>
			<a id="font_ss" href="{$PAG_CARRINHO}" class="btn btn-cssc"><i class="glyphicon glyphicon-shopping-cart"></i> Carrinho</a><c></c>
			<a id="font_ss" href="{$PAG_CLIENTE_SENHA}" class="btn btn-cssc"><i class="glyphicon glyphicon-exclamation-sign"></i> Alterar Senha</a><c></c>
			<a id="font_ss" href="{$PAG_LOGOFF}" class="btn btn-danger"><i class="glyphicon glyphicon-log-out"></i> Sair da conta</a>
						

		</div>

</section>
<hr/>
<script>
	
	// let h_s = document.createElement('h2');
	// document.getElementsByTagName('body')[0].appendChild(h_s);

	let limitador = 0;

	setInterval(() => {
		// h_s.innerText = 'Width: ' + innerWidth + ' Height: ' + innerHeight;
		if (innerWidth <= 990) {			
			if(limitador < 1){
				limitador += 1;
		 		// console.log('pequena')  
		 		limitador = 2;		
		 		document.querySelector("#ds_dd").style = `

		 		`
		 		for(let i = 0;i < document.getElementsByTagName('c').length;i++){
		 				document.getElementsByTagName('c')[i].innerHTML = '<br/><br/>';
		 				document.querySelectorAll('#font_ss')[i].style.fontSize = 18 + 'px';	 					
		 		}
		 		 

		 	
		 	 
		 		// style="font-size: 18px;"

			
			}
		}
		if (innerWidth >= 1280) {
			if(limitador < 1){
				limitador += 1;
		 		// console.log('Grande')  		 	
			}	
		}
	})

</script>