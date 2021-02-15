<?php
include_once 'Class/Customer.php';
$customers = new Customer();
?>

<div class="reg-box" style="width: fit-content;">
    <div class="d-flex justify-content-between">
        <div class="d-flex align-items-center text-center">
            <div>
                <h4 class="text-dark">
                    All user Record
                </h4>
            </div>
        </div>
        <div>
            <h2 class="py-2">
                <a href="add.php" class="btn btn-dark">Add New</a>
            </h2>
        </div>
    </div>
    <table class="table table-hover my-table" >
        <thead class="table-dark">
            <tr>
                <th>Id</th>
                <th>Role</th>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Division</th>
                <th>District</th>
                <th>Upazila</th>
                <th>Union</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="bg-light">
            <?php
            $data = $customers->display();
            $count = 0;
            foreach ($data as $row) {
                $count = $count + 1;
                $union = $row['Unions'];
                $role = $row['Role'];
                if (empty($union)) {
                    $union = "No data";
                }
                if (empty($role)) {
                    $role = "no role !";
                }
                ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $role; ?></td>
                    <td><?php echo $row['Name']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td><?php echo $row['Username']; ?></td>
                    <td><?php echo $row['Division']; ?></td>
                    <td><?php echo $row['District']; ?></td>
                    <td><?php echo $row['Upazila']; ?></td>
                    <td><?php echo $union; ?></td>
                    <td>
                        <a 
                            class="btn btn-info text-white" 
                            href="update.php?editId=<?php echo $row['Id'] ?>"
                            style="font-size:11px">
                            Update
                        </a>
                        <a 
                            class="btn btn-danger text-white"
                            href="viewRecord.php?deleteId=<?php echo $row['Id'] ?>"
                            onclick="confirm('Are you sure want to delete this record')"
                            style="font-size:11px"
                            >
                            Delete
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>