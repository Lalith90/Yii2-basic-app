
<h1 class="text-center text-info">About  <?= $model->name ?> </h1>

</br>

<a href="index.php?r=employee/create"> <button class="btn btn-md btn-primary"><span class="glyphicon glyphicon-user"></span>  Add Employee</button> </a>
</br>
<div class="container-fluid col-sm-6 col-lg-offset-3">
<table class="table table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <td><?= $model->id ?></td>
    </tr>
    <tr>
        <th>Name</th>
        <td><?= $model->name ?></td>
    </tr>
    <tr>
        <th>Birthday</th>
        <td><?= $model->birthday ?></td>
    </tr>
    <tr>
        <th>NIC</th>
        <td><?= $model->nic ?></td>
    </tr>
    <tr>
        <th>Mobile</th>
        <td><?= $model->mobile ?></td>
    </tr>
    <tr>
        <th>Land</th>
        <td><?= $model->land ?></td>
    </tr>
    <tr>
        <th>Designation</th>
        <td><?= $model->designation->name ?></td>
    </tr>
    <tr>
        <th>Description</th>
        <td><?= $model->description ?></td>
    </tr>
    <tr>
        <th>Date</th>
        <td><?= $model->date ?></td>
    </tr>
    </thead>
 </table>
    <a href="index.php?r=employee/index" ><button class="btn btn-success"><span class="glyphicon glyphicon-backward"></span>&nbsp; Back </button></a>
</div>