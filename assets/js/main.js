// HEADER THU NHO
$(document).ready(function() {
    $(window).scroll(function() {
        if($(this).scrollTop()){
            $('header').addClass('sticky');
        }else{
            $('header').removeClass('sticky');
        }
    });
});
// SLIDER Ở TRANG CHỦ
$('.owl-carousel').owlCarousel({
    loop:true,
    margin: 10,
    autoplay:true,
    autoplayTimeout:3000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        900:{
            items:3
        }
    }
});

$(document).ready(function(){
    $('.box-1').click(function(){
    $(this).addClass('active-1').siblings().removeClass('active-1');
    });
});

// ĐĂNG NHẬP CHUYỂN QUA ĐĂNG KÝ
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});

