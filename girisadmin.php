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
        <li class="tab"><a href="#login1">Üye Ekle</a></li>
        <li class="tab"><a href="#login2">Alnımış Randevular</a></li>
        <li class="tab"><a href="#login3">Bilgilerini Güncelle</a></li>
      
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Üyelerin Listesi</h1>
          
          <form  method="post">
          
      
           <div class="field-wrap">
      <?php
	  
	   $baglanti2 = new PDO("mysql:dbname=hastane;host=localhost","root","");
	   
	  $komut = $baglanti2->query("Select *  from uyeler  ",PDO::FETCH_ASSOC);
	  $sorgu1 = $komut->fetchALL(PDO::FETCH_ASSOC);
	 
	 
	  echo "<table 
	  bordercolor='#1CE8AA' border='1px'  cellspacing='10px' cellpadding='2px' bordercolordark='#00CC33' >";
	 echo '<tr style="color:white;">
	  <td><h4>Tc No</h4></td><td><h4>Adı</h4></td><td><h4>Soyadı</h4></td><td><h4>Cinsiyeti</h4></td><td><h4>Doğum Yeri</h4></td> <td><h4>Doğum Tarihi</h4></td><td><h4>Baba Ad</h4></td><td><h4>Anne Ad</h4></td><td> <h4>Email</h4></td><td> <h4>Şifre</h4></td>
	  </tr>';
	  foreach($sorgu1 as $deneme)
	  {
		 
		  
	 echo '<tr style="color:white;">';
	    echo '<td><h4>'.$deneme["tc"].'</h4></td>';
		 echo '<td><h4>'.$deneme["ad"].'</h4></td>';
		  echo '<td><h4>'.$deneme["soyad"].'</h4></td>';
		  echo '<td><h4>'.$deneme["cinsiyet"].'</h4></td>';
		    echo '<td><h4>'.$deneme["dYeri"].'</h4></td>';
			 echo '<td><h4>'.$deneme["dTarihi"].'</h4></td>';
			  echo '<td><h4>'.$deneme["babaad"].'</h4></td>';
			   echo '<td><h4>'.$deneme["annead"].'</h4></td>';
			    echo '<td><h4>'.$deneme["eposta"].'</h4></td>';
				 echo '<td><h4>'.$deneme["sifre"].'</h4></td>';
				 echo '<td> <h4>'."<button  type='submit' name='sil' value='".$deneme["tc"]."'>Üyeyi Sil</button>".'</h4></td>';
		 
	 
		  echo '</tr>';
	  }
	  
	  
	  
	  echo "</table>";
	  
	  if(isset($_POST["sil"]))
	  {
	   $baglanti4 = new PDO("mysql:dbname=hastane;host=localhost","root","");
			 $komut = $baglanti4->query("delete from uyeler where tc=".$_POST["sil"]." ",PDO::FETCH_ASSOC);
	  $sorgu = $komut->fetch(PDO::FETCH_ASSOC);
		  execute($sorgu);
		   
	  }
	 
	  
	  ?>   
          </div>
          
         <a href="index.php"> <button type="button" class="button button-block"  name="cikis"/>Çıkış</button></a>
          
          </form>

        </div>
        
        <div id="login1">   
          <h1>Üye Ekle</h1>
          
          <?php 
       ob_start();
