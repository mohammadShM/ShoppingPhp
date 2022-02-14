<?php
declare(strict_types=1);
include_once "../config/config.php";
checkSession();
include_once "../config/Contact.php";
$contact = new Contact();
$query = $contact->select();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>نمایش دیتاهای مربوط به تماس با ما</title>
  <!-- =================================== link css =================================== -->
  <link rel="stylesheet" href="<?php echo URL . Bootstrap_Min; ?>"/>
  <link rel="stylesheet" href="<?php echo URL . Admin_Css; ?>"/>
  <link rel="stylesheet" href="<?php echo URL . toastCss; ?>"/>
</head>
<body>
<!-- =================================== main =================================== -->
<section class="contaner-fluid">
    <?php include_once "_menu.php"; ?>
  <section class="data mt-5">
    <section class="row m-0 p-0">
      <section class="col-8 offset-2 mt-5 jumbotron">
        <table class="table table-dark table-bordered table-hover table-responsive">
          <thead>
          <tr>
            <th>fullName</th>
            <th>email</th>
            <th>comment</th>
            <th>delete</th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($query as $item): ?>
            <tr>
              <td><?php echo $item['fullname']; ?></td>
              <td><?php echo $item['email']; ?></td>
              <td style="text-align: justify;"><?php echo $item['comment']; ?></td>
              <td>
                <form action="contact/delete.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                  <input type="submit" value="delete" class="btn btn-danger">
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </section>
    </section>
  </section>
</section>
<!-- =================================== main =================================== -->
<!-- =================================== link js =================================== -->
<script src="<?php echo URL . JQUERY; ?>"></script>
<script src="<?php echo URL . Bootstrap_Min_BUNDLE; ?>"></script>
<script src="<?php echo URL . Bootstrap_Min_JS; ?>"></script>
</body>
</html>