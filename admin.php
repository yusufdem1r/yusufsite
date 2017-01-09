<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Üye Ol Adamım</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <div class="form">
      
     
      
      
  
        <div id="login">   
          <h1>Hoşgeldin Admin 156901020</h1>
          
          <form method="POST">
          
            <div class="field-wrap">
            <label>
              Kullanıcı Adı:<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" maxlength="11"  name="admin"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Şifre<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="sifre2"/>
          </div>
          
   
          
        <button type="submit" class="button button-block" name="giris" /> Giriş</button><br>
             

               <?php
	
	  
	if(isset($_POST["giris"]))
	{

if($_POST["admin"]="admin")
{
	echo "üye adın doğru";
	
if($_POST["sifre2"]="123")
{
	

	
	header("refresh:0;url=girisadmin.php");
}

}

}

?>
          </form>
   <a href="index.php"> <button type="submit" class="button button-block" name="giris" /> Geri Dön</button></a>
        </div>
        
      </div><!-- tab-content -->
       

      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
