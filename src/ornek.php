<?php 


session_start();
ob_start();
include('layout/header.php');
include("class/generate.php") ;
include("class/request.php");
$jwt = new JWTAuth();
$req = new POSTRequest();

$date2 = date("Y-m-d");
$data = array('tarih' => $date2,"bank"=>$_GET["bank"]);

$responsetrans =  $req->getData("transBank/", $_SESSION["jwt"], json_encode($data));



if (!isset($responsetrans->isSuccess)) {
   //print_r($responseuser);
   session_destroy();
   exit(header("Location: /login.php"));
}



?>

<h2> <?php echo $date2; ?> Tarihli Hesap Hareketleri</h2>
<br>

<br>
<div class="row" style="overflow:auto">
<div class="col-md-12">
<table id="tableId" width="100%" class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Açıklama</th>
      <th scope="col">Miktar</th>
      <th scope="col">Tarih</th>
      <th scope="col">Kategori</th>
     
   
    </tr>
  </thead>
  <tbody>
      <?php for ($i=0; $i < count($responsetrans->data); $i++) { 
           
       $element = $responsetrans->data[$i];
       
        
     ?>
    <tr>
       
      <th scope="row"><?php echo $i ?></th>

      <td><?php echo $element->attributes->description ?></td>
      <td><?php 
      if ($element->attributes->transaction_type == "account_debit") {?>
            <p style="color: green;"> <?php echo $element->attributes->amount_in_trl ?></p>
        <?php }else{ ?>
            <p style="color: red;"> <?php echo $element->attributes->amount_in_trl*(-1) ?></p>
        
       <?php }
        ?>
    </td>
      <td><?php echo $element->attributes->date ?></td>
      <td><?php 
        if ($element->attributes->transaction_type == "account_debit") {
            echo "PARA GİRİŞİ";
        }else{
            echo "PARA ÇIKIŞI";
        
        }
      ?></td>
     
    
    </tr>
<?php } ?>
  </tbody>
</table>
</div>

      </div>


<?php include('layout/footer.php'); ?>