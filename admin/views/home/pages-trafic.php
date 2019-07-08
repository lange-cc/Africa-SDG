  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
   
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pages</li>
      </ol>
    </section>

   
<section class="content">

<div class="table-page-widget">
<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th></th>
        <th>Page</th>
        <th>Unique Views</th>
        <th>Total Views</th>
      </tr>
    </thead>
    <tbody>
    <?php
       if (!empty($this->pages)) {
         $data = json_decode($this->pages);
        foreach ($data as $key => $value) {
    ?>

      <tr>
        <td> <?=$key+1?></td>
        <td style="text-transform: capitalize;"><?=$data[$key]->page?></td>
        <td><?=$data[$key]->unique?></td>
        <td><?=$data[$key]->views?></td>
      </tr>

     <?php
         }
       }
       else
       {
        echo 'No data found';
       }
     ?>
    </tbody>
  </table>
  </div>

</section>
</div>

