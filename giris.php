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
      <?php
	  
	   $baglanti2 = new PDO("mysql:dbname=hastane;host=localhost","root","");
	   
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
          <h1>Randevu Alma</h1>
          
          <form  method="post">
          <div class="top-row">
            <div class="field-wrap">
          
           <h2 style="color:#FFF;clear:both">Hastane: </h2> <select name="hAd" size="1" style="border:#069;font-size:24px;border-radius:5px;padding:5px;color:#336">
            <option>Hastane Seçiniz Lütfen..</option>
              <option>Eyup Devlet Hastanesi</option>
              <option>Okmeydanı ve Arastirma Hastanesi</option>
              <option>Taksim IlkYardım Hastanesi</option>
            </select>
          </div>
             <div class="field-wrap">
          
           <h2 style="color:#FFF;clear:both">Klinik: </h2> <select name="kAd" size="1" style="border:#069;font-size:24px;border-radius:5px;padding:5px;color:#336">
           <option>Klinik Seçiniz Lütfen..</option>
              <option>Ortopedi</option>
              <option>Dahiliye</option>
              <option>Cildiye</option>
              <option>Genel Cerrahi</option>
              <option>Enfeksiyon</option>
               <option>Kulak-Burun ve Bogaz Hastalıkları</option>
                  
            </select>
          </div>
          </div>
            <div class="top-row">
            <div class="field-wrap">
          
           <h2 style="color:#FFF;clear:both">Doktor: </h2> <select name="dAd" size="1" style="border:#069;font-size:24px;border-radius:5px;padding:5px;color:#336">
            <option>Doktor Seçiniz Lütfen..</option>
              <option>Yusuf Demir</option>
              <option>Melih Suzer</option>
              <option>Can Akpınar</option>
                <option>Ayse Yilmaz</option>
                  <option>Tugba Lacin</option>
            </select>
          </div>
             <div class="field-wrap">
          
           <h2 style="color:#FFF;clear:both">Tarih: </h2> 
           <input type="date" name="rTarih">
          </div>
          </div>
           <div class="field-wrap">
          
           <h2 style="color:#FFF;clear:both">Saat: </h2> <select name="saat" size="1" style="border:#069;font-size:24px;border-radius:5px;padding:5px;color:#336">
           		 <option>Saat Seçiniz Lütfen..</option>
              <option>08:00</option>
              <option>09:00</option>
              <option>10:00</option>
              <option>11:00</option>
              <option>12:00</option>
              <option>13:00</option>
              <option>14:00</option>
              <option>15:00</option>
              <option>16:00</option>
              <option>17:00</option>
              <option>18:00</option>
              <option>19:00</option>
              <option>20:00</option>
             
             
                  
            </select>
          </div>
         
          
          
          <button class="button button-block" type="submit" name="rAl">Randevuyu Al</button>
          
          <?php
		  
		  
		  if(isset($_POST["rAl"]))
		  {
			  
			 $baglanti3 = new PDO("mysql:dbname=hastane;host=localhost","root","");
			 $komut = $baglanti3->query("(Select tc from uyeler where  tc=(Select tc from giris  order by id desc LIMIT 1)) ",PDO::FETCH_ASSOC);
	  $sorgutc = $komut->fetch(PDO::FETCH_ASSOC);
			 $komut3 = $baglanti3->prepare("INSERT INTO hastaneler (tc,hastaneAd,klinikAd,doktorAd,tarih,saat) VALUES (?,?,?,?,?,?)");
$komut3->execute(array($sorgutc["tc"],$_POST["hAd"],$_POST["kAd"],$_POST["dAd"],$_POST["rTarih"],$_POST["saat"]));
		
			  
		  }
		  
		   ?>
          </form>
        
          </div>
          
              <div id="login2">   
          <h1>Randevularım</h1>
          
          <form  method="post">
          
            <div class="field-wrap">
            <?php
			
			$baglanti2 = new PDO("mysql:dbname=hastane;host=localhost","root","");
	   
	  $komut = $baglanti2->query("Select * from hastaneler where  tc=(Select tc from giris  order by id desc LIMIT 1) ",PDO::FETCH_ASSOC);
	  $sorgu1 = $komut->fetchALL(PDO::FETCH_ASSOC);

  
	
	 
	  echo "<table cellpadding='20px' >";
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
			   echo '<td> <h4>'."<button  type='submit' name='sil' value='".$deneme["id"]."'>İPTAL ET</button>".'</h4></td>';
		  echo '</tr>';
	  }
	  
	  
	  
	  echo "</table>";
	  if(isset($_POST["sil"]))
	  {
	   $baglanti4 = new PDO("mysql:dbname=hastane;host=localhost","root","");
			 $komut = $baglanti4->query("delete from hastaneler where id=".$_POST["sil"]." ",PDO::FETCH_ASSOC);
	  $sorgu = $komut->fetch(PDO::FETCH_ASSOC);
		  execute($sorgu);
		   
	  }
			
			
			
			 ?>
          </div>
          
          
          
          <button class="button button-block" type="submit" name="rGor"  />Yenile</button>
         
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
