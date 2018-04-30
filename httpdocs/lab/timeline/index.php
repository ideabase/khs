<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Page Title</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <?php include '../patterns/header.php';?>
    <?php include '../patterns/banner.php';?>
<main>
        <h3>This is an article headline</h3>
        <?php include '../patterns/para.php';?>
        <?php include '../patterns/para.php';?>
        <?php include '../patterns/quote.php';?>
        <img src="#" alt="This is an image">

  <!-- side profile crap -->
  <div>
    <h2> This is a Section Headline</h2>
        <?php include '../patterns/profile2.php';?>
        <?php include '../patterns/profile2.php';?>
        <?php include '../patterns/profile2.php';?>
  </div>

<!-- This is the code for the timeline grid graphic looking thing -->
  <div>
    <h2> This is a Section Headline </h2>
    <?php include '../patterns/para.php';?>
    <div>
      <?php include '../patterns/fact.php';?>
      <?php include '../patterns/fact.php';?>
      <?php include '../patterns/fact.php';?>
      <?php include '../patterns/fact.php';?>
      <?php include '../patterns/fact.php';?>
      <?php include '../patterns/fact.php';?>
      <?php include '../patterns/fact.php';?>
  </div>
</main>
    <!--Included Footer -->
    <?php include '../patterns/footer.php';?>
