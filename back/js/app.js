$(document).ready(()=>{

    $('#menu').click(()=>{
        if($('#menu').hasClass('show')){
            $('main').removeClass('w-[calc(100%-300px)] left-[300px]')
            $('main').addClass('w-[calc(100%-120px)] left-[120px]')
            $('#list1').addClass('hidden')
            $('#list2').removeClass('hidden')
            $('#but1').addClass('hidden')
            $('#but2').removeClass('hidden')
            $('#menu').removeClass('show');
            
        }else{
            $('main').removeClass('w-[calc(100%-120px)] left-[120px]')
            $('main').addClass('w-[calc(100%-300px)] left-[300px]')
            $('#list1').removeClass('hidden')
            $('#list2').addClass('hidden')
            $('#but1').removeClass('hidden')
            $('#but2').addClass('hidden')
            $('#menu').addClass('show');
        }
    })



})