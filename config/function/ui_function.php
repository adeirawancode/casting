<?php

function breadcumb($row_size, $caption_parent, $caption_child, $dashboard_link)
{
	echo '
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-'.$row_size.'">	
          <div class="col-sm-6">
            <h4>'.$caption_parent.'</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="'.$dashboard_link.'">Dashboard</a></li>
              <li class="breadcrumb-item active">'.$caption_child.'</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
	';
}




?>