$hata="";
if(isset($_POST["kaydol"])){ 
echo "tıkladın";
	$baglanti3 = new PDO("mysql:dbname=hastane;host=localhost","root","");
	$sorgu3 = $baglanti3->query("SELECT tc FROM uyeler WHERE tc='" . $_POST["tcno"] ."'",PDO::FETCH_ASSOC);
	
	$komut3 = $baglanti3->prepare("INSERT INTO uyeler (tc,ad,soyad,cinsiyet,dYeri,dTarihi,babaad,annead,eposta,sifre) VALUES (?,?,?,?,?,?,?,?,?,?)");
$komut3->execute(array($_POST["tcno"],$_POST["ad"],$_POST["soyad"],$_POST["cinsiyet"],$_POST["dYeri"],$_POST["dTarih"],$_POST["bAd"],$_POST["aAd"],$_POST["email"],$_POST["sifre"]));
		echo "üye oldun";
	
}


          
          ?>
  
          
          <form  method="POST">
           <div class="field-wrap">
             
              <input type="text" required autocomplete="off" maxlength="11" name="tcno" />
               <label>
                Tc No
              </label>
            </div>
          
          <div class="top-row">
           
            <div class="field-wrap">
             
              <input type="text" required autocomplete="off" name="ad" />
              <label>
                Ad
              </label>
            </div>
            
        
            <div class="field-wrap">
             
              <input type="text"required autocomplete="off" name="soyad" />
               <label>
                Soyad
              </label>
            </div>
          </div>
  <div class="top-row">
          <div class="field-wrap">
          
            <input type="text"required autocomplete="off" name="cinsiyet"/>
              <label>
              Cinsiyet
            </label>
          </div>
          
          <div class="field-wrap">
           
           <input type="text" required autocomplete="off" name="dYeri"/>
            <label>
              Doğum Yeriniz
            </label>
          </div>
    </div>
      <div class="top-row">
          <div class="field-wrap">
            
             <input type="date"required autocomplete="off" name="dTarih"/>
             <label>
              Doğum Tarihiniz
            </label>
            
          </div>
          
          <div class="field-wrap">
            
            <input type="text"required autocomplete="off" name="aAd"/>
            <label>
              Anne Adı
            </label>
          </div>
          
             
    </div>
    <div class="top-row">
          <div class="field-wrap">
            
            
             <input type="text"required autocomplete="off" name="bAd"/>
             <label>
              Baba Adı
            </label>
          </div>
          
          <div class="field-wrap">
           
            <input type="email"required autocomplete="off" name="email"/>
             <label>
              E-mail
            </label>
          </div>
    </div>
       <div class="field-wrap">
            
            <input type="password"required autocomplete="off" name="sifre"/>
            <label>
              Şifre
            </label>
          </div>
          <button type="submit" class="button button-block" name="kaydol"/>ÜYE EKLE</button>
          
          </form>
          </div>
         
          
          
         
      
          
              <div id="login2">   
          <h1>Randevularım</h1>
          
          <form  method="post">
          
            <div class="field-wrap">
            <?php
			
			$baglanti2 = new PDO("mysql:dbname=hastane;host=localhost","root","");
	   
	  $komut = $baglanti2->query("Select * from hastaneler ",PDO::FETCH_ASSOC);
	  $sorgu1 = $komut->fetchALL(PDO::FETCH_ASSOC);

  
	
	 
	  echo "<table align='center'  bordercolor='#1CE8AA' border='1px'  cellspacing='10px' cellpadding='2px' bordercolordark='#00CC33' >";
	  echo '<tr style="color:white;">
	  <td><h3>Tc No</h3></td><td><h3>Hastane Ad</h3></td><td><h3>Klinik Ad</h3></td><td><h3>Doktor Ad</h3></td><td><h3>Tarih</h3></td> <td><h3>Saat</h3></td>
	  </tr>';
	  foreach($sorgu1 as $deneme)
	  {
		  echo '<tr style="color:white;">';
		    echo '<td ><h4>'.$deneme["tc"].'</h4></td>';
		  echo '<td ><h4>'.$deneme["hastaneAd"].'</h4></td>';
		  echo '<td ><h4>'.$deneme["klinikAd"].'</h4></td>';
		  echo '<td> <h4>'.$deneme["doktorAd"].'</h4></td>';
		   echo '<td ><h4>'.$deneme["tarih"].'</h4></td>';
		    echo '<td> <h4>'.$deneme["saat"].'</h4></td>';
			   echo '<td> <h4>'."<button  type='submit' name='sil2' value='".$deneme["id"]."'>İPTAL ET</button>".'</h4></td>';
		  echo '</tr>';
	  }
	  
	  
	  
	  echo "</table>";
	  if(isset($_POST["sil2"]))
	  {
	   $baglanti4 = new PDO("mysql:dbname=hastane;host=localhost","root","");
			 $komut = $baglanti4->query("delete from hastaneler where id=".$_POST["sil2"]." ",PDO::FETCH_ASSOC);
	  $sorgu = $komut->fetch(PDO::FETCH_ASSOC);
		  execute($sorgu);
		   
	  }
			
			
			
			 ?>
          </div>
          
          
          
          <button class="button button-block" type="submit" name="rGor"  />Yenile</button>
         
          </form>
               </div>
               <div id="login3">   
          <h1>Üye Bilgilerini Güncelle</h1>
          
          <form method="post">
          <?php $baglanti2 = new PDO("mysql:dbname=hastane;host=localhost","root","");
	   
	  $komut = $baglanti2->query("(Select * from uyeler  where  tc=(Select tc from giris  order by id desc LIMIT 1)) ",PDO::FETCH_ASSOC);
	  $sorgu1 = $komut->fetchALL(PDO::FETCH_ASSOC);

		 
         echo ' <div class="field-wrap">
              
              <input type="text" required autocomplete="off" maxlength="11" value="'.$sorgu1['0']['tc'].'" name="tcno" />
            </div>
          
          <div class="top-row">
            <div class="field-wrap">
              
              <input type="text" required autocomplete="off" value="'.$sorgu1['0']['ad'].'" name="ad" />
            </div>
        
            <div class="field-wrap">
           
              <input type="text"required autocomplete="off" value="'.$sorgu1['0']['soyad'].'" name="soyad" />
            </div>
          </div>
  <div class="top-row">
          <div class="field-wrap">
          
            <input type="text"required autocomplete="off" value="'.$sorgu1['0']['cinsiyet'].'" name="cinsiyet"/>
          </div>
          
          <div class="field-wrap">
            
           <input type="text" required autocomplete="off" value="'.$sorgu1['0']['dYeri'].'" name="dYeri"/>
          </div>
    </div>
      <div class="top-row">
          <div class="field-wrap">
           
            
             <input type="date"required autocomplete="off" value="value="'.$sorgu1['0']['dTarihi'].'"" name="dTarih"/>
          </div>
          
          <div class="field-wrap">
            
            <input type="text"required autocomplete="off" value="'.$sorgu1['0']['annead'].'" name="aAd"/>
          </div>
          
             
    </div>
    <div class="top-row">
          <div class="field-wrap">
          
            
             <input type="text"required autocomplete="off" value="'.$sorgu1['0']['babaad'].'" name="bAd"/>
          </div>
          
          <div class="field-wrap">
           
            <input type="email"required autocomplete="off" value="'.$sorgu1['0']['eposta'].'" name="email"/>
          </div>
    </div>
       <div class="field-wrap">
            
            <input type="text autocomplete="off" value="'.$sorgu1['0']['sifre'].'" name="sifre"/>
          </div>
          
          <button class="button button-block" type="submit" name="gncl">Güncelle</button>';
		  ?>
          </form>
          <?php
		  if(isset($_POST["gncl"]))
		  {
		  $baglanti7 = new PDO("mysql:dbname=hastane;host=localhost","root","");
	
 $komut7 = $baglanti7->query("update uyeler set ,ad=".$_POST["ad"].",soyad=".$_POST["soyad"].",cinsiyet=".$_POST["cinsiyet"].",dYeri=".$_POST["dYeri"].",dTarihi=".$_POST["dTarih"].",babaad=".$_POST["bAd"].",annead=".$_POST["aAd"].",eposta=".$_POST["email"].",sifre=".$_POST["sifre"]." where tc=".$_POST["tcno"]."",PDO::FETCH_ASSOC);
	  $sorgu7 = $komut7->fetch(PDO::FETCH_ASSOC);
		  execute($sorgu7);
		  }
		   ?>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
