<?php
session_start();

// Получение данных из сессии
$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$phone = isset($_SESSION['phone']) ? $_SESSION['phone'] : '';
$order_id = isset($_SESSION['order_id']) ? $_SESSION['order_id'] : '';

?>
<!DOCTYPE html>
<html lang="uk">

<head>
  <!-- Meta -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Дякуємо за покупку!</title>
  <meta http-equiv="Refresh" content="10; URL=/">
  <link rel='shortcut icon' type='image/x-icon' href='favicon.png' />
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!-- Styles -->
  <link rel="stylesheet" href="./css/thank-you.css">
  <!-- pixel -->
  <!-- end pixel -->
</head>

<body>
  <!-- thank-you-wrapper -->
  <section class="thank-you-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="thank-you-page-logo">
            <a href="#">
              <img src="img/logo.png" alt="logo">
            </a>
          </div>

          <div class="thank-you-page-content">
            <h1 class="thank-you-page-title">
              Дякуємо за покупку! <br>
              Ваш заказ за номером <strong><?php echo $order_id; ?></strong> успішно оформлено.
            </h1>
            <h3>
              <br><br>
              Ми зв'яжемося з Вами за телефоном <strong><?php echo $phone; ?></strong> для підтвердження замовлення.
              <br><br>
            </h3>
            <p>Будь ласка, перевірте правильність введеної Вами інформації!</p>
            <span>Ім'я:</span> <span id="user_name"><?php echo $name; ?></span><br>
            <span>Телефон: </span> <span id="user_phone"><?php echo $phone; ?></span>
            <p>Якщо Ви помилилися під час заповнення форми, можете заповнити заявку ще раз.</p>
            <a href="javascript: history.back(-1);" class="btn btn-primary arrow-icon"> Назад </a>
            <p>
              З повагою,
              <br>
              Команда blummax.com
            </p>
          </div>
          <ul class="footer-nav">
            <li> <a href="./policy.html">Політика конфіденційності</a> </li>
            <li> <a href="./agreement.html"> Угода користувача</a> </li>
            <li> <a href="./warranty.html"> Гарантійні забов'язання </a> </li>
            <li> <a href="#"> Київ, Україна </a> </li>
          </ul>
          <div class="thank-you-copy">
            <p> blummax.com &copy; 2024 All Rights Reserved </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- thank-you-wrapper -->
</body>

</html>