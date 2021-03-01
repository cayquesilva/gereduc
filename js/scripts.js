$(function(){
    //Scroll dinamico
    if($('target').length > 0){
        var elemento = '#'+$('target').attr('target');
        var divScroll = $(elemento).offset().top;
        $('html,body').animate({'scrollTop':divScroll},1000)
    }
   //Carregamento dinamico sem atualização de pagina
   carregarDinamico();
   function carregarDinamico() {
       $('[realtime]').click(function(){
           var pagina = $(this).attr('realtime');
           $('.container-principal').html('').load('/projects/gereduc/pages/'+pagina+'.php');
           return false;
       })
   } 
});