<html>
    <head>
        <title>Saibaba</title>
        <style>
          main{
            background-color:ivory;

             height:200%;

            }
            table{
                margin-top: 10%;
                border:2px;
                margin-left:20%;
            }
            </style>
    </head>
    <body>
        <table border="1">
    <thead>
            <tr>
                <th>Name</th>
                <th>ID_Number</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Item Name</th>
                <th>Item Type</th>
                <th>Item Color</th> 
                <th>Description</th>
                <th>Date Found</th>
                <th>Location Found</th>
                <th>image</th>
                <th>status</th>
            </tr>
            </tr>
        </thead>
        <tbody>
        <?php
        include  "connect.php";
        $sql="select * from `FoundItems` where status in(0,2) ";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($result)){ 
            $name=$row['Name'];
            $id=$row['ID_Number'];
            $email=$row['Email'];
            $phone=$row['Phone'];
            $itemname=$row['ItemName'];
            $itemtype=$row['ItemType'];
            $itemcolor=$row['ItemColor'];
            $description=$row['Description'];
            $date=$row['Date'];
            $location=$row['Location'];
            $Image=$row['image'];?>
            <td><?php echo $name ?></td>
            <td><?php echo $id ?></td>
            <td><?php echo $email ?></td>
            <td><?php echo $phone ?></td>
            <td><?php echo $itemname ?></td>
            <td><?php echo $itemtype ?></td>
            <td><?php echo $itemcolor ?></td>
            <td><?php echo $description ?></td>
            <td><?php echo $date ?></td>
            <td><?php echo $location ?></td>
                <td><img src="<?php echo $Image;?>" alt="image not displayed" width="100" height="100"></td>
  <td> <select class="section" onchange="sai(this.options[this.selectedIndex].value,'<?php echo $row['ID_Number']?>')">
              <option value="0">claim</option>
              <option value="1">unclaim</option>
              <option value="2">pending</option>
                </select>
                </td>
                </tr>
               <?php } ?>
        </tbody>
    </table>
        
        <script>
            function sai(value,id){
                //alert(id);
                let url="";
                window.location.href=url+"?id="+id+"&status="+value;
                <?php
if(isset($_GET['id']) && isset($_GET['status'])){
    $Id=$_GET['id'];
    $Status=$_GET['status'];
    $result=mysqli_query($con,"update `FoundItems` set status='$Status' where ID_Number='$Id'");
    if($result){
    header('location:Admin.php');}
}   
?>
            }
            </script>
           
</body>
</html>
