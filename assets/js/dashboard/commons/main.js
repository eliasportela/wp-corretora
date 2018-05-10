var myVar;
var audioElement = document.createElement('audio');
audioElement.setAttribute('src', 'http://www.soundjay.com/misc/sounds/bell-ringing-01.mp3');

buscarNovosContatos();

ajaxBuscarContato();

function buscarNovosContatos() {
    myVar = setInterval(ajaxBuscarContato, 30000);
}

function ajaxBuscarContato() {
 	$.get(base_urla+'admin/notificacao-pedido', function(res) { 
       	data = JSON.parse(res); 	
    })
    .done(function(){

        if (data.qtd == 0) {
            $('#qtdContato').html('');
        }else{
            $('#qtdContato').html(data.qtd);
        }
        //se tiver registro na localsotorage
        if (localStorage.getItem('notificacao')) {
            noti = localStorage.getItem('notificacao')
            localStorage.setItem('notificacao',data.qtd);
            //se as notificacoes no banco forem maior q na local = novas notificacoes
            if (data.qtd > noti) {
                $('#qtdContato').html(data.qtd);
                audioElement.play();
            }  
        }else{//se nao houver resgistros
            
            //se as notificacoes no banco existirem
            if (data.qtd > 0) {
        		$('#qtdContato').html(data.qtd);	
                audioElement.play();
                localStorage.setItem('notificacao',data.qtd);
        	}
        }

    });   
}