<?php


session_start();
ob_start();
include('layout/header.php');
include("class/generate.php");
include("class/request.php");
$jwt = new JWTAuth();
$req = new POSTRequest();

if (isset($_POST["coin"])   && $_POST["category"] == "create") {
  $data = array('_id' => $_POST["user_id"], "coin" => $_POST["coin"]);
  $request = $req->getData("createWallet/", array(), json_encode($data));
  var_dump($request);
}

if (isset($_POST["category"]) && $_POST["category"] == "balance") {

  $data = array('coin' => $_POST["coin"], "_id" => "6246e67357f32b135b3cd735");
  $request = $req->getData("getBalanceWallets/", array(), json_encode($data));
  var_dump($request->data->tokens);
  echo '<script>alert("TokenBalance: ' . $request->data->tokens . ' \n BalanceBNB: ' . $request->data->bnbBalance . '")</script>';
}

if (isset($_POST["category"]) && $_POST["category"] == "sendOne") {
  $data = array('to' => $_POST["toAddress"], "amount" => $_POST["amount"], "coin" => $_POST["coin"], "walletAddress" => $_POST["wallet"], "_id" => "6246e67357f32b135b3cd735");
  var_dump($data);
  $request = $req->getData("sendTokenBSC/", array(), json_encode($data));
  var_dump($request);


}

if (isset($_POST["category"]) && $_POST["category"] == "send") {
  $inputFile = $_FILES['excelFile']['tmp_name'];
 
  require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';
  try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFile);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFile);
  } catch (Exception $e) {
    die($e->getMessage());
  }
  $excelData = [];
  $sheet = $objPHPExcel->getSheet(0);
  $highestRow = $sheet->getHighestRow();
  $highestColumn = $sheet->getHighestColumn();

  //Loop through each row of the worksheet in turn
  for ($row = 1; $row <= $highestRow; $row++) {
    //  Read a row of data into an array
    
    $toAddress = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
    $amount = $sheet->rangeToArray('B' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
    $coin =  $sheet->rangeToArray('C' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
    
    array_push($excelData,array("toAddress"=>$toAddress[0][0],"amount"=>$amount[0][0],"coin"=>$coin[0][0],"wallet"=>$wallet[0][0]));
    //Insert into database
    
  }
  for ($i=0; $i < count($excelData); $i++) { 
    $data = array('to' => $excelData[$i]["toAddress"], "amount" => $excelData[$i]["amount"], "coin" => $excelData[$i]["coin"], "walletAddress" => $excelData[$i]["wallet"], "_id" => "6246e67357f32b135b3cd735");
    $request = $req->getData("sendTokenBSC/", array(), json_encode($data));
    var_dump($request);
  }
}

//$getWallets = $req->getData("getWallets/", array(), json_encode(array("_id" => "6246e67357f32b135b3cd735")));

//var_dump($getWallets->data);


?>


<div class="row">

  <div class="col-md-6">
    <form action="index.php" method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">Coin Symbol</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="USDT" name="coin">
        <input type="hidden" name="user_id" value="61810f25ab313cb18de7dd47">
      </div>
      <br>

      <button type="submit" class="btn btn-primary">Create Wallet</button>
    </form>
  </div>

  <div class="col-md-6">
    <form action="index.php" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">Wallet Used</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Wallet Address" name="wallet">
        <input type="hidden" name="category" value="sendOn
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">To Address</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="To Address" name="toAddress">
        <input type="hidden" name="category" value="sendOne">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Coin Symbol</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="USDT" name="coin">

</div>

      <div class="form-group">
        <label for="exampleInputEmail1">Coin Amount</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Amount" name="amount">

      </div>


      <br>


      <button type="submit" class="btn btn-primary">Send </button>
    </form>
  </div>

  <hr style="margin-top: 10px; height:5px;">
  <div class="col-md-6">
    <form action="index.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="exampleInputEmail1">File</label>
        <input type="file" class="form-control" name="excelFile">
        <input type="hidden" name="category" value="send">
        <small id="emailHelp" class="form-text text-muted">Download Example File <a href="/sendCrypto.xlsx">Download</a></small>
      </div>


      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <hr style="margin-top: 10px; height:5px; backgroun-color:black;">

</div>

<div class="col-md-12">

  <h3>List Wallets</h3>

  <table class="table">
    <thead>
      <th>#</th>
      <th>Wallet Name</th>
      <th>Wallet Balance</th>
      <th>Network</th>
      <th>Balance</th>
    
    </thead>

    <tbody>
      <?php for ($i = 0; $i < count($getWallets->data); $i++) {
        $element = $getWallets->data[$i];
      ?>
        <tr>


          <td><?php echo $i ?></td>
          <td><?php echo $element->public_key ?></td>
          <td><?php echo $element->coin ?></td>
          <td><?php  echo $element->network?></td>
          <td>
            <?php 
             $data = array('wallet_id' => $element->_id, "_id" => "6246e67357f32b135b3cd735");
             $request = $req->getData("getBalanceWallets/", array(), json_encode($data));
             for ($ib=0; $ib < count($request->data->tokens); $ib++) { 
              echo  $request->data->tokens[$ib]->coin."-" . $request->data->tokens[$ib]->balance . "<br>"; 
             }
            
            ?>
          </td>
         


        </tr>
      <?php } ?>
    </tbody>

  </table>

</div>


</div>


<?php include('layout/footer.php'); ?>