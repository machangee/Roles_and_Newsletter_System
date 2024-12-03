<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1> REGISTER </h1>
    <form action='/theForm' method='post'>
         @csrf
         <fieldset>
        <label for="fname">Name</label><br>

        <input name="name" type="text" placeholder="Enter your name"><br>

        <label for="fname">Email</label><br>

        <input name="email" type="email" placeholder="Enter your email"><br>

        <label for="password">password</label><br>

        <input name="password" type="password"><br>

        <input type="submit" name="subscribe">
         </fieldset>
        
      </form>
      <style>

         
         body{
            background-color:beige;
            
         }
         h1{

            color: black;
            text-align: center;
         }
         form{
          display:flex;
          justify-content: center;
         }
        


    </style>
      
</body>
</html>