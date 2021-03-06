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
                if(windowSize < 400){
                    $('.logout a,.content').css('display','block');
                    
                }
            });
        }else{
            //menu fechado
            if(windowSize < 400){
                $('.logout a,.content').css('display','none');
            }
            $('.menu').css('display','block');
            $('.menu').animate({'width':'300px','padding':'10px'})
            $('header,.content').animate({'left':'300px','width':calcWindow+'px'},function(){
                open = true;
            });
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
});