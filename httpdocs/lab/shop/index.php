    <?php include '../patterns/header.php';?>
    <?php include '../patterns/khshours.php';?>
    <body>
    <main>
      <h1><span>Shop</span> at KHS</h1>
      <div>
      <h3> Filter</h3>
        <input type="radio" id="books" name="filter">
        <label for="books"> Books </label>
        <input type="radio" id="audio" name="filter">
        <label for="audio"> Audio </label>
        <input type="radio" id="postcards" name="filter">
        <label for="postcards"> Postcards </label>
        <input type="radio" id="videos" name="filter">
        <label for="videos"> Videos </label>
      </div>
    <!--Vist rwdkent.com/common-patterns for the proper css-->
<div class="shop-items">
  <?php include '../patterns/shopitem.php';?>
  <?php include '../patterns/shopitem.php';?>
  <?php include '../patterns/shopitem.php';?>

  <?php include '../patterns/shopitem.php';?>
  <?php include '../patterns/shopitem.php';?>
  <?php include '../patterns/shopitem.php';?>

  <?php include '../patterns/shopitem.php';?>
  <?php include '../patterns/shopitem.php';?>
  <?php include '../patterns/shopitem.php';?>

  <?php include '../patterns/shopitem.php';?>
  <?php include '../patterns/shopitem.php';?>
  <?php include '../patterns/shopitem.php';?>
</div>
</main>



    <!--Included Footer -->
    <?php include '../patterns/footer.php';?>
