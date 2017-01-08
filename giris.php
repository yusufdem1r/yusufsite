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
        <li class="tab active"><a href="#signup">Üyleri Listele</a></li>
        <li class="tab"><a href="#login1">İşlemler</a></li>
        <li class="tab"><a href="#login2">İşlemler1</a></li>
        <li class="tab"><a href="#login3">İşlemler2</a></li>
      
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Hemen Üye Olabilirsiniz</h1>
          
          <form action="/" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                İsim<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Soyisim<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off"/>
            </div>
          </div>

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
           <div class="field-wrap">
      <?php $baglanti2 = new PDO("mysql:dbname=hastane;host=localhost","root","");
	   
	  $komut = $baglanti2->query("Select tc,ad,soyad,dTarihi from uyeler where  tc=(Select tc from giris  order by id desc LIMIT 1) ",PDO::FETCH_ASSOC);
	  $sorgu1 = $komut->fetchALL(PDO::FETCH_ASSOC);
	  print_r($sorgu1);
	 
	  echo "<table >";
	  echo '<tr>
	  <td><h3>TC KİMLİK NUMARANIZ</h3></td><td><h3>ADINIZ</h3></td><td><h3>SOYADINIZ</h3></td><td><h3>DOĞUM TARİHİNİZ</h3></td>
	  </tr>';
	  foreach($sorgu1 as $deneme)
	  {
		  echo '<tr>';
		  
		  echo '<td><h2>'.$deneme["tc"].'</h2></td>';
		  echo '<td><h2>'.$deneme["ad"].'</h2></td>';
		  echo '<td><h2>'.$deneme["soyad"].'</h2></td>';
		   echo '<td><h2>'.$deneme["dTarihi"].'</h2></td>';
		  echo '</tr>';
	  }
	  
	  
	  
	  echo "</table>";
	  
	  ?>   deneme
          </div>
          
          <button type="submit" class="button button-block"/>ÜYE OL</button>
          
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