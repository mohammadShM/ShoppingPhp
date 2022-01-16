<?php
declare(strict_types=1);
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
  <link rel="stylesheet" href="<?php echo URL . toastCss; ?>"/>
</head>
<body>
<!-- =================================== Start make template =================================== -->
<section class="container-fluid p-0 m-0">
  <!-- =================================== Start make menu =================================== -->
    <?php include_once "_menu.php"; ?>
  <!-- =================================== End make menu =================================== -->
  <!-- =================================== Start make form =================================== -->
  <section class="data mt-5">
    <section class="row m-0 p-0">
      <section class="col-8 offset-2 jumbotron mt-5 shadow">
        <h2 style="padding-bottom: 20px;margin-bottom:20px;border-bottom: 3px solid #716611;">Create Seo</h2>
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
  <section class="row m-0 p-0 mt-5">
    <section class="col-8 offset-2 jumbotron shadow">
      <h2 style="padding-bottom: 20px;margin-bottom:20px;border-bottom: 3px solid #716611;">Show All Seo</h2>
      <table class="table table-dark table-bordered table-hover shadow p-0 m-0 table-responsive-md w-100">
        <thead class="text-center">
        <tr>
          <td>#</td>
          <td>id</td>
          <td>title</td>
          <td>keywords</td>
          <td>description</td>
          <td>author</td>
          <td>delete</td>
        </tr>
        </thead>
        <tbody class="table-info text-center text-dark"></tbody>
      </table>
    </section>
  </section>
</section>
<!-- =================================== End make template =================================== -->
<!-- =================================== link js =================================== -->
<script src="<?php echo URL . JQUERY; ?>"></script>
<script src="<?php echo URL . Bootstrap_Min_BUNDLE; ?>"></script>
<script src="<?php echo URL . Bootstrap_Min_JS; ?>"></script>
<script src="<?php echo URL . toastJs; ?>"></script>
<!--suppress JSCheckFunctionSignatures, JSDeprecatedSymbols -->
<script>
    // for show data by ajax ==================================================
    function read() {
        $.ajax({
            url: "show_details_seo.php",
            method: "GET",
            success: function (response) {
                let data = JSON.parse(response);
                let items = "";
                for (let i = 0; i < data.length; i++) {
                    items += "<tr>" +
                        "<td>" + (i+1) + "</td>" +
                        "<td>" + data[i].id + "</td>" +
                        "<td>" + data[i].title + "</td>" +
                        "<td>" + data[i].keywords + "</td>" +
                        "<td>" + data[i].description + "</td>" +
                        "<td>" + data[i].author + "</td>" +
                        "<td><button id='" + data[i].id + "' class='btn btn-danger delete'>Delete</button></td>" +
                        "</tr>";
                }
                $('table>tbody').html('').append(items);
            }
        });
    }

    read();
    // for delete data by ajax ==================================================
    $('table').on('click', '.delete', deleteItem);

    function deleteItem() {
        let id = $(this).attr('id');
        $.ajax({
            url: "seo/delete.php",
            method: "POST",
            data: {id: id},
            success: function (response) {
                if (Number(response) === 1) {
                    read();
                    alert("عملیات حذف با موفقیت انجام شد .");
                }
            }
        });
    }

    // for send data by ajax ==================================================
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
                    $.toast({
                        heading: 'مشکل در ارسال داده',
                        text: "عنوان یا خالی می باشد و یا کمتر از 5 کاراکتر می باشد و یا بیشتر از 100 کاراکتر می باشد.",
                        showHideTransition: 'slide',
                        icon: 'error',
                        hideAfter: 5000,
                        position: "top-center",
                    });
                } else if (Number(response) === 2) {
                    $.toast({
                        heading: 'مشکل در ارسال داده',
                        text: "کلمات کلیدی یا خالی می باشد و یا کمتر از 5 کاراکتر می باشد و یا بیشتر از 500 کاراکتر می باشد.",
                        showHideTransition: 'slide',
                        icon: 'error',
                        hideAfter: 5000,
                        position: "top-center",
                    });
                } else if (Number(response) === 3) {
                    $.toast({
                        heading: 'مشکل در ارسال داده',
                        text: "توضیحات یا خالی می باشد و یا کمتر از 5 کاراکتر می باشد و یا بیشتر از 500 کاراکتر می باشد.",
                        showHideTransition: 'slide',
                        icon: 'error',
                        hideAfter: 5000,
                        position: "top-center",
                    });
                } else if (Number(response) === 4) {
                    $.toast({
                        heading: 'مشکل در ارسال داده',
                        text: "نام نویسنده یا خالی می باشد و یا کمتر از 10 کاراکتر می باشد و یا بیشتر از 100 کاراکتر می باشد.",
                        showHideTransition: 'slide',
                        icon: 'error',
                        hideAfter: 5000,
                        position: "top-center",
                    });
                } else if (Number(response) === 5) {
                    read();
                    $('input[name=title]').val("");
                    $('textarea[name=keywords]').val("");
                    $('textarea[name=description]').val("");
                    $('input[name=author]').val("");
                    $.toast({
                        heading: 'موفقیت آمیز',
                        text: 'عملیات با موفقیت انجام شد',
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: 5000,
                        position: "top-center",
                    });
                }
            }
        });
    });
</script>
</body>
</html>