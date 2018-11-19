
<div class="row px-3">
	<div class="col-sm-6">
		<h2>Страницы</h2>
		<table class="table table-bordered">
		  <thead class="thead-light">
		    <tr>
		      <th scope="col">№</th>
		      <th scope="col">Страница</th>
		      <th scope="col"> <i class="fa fa-fw fa-wrench"></i> </th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php $i = 1; ?>
		  	<?php foreach ($pages as $page): ?>
		  		<tr>
			      <th scope="row"><?php echo $i; ?></th>
			      <td><?php echo $page['name_rus']; ?></td>
			      <td><a class="btn btn-warning" href="<?php echo base_url();?>pages/edit/<?php echo $page['name']; ?>">Изменить <i class="fa fa-fw fa-wrench"></i></a></td>
			    </tr>
			    <?php $i++; ?>
		  	<?php endforeach ?>
		  </tbody>
		</table>
	</div>
	<div class="col-sm-6">
		<h2>Номера</h2>
		<table class="table table-bordered">
		  <thead class="thead-light">
		    <tr>
		      <th scope="col">№</th>
		      <th scope="col">Номер</th>
		      <th scope="col"> <i class="fa fa-fw fa-wrench"></i> </th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php $j = 1; ?>
		  	<?php foreach ($rooms as $room): ?>
		  		<tr>
			      <th scope="row"><?php echo $j; ?></th>
			      <td><?php echo $room['type_rus']; ?></td>
			      <td><a class="btn btn-warning" href="<?php echo base_url();?>rooms/edit/<?php echo $room['type']; ?>">Изменить <i class="fa fa-fw fa-wrench"></i></a></td>
			    </tr>
			    <?php $j++; ?>
		  	<?php endforeach ?>
		  </tbody>
		</table>
	</div>
</div>
