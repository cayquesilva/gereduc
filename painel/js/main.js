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
            $('.menu').animate({'width':'0','padding':'0'})
            $('header,.content').animate({'left':'0','width':'100%'},function(){
                open = false;
            })
        }else{
            //menu fechado
            $('.menu').css('display','block');
            $('.menu').animate({'width':'300px','padding':'10px'})
            $('header,.content').animate({'left':'300px','width':calcWindow+'px'},function(){
                open = true;
            });
            
        }
    });

});