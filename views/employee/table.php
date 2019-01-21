
<h1 class="text-center"> Employee </h1>

</br>

<a href="index.php?r=employee/create"> <button class="btn btn-md btn-primary"><span class="glyphicon glyphicon-user"></span>  Add Employee</button> </a>
</br>

<table class="table">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Birthday</th>
        <th>NIC</th>
        <th>Mobile</th>
        <th>Land</th>
        <th>Designation</th>
        <th>Description</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
   <?php
            foreach ($employee as $employees){
                echo '<tr>';
                echo '<td>'.$employees->id.'</td>';
                echo '<td>'.$employees->name.'</td>';
                echo '<td>'.$employees->birthday.'</td>';
                echo '<td>'.$employees->nic.'</td>';
                echo '<td>'.$employees->mobile.'</td>';
                echo '<td>'.$employees->land.'</td>';
                echo '<td>'.$employees->designation->name.'</td>';
                echo '<td>'.$employees->description.'</td>';
                echo '<td>'.$employees->date.'</td>';
                echo '</tr>';
            }
   ?>
    </tbody>
</table>