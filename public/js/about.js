const container = document.getElementById('container');
const hero = document.getElementById('hero')
const breakpoint = document.getElementById('breakpoint');
const arrowHead = document.getElementById('arrow-head');
const scrollButton = document.getElementById('scroll-button');
const homeIcon = document.getElementById('home');

function isScrolledIntoView(elem)
{
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

document.addEventListener('scroll', function(){
    if(!isScrolledIntoView(hero)){
        arrowHead.classList.add('rotate-180');
        scrollButton.href = '#info';
    }
    else{
        arrowHead.classList.remove('rotate-180');
        scrollButton.href = '#authors';
    }
    if(!isScrolledIntoView(breakpoint)){
        homeIcon.classList.remove('fill-white','hover:bg-gray-500');
        homeIcon.classList.add('fill-black','hover:bg-gray-300');
    }
    else{
        homeIcon.classList.remove('fill-black','hover:bg-gray-300');
        homeIcon.classList.add('fill-white','hover:bg-gray-500');
    }
});