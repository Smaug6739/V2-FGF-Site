var $carrousel = $('#carrousel')
var $img = $('#carrousel img')
var indexImg = $img.length - 1
var i = 0
var $currentImg = $img.eq(i)

$(document).ready(function() {
    
    $img.css('display', 'none')
    $currentImg.css('display', 'block')

    $('.next').click(function(){ // image suivante

        i++

        if( i <= indexImg ){
            $img.css('display', 'none')
            $currentImg = $img.eq(i)
            $currentImg.css('display', 'block')
        }
        else{
            i = 0
        }

    })

    $('.prev').click(function(){ // image précédente

        i--

        if( i >= 0 ){
            $img.css('display', 'none')
            $currentImg = $img.eq(i)
            $currentImg.css('display', 'block')
        }
        else{
            i = indexImg
        }

    })
    
    slideImg()

})

function slideImg(){
    setTimeout(function(){

        if(i < indexImg){
            i++
        }
        else{
            i = 0
        }

        $img.css('display', 'none')

        $currentImg = $img.eq(i)
        $currentImg.css('display', 'block')

        slideImg()

    }, 3000)
}