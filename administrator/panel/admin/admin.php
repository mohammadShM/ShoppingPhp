<?php
include_once "../config/config.php";
checkSession();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>مدیریت</title>
    <!-- =================================== link css =================================== -->
    <link rel="stylesheet" href="<?php echo URL . Bootstrap_Min; ?>"/>
    <link rel="stylesheet" href="<?php echo URL . Admin_Css; ?>"/>
</head>
<body>
<!-- =================================== Start make template =================================== -->
<section class="container-fluid p-0 m-0">
    <!-- =================================== Start make menu =================================== -->
    <?php include_once "_menu.php"; ?>
    <!-- =================================== End make menu =================================== -->
    <!-- =================================== Start make form =================================== -->
    <section class="data mt-5">
        <section class="row m-0">
            <section class="col-8 offset-2 jumbotron mt-5 shadow">
                <form action="#" method="post">
                    <section class="form-group">
                        <label for="title">title : </label>
                        <input type="text" name="title" id="title"
                               placeholder="please enter title seo" class="form-control">
                    </section>
                    <section class="form-group">
                        <label for="keywords">keywords : </label>
                        <textarea name="keywords" id="keywords" style="resize:none;height:150px;"
                                  placeholder="please enter keywords seo" value="" class="form-control"></textarea>
                    </section>
                    <section class="form-group">
                        <label for="description">description : </label>
                        <textarea name="description" id="description" style="resize:none;height:150px;"
                                  placeholder="please enter description seo" value="" class="form-control"></textarea>
                    </section>
                    <section class="form-group">
                        <label for="author">author : </label>
                        <input type="text" name="author" id="author"
                               placeholder="please enter author seo" class="form-control">
                    </section>
                    <section class="form-group">
                        <input type="submit" class="btn btn-primary" value="register">
                    </section>
                </form>
            </section>
        </section>
    </section>
    <!-- =================================== End make form =================================== -->
</section>
<!-- =================================== End make template =================================== -->
<!-- =================================== link js =================================== -->
<script src="<?php echo URL . JQUERY; ?>"></script>
<script src="<?php echo URL . Bootstrap_Min_BUNDLE; ?>"></script>
<script src="<?php echo URL . Bootstrap_Min_JS; ?>"></script>
<script>
    $('form').submit(function (event) {
        event.preventDefault();
        let title = $('input[name=title]').val();
        let keywords = $('textarea[name=keywords]').val();
        let description = $('textarea[name=description]').val();
        let author = $('input[name=author]').val();
        $.ajax({
            url: 'seo/insert.php',
            method: 'post',
            data: {
                title: title,
                keywords: keywords,
                description: description,
                author: author,
            },
            success: function (response) {
                if (Number(response) === 1) {
                    $('input[name=title]').val("");
                    $('textarea[name=keywords]').val("");
                    $('textarea[name=description]').val("");
                    $('input[name=author]').val("");
                    alert("عملیات با موفقیت انجام شد");
                }
            }
        });
    });
</script>
</body>
</html>