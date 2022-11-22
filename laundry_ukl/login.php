<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="style_login.css">
    <title>Login</title>
</head>
<body>
    <style>
        
        body{
            background:url("background7.png");
            background-size:cover;
        }
        .text{
            font-size:29px;
            margin-top:10px;
            color:#7C3E66;
        }
        .text1{
            font-size:29px;
            color:#0E75A6; 
        }
        .text1 span{
            font-size:29px;
            color:#08BCEC; 
        }
    </style>
<div class="img"></div>
<div class="text" align="center">
   <b>WELCOME</b> <br> 
<div class="text1" align="center">
    <b>LAUNDRY </b> <b> <span>LAB</span></b>
</div>
</div>
<div class="row" style="margin-top:100px; margin-right:500px">
<div class="col-md"></div>
<div class="col-md" style="padding:50px; box-shadow: 4px 4px 5px -4px;background:rgb(242,235,233,0.20000000298023224); border-radius:40px;">
      <form action="proses_login.php" method="post" style="color:#243A73; margin-top:10px; font-weight:600;">
          Username  :
          <input type="text" style="height:50px; border-radius:20px;margin-top:10px"name="username" value="" class="form-control"><br>
          Password  :
          <input type="password" style="height:50px; border-radius:20px;margin-top:10px" name="password" class="form-control"><br>
       <select  name="role" id="role" style="
          height:40px; 
          border-radius:8px;
          margin-top:10px;
          width:20%;
         padding:5px 10px;
          margin-bottom:20px;
          ">
            <option value="">Role</option>
            <option value="kasir">kasir</option>
            <option value="admin">admin</option>
            <option value="owner">owner</option>
          </select>
          
          <center><input class="btn" style="background-color:#A5BECC;
           color:#243A73;
          height:20px;
          border-radius:20px;
          height:50px;
           " type="submit" name="login" value="SIGN IN"></center>
      </form>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>