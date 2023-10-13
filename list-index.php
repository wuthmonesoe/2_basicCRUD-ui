<?php require_once"./template/header.php"?>

<div class="container">
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="border rounded p-5 m-5">
                <h3>Payment List</h3>
                <?php

  
                $sql = "SELECT * FROM my";

                if(isset($_GET['q'])){
                    $q =$_GET['q'];
                    $sql .= " WHERE name LIKE '%$q%' ";
                }
                $query =mysqli_query($conn,$sql);
                //dd($query);
                
                $totalSql ="SELECT sum(money) AS total from my ";
                $totalQuery =mysqli_query($conn,$totalSql);
              //  dd(mysqli_fetch_assoc($totalQuery));
                ?>
                <div class="mb-3 row justify-content-between align-item-center">
                    <div class=" col-4">
                        Total List: <?= $query->num_rows ?>
                    </div>
                    <div class="col-4">
                        <form action="" method="get">
                            <div class="input-group">
                                <input type="text" name="q"
                                    value="<?php if(isset($_GET['q'])) : ?><?=$_GET['q'] ;?><?php endif ;?>"
                                    class="form-control">
                                <?php if($_GET['q']) :?>
                                <a href="./list-index.php" class="btn">
                                    <i class="bi bi-x-lg text-danger"></i>
                                </a>
                                <?php endif ;?>
                                <button class=" btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>

                </div>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th class="text-end">Money</th>
                            <th class="text-center">Control</th>
                            <th>Create At</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php while($row= mysqli_fetch_assoc($query)): ?>
                        <tr class=" align-middle">
                            <td><?= $row["id"]?></td>
                            <td><?= $row["name"]?></td>
                            <td class="text-end"><?= $row["money"]?></td>
                            <td class="text-center">
                                <a href="./list-update.php?id=<?=$row['id']?>;" class="btn btn-primary me-3">Update</a>
                                <form class="d-inline-block" action="./list-delete.php" method="post">
                                    <input type="hidden" name="id" value="<?=$row['id']?>">
                                    <button onclick="return confirm('Are you Sure to Delete?')"
                                        class=" btn btn-danger">Delete</button>
                                </form>

                            </td>
                            <td>
                                <p class="small mb-0">
                                    <i class="bi bi-calendar"></i>
                                    <?= showDateTime($row['created_at'])?>
                                </p>
                                <p class=" small mb-0">
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
                            <td class="text-end">
                                <?=mysqli_fetch_assoc($totalQuery)['total']; ?>
                            </td>
                            <td colspan="2"></td>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
</div>
<?php require_once"./template/footer.php"?>