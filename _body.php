<!doctype html>
<html lang="fa">
<!-- ======================================== Start make header ======================================== -->
<?php include_once "./_header.php"; ?>
<!-- ======================================== End make header ======================================== -->
<body>
<!-- ======================================== Start make website ======================================== -->
<main class="wrapper">
  <!-- ======================================== Start make menu ======================================== -->
    <?php include_once "./partials/menu.php"; ?>
  <!-- ======================================== End make menu ======================================== -->
  <!-- ======================================== Start make menu ======================================== -->
    <?php include_once "./partials/slider.php"; ?>
  <!-- ======================================== End make menu ======================================== -->
  <!-- ======================================== Start make parallax ======================================== -->
    <?php include_once "./partials/parallax.php"; ?>
  <!-- ======================================== End make parallax ======================================== -->
  <!-- ======================================== Start make news ======================================== -->
    <?php include_once "./partials/news.php"; ?>
  <!-- ======================================== End make news ======================================== -->
  <!-- ======================================== Start make form ======================================== -->
    <?php include_once "./partials/contact.php"; ?>
  <!-- ======================================== End make form ======================================== -->
  <!-- ======================================== Start make product ======================================== -->
    <?php include_once "./partials/product.php"; ?>
  <!-- ======================================== End make product ======================================== -->
  <!-- ======================================== Start make footer ======================================== -->
    <?php include_once "./_footer.php"; ?>
  <!-- ======================================== End make footer ======================================== -->
</main>
<!-- ======================================== End make website ======================================== -->
<!-- ======================================== Start make script ======================================== -->
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
<script src="node_modules/swiper/swiper-bundle.min.js"></script>
<!--suppress ES6ConvertVarToLetConst, JSUnresolvedFunction, JSDeprecatedSymbols -->
<script>
    // set ajax for insert data when contact user in home page ===========================================
    $("#form").submit(function (e) {
        e.preventDefault();
        let fullName = $('input[name=fullName]').val();
        let email = $('input[name=email]').val();
        let comment = $('textarea[name=comment]').val();
        $.ajax({
            url: "administrator/panel/admin/contact/insert.php",
            type: "post",
            data: {fullName: fullName, email: email, comment: comment},
            success: function (response) {
                $('input[name=fullName]').val("");
                $('input[name=email]').val("");
                $('textarea[name=comment]').val("");
                if (Number(response) === 1) {
                    $.toast({
                        heading: "???????????? ????????",
                        text: "???????????? ???? ???????????? ?????????? ?????? ???? ???????? ?? ???????? ???? ???????? ?????????? ???????? ?????????? ?????????? .",
                        showHideTransition: 'slide',
                        icon: "success",
                        position: "top-right",
                    });
                } else {
                    $.toast({
                        heading: "???????????? ???? ????????",
                        text: "???????????? ???? ???????? ?????? ?? ???????? ?????????? ???????? ???????????? .",
                        showHideTransition: 'slide',
                        icon: "error",
                        position: "top-right",
                    });
                }
            }
        });
    });
    // for height all screen browser for swiper js ===========================================
    $(".swiper").height($(window).height());
    // for set swiper js ===========================================
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        loop: true,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        effect: "fade",
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>
<!-- ======================================== End make script ======================================== -->
</body>
</html>
