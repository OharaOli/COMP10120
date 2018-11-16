<!DOCTYPE html>
<html lang="en">

   <head>
      <!-- Displayed in the tab of the web browser -->
      <title>Enter Details</title>

      <!-- Link to an external style sheet -->
      <link rel="stylesheet" href="style.css">

   </head>

   <body>

      <!-- Simple web form to retrieve details and send it to another page
           Validation will take place on the second page, assuming this is the
           stage it is sent to the server -->
      <h2>&lt; Please enter your details... &gt;</h2>

      <!-- Post the data from the form to the page linked below -->
      <form action="/php/welcome.php" method="post">
         Name:
         <br>
         <input type="text" name="Name" value="Oliver">
         <br>
         <br>
         Email:
         <br>
         <input type="email" name="Email" value="OliverOhara@gmail.com">
         <br>
         <br>
         <input type="submit" value="Send data">
      </form>

   </body>

</html>
