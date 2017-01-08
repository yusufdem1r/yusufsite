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
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Üye Ol</a></li>
        <li class="tab"><a href="#login">Giriş Yap</a></li>
      
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Hemen Üye Olabilirsiniz</h1>
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
              <label>
                Tc No<span class="req"></span>
              </label>
              <input type="text" required autocomplete="off" maxlength="11" name="tcno" />
            </div>
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                İsim<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name="ad" />
            </div>
        
            <div class="field-wrap">
              <label>
                Soyisim<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name="soyad" />
            </div>
          </div>
  <div class="top-row">
          <div class="field-wrap">
            <label>
              Cinsiyet<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off" name="cinsiyet"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Doğum Yeriniz<span class="req">*</span>
            </label>
           <input type="text" required autocomplete="off" name="dYeri"/>
          </div>
    </div>
      <div class="top-row">
          <div class="field-wrap">
            <label>
              Doğum Tarihiniz<span class="req">*</span>
            </label>
            
             <input type="date"required autocomplete="off" name="dTarih"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Anne Adınız:<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off" name="aAd"/>
          </div>
          
             
    </div>
    <div class="top-row">
          <div class="field-wrap">
            <label>
              Baba Adınız<span class="req">*</span>
            </label>
            
             <input type="text"required autocomplete="off" name="bAd"/>
          </div>
          
          <div class="field-wrap">
            <label>
              E-mail<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name="email"/>
          </div>
    </div>
       <div class="field-wrap">
            <label>
              Şifre<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="sifre"/>
          </div>
          <button type="submit" class="button button-block" name="kaydol"/>ÜYE OL</button>
          
          </form>

        </div>
  
        <div id="login">   
          <h1>Hoşgeldiniz</h1>
          
          <form method="POST">
          
            <div class="field-wrap">
            <label>
              Tc Numaranız<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off"  name="tcno2"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Şifre<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="sifre2"/>
          </div>
          
          <p class="forgot"><a href="#">Şifrenizimi Unuttunuz ?</a></p>
          
        <button type="submit" class="button button-block" name="giris" /> Giriş</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
       
     <?php
	
	  if(isset($_POST["giris"])){
			$baglanti2 = new PDO("mysql:dbname=hastane;host=localhost","root","");
			$baglanti1 = new PDO("mysql:dbname=hastane;host=localhost","root","");
		
				$sorgu1 = $baglanti1->query("SELECT tc FROM uyeler WHERE tc='" . $_POST["tcno2"] ."'",PDO::FETCH_ASSOC);
	$sorgu2 = $baglanti2->query("SELECT sifre FROM uyeler WHERE sifre='" . $_POST["sifre2"] ."'",PDO::FETCH_ASSOC);
	$komut1 = $sorgu1->fetch(PDO::FETCH_ASSOC);
	$komut2 = $sorgu2->fetch(PDO::FETCH_ASSOC);
	
$uye= $_POST["tcno2"];
if($_POST["tcno2"]=$komut1)
{
	echo "üye adın doğru";
	
if($_POST["sifre2"]=$komut2)
{
	/*include("sayfa1.php");*/
	echo "şifre doğru";
	$baglanti4 = new PDO("mysql:dbname=hastane;host=localhost","root","");
	$komut4 = $baglanti4->prepare("INSERT INTO giris(tc) VALUES (?)");
$komut4->execute(array($uye));

	
	header("refresh:1;url=giris.php");
}

}


}
ob_end_flush();
?>
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
