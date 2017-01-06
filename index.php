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
        session_start();
$hata="";
if(isset($_POST["kaydol"])){ 
echo "tıkladın";
	$baglanti = new PDO("mysql:dbname=test;host=localhost","root","");
	$sorgu = $baglanti->query("SELECT id FROM kullanici WHERE email='" . $_POST["email"] ."'",PDO::FETCH_ASSOC);
	if($_POST["email"]=$sorgu){
		echo "Daha Önceden Böyle Bi Kullanıcı Kayıt Yapmış";
	}
	else{
		$komut = $baglanti->prepare("INSERT INTO uyeol (ad,soyad,email,sifre) VALUES (?,?,?,?)");
		$komut->execute(array($_POST["ad"],$_POST["soyad"],$_POST["email"],$_POST["sifre"]));
		echo "üye oldun";
	}
}


          
          ?>
  
          
          <form  method="POST">
          
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

          <div class="field-wrap">
            <label>
              Email Adresi<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name="email"/>
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
              Email Adresi<span class="req">*</span>
            </label>
            <input type="TEXT"required autocomplete="off" name="email"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Şifre<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="sifre"/>
          </div>
          
          <p class="forgot"><a href="#">Şifrenizimi Unuttunuz ?</a></p>
          
        <button type="submit" class="button button-block" name="giris" /> Giriş</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
       
     <?php if(isset($_POST["giris"])){
			$baglanti2 = new PDO("mysql:dbname=test;host=localhost","root","");
	$baglanti1 = new PDO("mysql:dbname=test;host=localhost","root","");
	$sorgu1 = $baglanti1->query("SELECT * FROM uyeol WHERE email='" . $_POST["email"] ."'",PDO::FETCH_ASSOC);
	$sorgu2 = $baglanti2->query("SELECT * FROM uyeol WHERE sifre='" . $_POST["sifre"] ."'",PDO::FETCH_ASSOC);
	$komut1 = $sorgu1->fetch(PDO::FETCH_ASSOC);
	$komut2 = $sorgu2->fetch(PDO::FETCH_ASSOC);
	

if($_POST["email"]=$komut1)
{echo "email doğru" ;
if($_POST["sifre"]=$komut2)
{
	/*include("sayfa1.php");*/
	header("refresh:1;url=giris.php");
	
}

}}?>
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
