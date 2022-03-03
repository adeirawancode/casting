<?php
require "config/query/Q_set_member.php";
// print_r($list_member);
// var_dump($foreman);die();
?>
<!-- <nav class="navbar navbar-light bg-light">
    <a href="pages.php?p=module/pouring/set_operator.php">
        <button type="button" class="btn btn-secondary btn-lg mr-2">SET OPERATOR</button>
    </a>
</nav> -->
<!-- <form class="form-inline mx-auto">
    <input class="form-control-lg ml-2 mr-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-primary btn-lg my-2 my-sm-0" type="submit">ADD</button>
</form> -->
<br>
<!-- <div class="container"> -->
    <!-- <div class="row">
        <form class="form-inline mx-auto">
            <input class="form-control-lg ml-2 mr-2" type="search" placeholder="Search" aria-label="Search Team Member">
            <button class="btn btn-primary btn-lg my-2 my-sm-0" type="submit"></button>
        </form>
    </div> -->
    <!-- <br>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">EmpID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Pic</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col">
            <form>
                <div class="form-group-lg">
                    <label for="">Shift Name</label>
                    <select class="custom-select">
                        <option value="nsp">NSP</option>
                        <option value="nsm">NSM</option>
                    </select>
                <div class="form-group-lg">
                    <label for="">Shift Group</label>
                    <select class="custom-select">
                        <option value="merah">MERAH</option>
                        <option value="putih">PUTIH</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-success btn-lg">SET MEMBER</button>
            </form>
        </div>
    </div>
</div> -->
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">FOREMAN</th>
      <th scope="col">LEADER</th>
      <th scope="col">OPERATOR</th>
      <th scope="col">SET MEMBER</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
      <?php
        while($row_foreman = sqlsrv_fetch_array($stmt_foreman, SQLSRV_FETCH_ASSOC)) { ?>
            <div class="row">
                <div class="col-sm-2"><?php echo '<img src="data:image;base64, '.base64_encode($row_foreman['Picture']).'" width="50px">' ?></div>
                <div class="col-sm-5">
                    <div class="row">
                        <?php echo $row_foreman['EmpID'] ?>
                    </div>
                    <div class="row">
                        <?php echo $row_foreman['EmployeeName'] ?>
                    </div>
                    <div class="row">
                        <?php echo $row_foreman['Role'] ?>
                    </div>
                </div>
                <div class="col-sm-5">
                    <button class="btn-success btn-lg">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
        <?php } ?>
      </td>
      <td>
        <?php
        while($row_leader = sqlsrv_fetch_array($stmt_leader, SQLSRV_FETCH_ASSOC)) { ?>
            <div class="row">
                <div class="col-sm-2"><?php echo '<img src="data:image;base64, '.base64_encode($row_leader['Picture']).'" width="50px">' ?></div>
                <div class="col-sm-5">
                    <div class="row">
                        <?php echo $row_leader['EmpID'] ?>
                    </div>
                    <div class="row">
                        <?php echo $row_leader['EmployeeName'] ?>
                    </div>
                    <div class="row">
                        <?php echo $row_leader['Role'] ?>
                    </div>
                </div>
                <div class="col-sm-5">
                    <button class="btn-success btn-lg">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
        <?php } ?></td>
      <td>
      <?php
        while($row_operator = sqlsrv_fetch_array($stmt_operator, SQLSRV_FETCH_ASSOC)) { ?>
        <div class="row">
            <div class="col-sm-2"><?php echo '<img src="data:image;base64, '.base64_encode($row_operator['Picture']).'" width="50px">' ?></div>
            <div class="col-sm-5">
                <div class="row">
                    <?php echo $row_operator['EmpID'] ?>
                </div>
                <div class="row">
                    <?php echo $row_operator['EmployeeName'] ?>
                </div>
                <div class="row">
                    <?php echo $row_operator['Role'] ?>
                </div>
            </div>
            <div class="col-sm-5">
                <button class="btn-success btn-lg">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <?php } ?>
      </td>
      <td>
        <div class="row">
            <div class="col-sm-12">
                <button class="btn-success btn-lg">
                    <i class="fas fa-plus"> SET MEMBER</i>
                </button>
            </div>
            <!-- <div class="col-sm-3">
                <button class="btn-warning btn-lg">
                    <i class="fas fa-plus"> CANCEL</i>
                </button>
            </div> -->
        </div>
      </td>
    </tr>
  </tbody>
</table>
