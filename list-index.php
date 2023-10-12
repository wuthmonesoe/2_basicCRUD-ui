<?php require_once"./template/header.php"?>

<div class="container">
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="border rounded p-5 m-5">
                <h3>Payment List</h3>
                <?php

  
                $sql = "SELECT * FROM my";
                $query =mysqli_query($conn,$sql);
                //dd($query);
                
                $totalSql ="SELECT sum(money) AS total from my ";
                $totalQuery =mysqli_query($conn,$totalSql);
              //  dd(mysqli_fetch_assoc($totalQuery));
                ?>
                <div class="mb-3">
                    Total :
                    <?=$query -> num_rows ?>
                </div>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Money</th>
                            <th>Create At</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php while($row= mysqli_fetch_assoc($query)): ?>
                        <tr class="align-middle">
                            <td><?= $row["id"]?></td>
                            <td><?= $row["name"]?></td>
                            <td><?= $row["money"]?></td>
                            <td>
                                <p class="small mb-0">
                                    <i class="bi bi-calendar"></i>
                                    <?= showDateTime($row['created_at'])?>
                                </p>
                                <p class="small mb-0">
                                    <i class="bi bi-clock"></i>
                                    <?= showDateTime($row['created_at'],"H : i : s")?>
                                </p>
                            </td>

                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">Total Money : </td>
                            <td colspan="2">
                                <?=mysqli_fetch_assoc($totalQuery)['total']; ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
</div>
<?php require_once"./template/footer.php"?>