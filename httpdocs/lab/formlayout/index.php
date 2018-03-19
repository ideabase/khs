<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Change Me</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <!--Included Header -->
    <?php include '../patterns/header.php';?>


    <!--Use this code whenever you need to include a shared component -->
<h1>This is Headline 1</h1>

    <?php include '../patterns/para.php';?>

<hr>

<h2>This Is Headline 2</h2>

    <form action="">
      <input type="text" name="" placeholder="First name">
      <input type="text" name="" placeholder="M.I.">
      <br>
        <input type="text" name="" placeholder="Last name">
      <br>
      <input type="text" name="" placeholder="Street Address">
      <br>
       <input type="text" name="" placeholder="City">
      <form action="">
        <select>
          <option value="">State</option>
          <option value="AL">AL</option>
          <option value="AK">AK</option>
          <option value="AR">AR</option>
          <option value="AZ">AZ</option>
          <option value="CA">CA</option>
          <option value="CO">CO</option>
          <option value="CT">CT</option>
          <option value="DC">DC</option>
          <option value="DE">DE</option>
          <option value="FL">FL</option>
          <option value="GA">GA</option>
          <option value="HI">HI</option>
          <option value="IA">IA</option>
          <option value="ID">ID</option>
          <option value="IL">IL</option>
          <option value="IN">IN</option>
          <option value="KS">KS</option>
          <option value="KY">KY</option>
          <option value="LA">LA</option>
          <option value="MA">MA</option>
          <option value="MD">MD</option>
          <option value="ME">ME</option>
          <option value="MI">MI</option>
          <option value="MN">MN</option>
          <option value="MO">MO</option>
          <option value="MS">MS</option>
          <option value="MT">MT</option>
          <option value="NC">NC</option>
          <option value="NE">NE</option>
          <option value="NH">NH</option>
          <option value="NJ">NJ</option>
          <option value="NM">NM</option>
          <option value="NV">NV</option>
          <option value="NY">NY</option>
          <option value="ND">ND</option>
          <option value="OH">OH</option>
          <option value="OK">OK</option>
          <option value="OR">OR</option>
          <option value="PA">PA</option>
          <option value="RI">RI</option>
          <option value="SC">SC</option>
          <option value="SD">SD</option>
          <option value="TN">TN</option>
          <option value="TX">TX</option>
          <option value="UT">UT</option>
          <option value="VT">VT</option>
          <option value="VA">VA</option>
          <option value="WA">WA</option>
          <option value="WI">WI</option>
          <option value="WV">WV</option>
          <option value="WY">WY</option>
        </select>
        <br>
         <input type="text" name="" placeholder="Zip Code">
        <br>
         <input type="text" name="" placeholder="Email Address">
        <br>
        <input type="text" name="" placeholder="Phone Number">
        <br>
        <form action="">
        <select>
          <option value="">Choose a Plan</option>
          <option value="">Senior - $10.00</option>
          <option value="">Student - $10.00</option>
          <option value="">Family - $25.00</option>
          <option value="">Pathfinder - $50.00</option>
          <option value="">Pioneer - $100.00</option>
          <option value="">Settler - $250.00</option>
          <option value="">Founder - $500.00</option>
        </select>
    </form>
      <input type="submit" value="Check Out">
    </form>

    <!--Included Footer -->
    <?php include '../patterns/footer.php';?>
  </body>
</html>
