
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
        <!--<th>NIC</th>-->
        <th>Mobile</th>
        <!--<th>Land</th>-->
        <th>Designation</th>
        <!--<th>Description</th>
            <th>Date</th>-->
        <th colspan="3" class="text-center">Action</th>
    </tr>
    </thead>
    <tbody>
   <?php
            foreach ($employee as $employees){
                echo '<tr>';
                echo '<td>'.$employees->id.'</td>';
                echo '<td>'.$employees->name.'</td>';
                echo '<td>'.$employees->birthday.'</td>';
               /* echo '<td>'.$employees->nic.'</td>';*/
                echo '<td>'.$employees->mobile.'</td>';
                /*echo '<td>'.$employees->land.'</td>';*/
                echo '<td>'.$employees->designation->name.'</td>';
                /*echo '<td>'.$employees->description.'</td>';
                echo '<td>'.$employees->date.'</td>';*/
                echo '<td><a href="index.php?r=employee/delete&id='.$employees->id.'"><button class="btn btn-danger"><i class="fa fa-user  "></i> Delete</button></a></td>';
                echo '<td><a href="index.php?r=employee/update&id='.$employees->id.'"><button class="btn btn-info"><i class="fa fa-user  "></i> Update</button></a></td>';
                echo '<td><a href="index.php?r=employee/view&id='.$employees->id.'"><button class="btn btn-success"><i class="fa fa-file  "></i> View</button></a></td>';
                echo '</tr>';
            }
   ?>
    </tbody>
</table>