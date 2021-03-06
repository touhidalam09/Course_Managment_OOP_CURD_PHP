<?php
include_once 'Class/RoleManagment.php';
$roleMange = new RoleManagment();
?>

<div class="reg-box" style="width: auto;">
    <div class="d-flex justify-content-between">
        <div class="d-flex align-items-center text-center">
            <div>
                <h4 class="text-dark">
                    Manage <span class="bg-info">
                        <b>Role</b>
                    </span>
                </h4>
            </div>
        </div>
        <div>
            <h2 class="py-2">
                <a href="addRole.php" class="btn btn-dark">Add New Role</a>
            </h2>
        </div>
    </div>
    <table class="table table-hover my-table" >
        <thead class="table-dark">
            <tr>
                <th>Id</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="bg-light">
            <?php
            $data = $roleMange->display();
            $count = 0;
            foreach ($data as $row) {
                $count = $count + 1;
                $role = $row['Role'];
                if (empty($role)) {
                    $role = "no role !";
                }
                ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $role; ?></td>
                    <td>
                        <a class="btn btn-info text-white"
                           href="updateRole.php?editRole=<?php echo $row['id'] ?>"
                           >
                            Update
                        </a>
                        <a 
                            class="btn btn-danger text-white"
                            href="roleManagement.php?deleteRole=<?php echo $row['id']?>"
                            onclick="confirm('Are you sure want to delete this record')">
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