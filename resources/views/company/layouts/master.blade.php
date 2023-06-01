<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO Meta Tag -->
    <meta name="autor" content="Al Amin">
    <meta name="keywords" content="Job Portal,Bd Jobs,Career Inhance">
    <meta name="description" content="It's a wonderful website for new user. They are easily can get the dream job from this web application.">

    <!-- Application Title -->
    <title>@yield("user-title")</title>

    <!-- Favicon --> 
    <link rel="shortcut icon" href="{{ asset('assets/company/img/favicon/favicon.png') }}" type="image/x-icon">

    <!-- Bootstrap Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Google Fonts --> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Main Css -->
    <link rel="stylesheet" href="{{ asset('assets/company/css/styles.css') }}">

  </head>
  <body>

    <!-- Use For Content -->
    @yield("company-content-body")

    <!-- Bootstrap Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- Main Javascript -->
    <script src="{{ asset('assets/company/js/app.js') }}"></script>
    <noscript>Please Enabled Option Of Javascript For This Browser.</noscript>

  </body>
</html>