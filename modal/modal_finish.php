<?php
require "config/query/Q_pouring.php";
require "config/query/Q_melting.php";

$sessionID = $_SESSION['SessionID']

?>
<!-- Modal End -->
<div class="modal fade" id="modal_end" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">END SHIFT</h5>               
            </div>
            <form method="POST">
                <div class="modal-body">
                  <p>APAKAH ANDA SUDAH SELESAI BEKERJA?</p>
				  <input type="hidden" class="form-control" name="sessionID" value="<?php echo $sessionID; ?>">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="end_session" name="end_session">SELESAI</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
			   </div>
            </form>
            <?php
            
        if(isset($_POST["end_session"])){
          
		  $sessionActive = $_POST['sessionID'];
		  
          // $_SESSION['SessionID'] = $SessionID;
          //$SessionID_Active = $_SESSION['SessionID'];
         
          $sql_end = "UPDATE [PRD].[dbo].[session_log]
          SET SessionFinish = getdate()
		  , State = 'FINISH'
          WHERE SessionID = '$sessionActive' AND State = 'ACTIVE'";
          $stmt_end = sqlsrv_query($conn, $sql_end);
          //var_dump($SessionID_Active);die;
          echo '<meta http-equiv="refresh" content="0" />';
        }
      ?>
        </div>
    </div>
</div>