<?php
header("Content-Type:text/css");
$color = "#f0f"; // Change your Color Here
$secondColor = "#ff8"; // Change your Color Here

function checkhexcolor($color){
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if (isset($_GET['color']) AND $_GET['color'] != '') {
    $color = "#" . $_GET['color'];
}

if (!$color OR !checkhexcolor($color)) {
    $color = "#336699";
}


function checkhexcolor2($secondColor){
    return preg_match('/^#[a-f0-9]{6}$/i', $secondColor);
}

if (isset($_GET['secondColor']) AND $_GET['secondColor'] != '') {
    $secondColor = "#" . $_GET['secondColor'];
}

if (!$secondColor OR !checkhexcolor2($secondColor)) {
    $secondColor = "#336699";
}
?>

.header-top, .header-wrapper .right-area .cmn--btn, .section__category, .cmn--btn, .owl-dots .owl-dot.active, .owl-dots .owl-dot span, .owl-dots .owl-dot span, .post__item .post__thumb .category, .scrollToTop, .contact__item:hover .contact__icon, .cmn--table thead tr th, .menu li .submenu li:hover > a, .social-icons li a:hover{
	background-color: <?php echo $color; ?>;
}

.card-item .title a, .counter__item .counter__header .title, .ratings, .post__item .post__content .meta__date .meta__item i, .post__item .post__read, h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, .widget__post .widget__post__content span, .footer-links li::after, .contact__item .contact__body a, .choose__item .choose__icon, .post__details .post-meta li i{
    color: <?php echo $color; ?>;
}
 
.post__item .post__content .meta__date{
    border-left: 5px solid <?php echo $color; ?>;
}

.bg--base{
    background-color: <?php echo $color; ?> !important;
}

.form-control:focus{
    border-color: <?php echo $color; ?>;
}

.text--base{
    color: <?php echo $color; ?> !important;
}

.account__wrapper{
    border: 1px dashed <?php echo $color; ?>4d;
}