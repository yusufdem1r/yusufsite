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
  <div class="form2">
      
      <ul class="tab2-group">
        <li class="tab active"><a href="#signup">Üye Bilgisi</a></li>
        <li class="tab"><a href="#login1">Randevu Al</a></li>
        <li class="tab"><a href="#login2">Randevuları Gör</a></li>
        <li class="tab"><a href="#login3">Bilgilerini Güncelle</a></li>
      
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Hoşgeldiniz</h1>
          
          <form action="/" method="post">
          
      
           <div class="field-wrap">
      <?php $baglanti2 = new PDO("mysql:dbname=hastane;host=localhost","root","");
	   
	  $komut = $baglanti2->query("Select tc,ad,soyad,dTarihi from uyeler where  tc=(Select tc from giris  order by id desc LIMIT 1) ",PDO::FETCH_ASSOC);
	  $sorgu1 = $komut->fetchALL(PDO::FETCH_ASSOC);
	 
	 
	  echo "<table align='center' >";
	 
	  foreach($sorgu1 as $deneme)
	  {
		 
		  
	 echo '<tr style="color:white;">'; echo '<td><h2>TC Kimlik No '; 	echo '</h2></td>';  echo '<td><h2>'.$deneme["tc"].'</h2></td>';echo '</tr>';
		  
		  echo '<tr style="color:white;">'; echo '<td><h2>Adınız: '; echo '</h2></td>';  echo '<td><h2>'.$deneme["ad"].'</h2></td>'; echo '</tr>';
		 echo '<tr style="color:white;">'; echo '<td><h2>Soy Adınız: '; echo '</h2></td>';   echo '<td><h2>'.$deneme["soyad"].'</h2></td>'; echo '</tr>';
		 echo '<tr style="color:white;">'; echo '<td><h2>Doğum Tarihiniz: '; echo '</h2></td>';    echo '<td><h2>'.$deneme["dTarihi"].'</h2></td>'; echo '</tr>';
		  echo '</tr>';
	  }
	  
	  
	  
	  echo "</table>";
	 
	  
	  ?>   
          </div>
          
         <a href="index.php"> <button type="button" class="button button-block"  name="cikis"/>Çıkış</button></a>
          
          </form>

        </div>
        
        <div id="login1">   
          <h1>Hoşgeldiniz</h1>
          
          <form action="/" method="post">
          
            <div class="field-wrap">
            <label>
              Email Adresi<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Şifre<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">İşlemler 1</a></p>
          <button class="button button-block"/>Giriş</button>
          </form>
        
          </div>
          
              <div id="login2">   
          <h1>Hoşgeldiniz</h1>
          
          <form action="/" method="post">
          
            <div class="field-wrap">
            <label>
              Email Adresi<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Şifre<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">İşlemler 2</a></p>
          
          <button class="button button-block"/>Giriş</button>
          </form>
               </div>
               <div id="login3">   
          <h1>Hoşgeldiniz</h1>
          
          <form action="/" method="post">
          
            <div class="field-wrap">
            <label>
              Email Adresi<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Şifre<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">İşlemler 3</a></p>
          
          <button class="button button-block"/>Giriş</button>
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
