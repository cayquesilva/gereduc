$(function(){

    var open = true;
    var windowSize = $(window)[0].innerWidth;
    var calcWindow = windowSize-300;
    if(windowSize <= 768){
        open = false;
        $('.menu').css('width','0').css('padding','0');
    }

    $('.menu-btn').click(function(){
        if(open){
            //menu aberto
            $('.menu').animate({'width':'0','padding':'0'});
            $('header,.content').animate({'left':'0','width':'100%'},function(){
                open = false;
            });
        }else{
            //menu fechado
            $('.menu').css('display','block');
            $('.menu').animate({'width':'300px','padding':'10px 0'});
            if(windowSize<=768){
                $('header,.content').animate({'left':'300px'},function(){
                    open = true;
                });
            }else{
                $('header,.content').animate({'left':'300px'},function(){
                    $('header,.content').css('width',calcWindow);
                    open = true;
                });
            }
        }
        
    });


    $(window).resize(function(){
        windowSize = $(window)[0].innerWidth;
        if(windowSize<=768){
            $('.menu').css('width','100%').css('left','0');
            $('.content,header').css('width','100%').css('left','0');
            open=false;
        }else{
            open=true;
            $('.content,header').css('width','calc(100% - 300px').css('left','300px');
            $('.menu').css('width','300px').css('padding','10px 0');
        }
    });

    $('[actionBtn=deletar]').click(function(){
        var resposta = confirm("Tem certeza que deseja excluir?");
        if(resposta == true){
            return true;
        }else{
            return false;
        }    
    });

});