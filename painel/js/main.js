$(function(){

    var open = true;
    var windowSize = $(window)[0].innerWidth;
    var calcWindow = windowSize-250;
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
            $('.menu').animate({'width':'250px','padding':'10px 0'});
            if(windowSize<=768){
                $('header,.content').animate({'left':'250px'},function(){
                    open = true;
                });
            }else{
                $('header,.content').animate({'left':'250px'},function(){
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
            $('.content,header').css('width','calc(100% - 250px').css('left','250px');
            $('.menu').css('width','250px').css('padding','10px 0');
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