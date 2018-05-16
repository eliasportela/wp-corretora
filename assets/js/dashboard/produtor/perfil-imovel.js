$(document).ready(function(){
 
  // Ao selecionar uma imagem, ela é exibida
  // sem a necessidade de envio para o servidor
  // através e um upload
  function readURL(img){

    if (img.files && img.files[0]) {
            

        var reader = new FileReader();
      
        // Define o que será executado após o carregamento da imagem
        reader.onload = function (e) {

            // Passa para os elementos no DOM as informações
            // sobre a imagem a ser exibida e os textos
            $('#visualizacao_img').attr('src', e.target.result);
            $("#imagem-box").show();
            
            if ($('#visualizacao_img').data('Jcrop')) {
              $('#visualizacao_img').data('Jcrop').destroy();
              $('#visualizacao_img').removeAttr('style');
              $('#visualizacao_img').css({'max-width':'600px','max-height':'300px','width':'auto','height':'auto'});
            }
            // Ativa o recurso de recorte
            $('#visualizacao_img').Jcrop({
              aspectRatio: 10 / 6.5,
              setSelect: [ 100, 100, 300, 300 ],
              onSelect: atualizaCoordenadas,
              onChange: atualizaCoordenadas
            });
            
            // Calcula o tamanho da imagem
            defineTamanhoImagem(e.target.result,$('#visualizacao_img'));
        }
 
        // Carrega a imagem e chama o 'reader.onload'
        reader.readAsDataURL(img.files[0]);
        
    
    }    
      
      $('#botaoSelecionarImagemImovel').css("display","none");

  };

  $("#imgImovel").change(function(){
          readURL(this);
    });
    

})
 
// Faz a atualização das coordenadas em relação ao ponto de corte
// cada vez que esse é modificado
// É chamado nos eventos onSelect e onChange do jCrop
function atualizaCoordenadas(c)
{
  $('#x').val(c.x);
  $('#y').val(c.y);
  $('#wcrop').val(c.w);
  $('#hcrop').val(c.h);
};
 
// Faz a verificação e define o tamanho da imagem original
// e da imagem na área de visualização para o recorte
function defineTamanhoImagem(imgOriginal, imgVisualizacao) {
  var image = new Image();
  image.src = imgOriginal;
 
  image.onload = function() {
    $('#wvisualizacao').val(imgVisualizacao.width());
    $('#hvisualizacao').val(imgVisualizacao.height());
    $('#woriginal').val(this.width);
    $('#horiginal').val(this.height);
  };
}