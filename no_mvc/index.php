<?php
    include('handler.php');

    // Fetch all works from db:
    $select_sql = "SELECT * FROM works";
    $query      = mysqli_query($database, $select_sql);
    $works      = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Todo List</title>
        <meta name="description" content="Todo List in pure PHP with MVC pattern">
        <meta name="author" content="Nhut Le">
        <link rel="stylesheet" href="../public/vendors/font-awesome/font-awesome.min.css">
        <link rel="stylesheet" href="../public/vendors/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../public/css/main.css">
    </head>

    <body>
        <div class="container">
            <h1 class="title">Todo List</h1>
            <div class="new-work">
                <form class="form-inline new-work-form" action="index.php" method="post">
                    <label class="sr-only" for="workNameInput">Work Name</label>
                    <input name="name" type="text" class="form-control mb-2 mr-sm-2" id="workNameInput" placeholder="Work Name" required>

                    <label class="sr-only" for="startingDateInput">Starting Date</label>
                    <input name="startingDate" type="text" class="form-control mb-2 mr-sm-2" id="startingDateInput" placeholder="Starting Date" required>

                    <label class="sr-only" for="endingDateInput">Ending Date</label>
                    <input name="endingDate" type="text" class="form-control mb-2 mr-sm-2" id="endingDateInput" placeholder="Ending Date" required>

                    <select name="status" class="form-control mb-2 mr-sm-2">
                        <option value="Planning">Planning</option>
                        <option value="Doing">Doing</option>
                        <option value="Complete">Complete</option>
                    </select>

                    <button type="submit" name="addNewWork" value="add-new-work" class="btn btn-primary mb-2">Add New Work</button>
                </form>

                <?php if (isset($_SESSION['error'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                        <?php
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>

                <?php if (isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
            </div>

            <div class="works">
                <div class="works-table">
                    <div class="table-header">
                        <div class="table-head">
                            Work Name
                        </div>
                        <div class="table-head">
                            Starting Date
                        </div>
                        <div class="table-head">
                            Ending Date
                        </div>
                        <div class="table-head">
                            Status
                        </div>
                        <div class="table-head">
                            Actions
                        </div>
                    </div>
                    <div class="table-body">
                    <?php
                        // Loop all works:
                        foreach ($works as $work) { ?>
                            <form class="table-row" action="index.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $work['id']; ?>">
                                <div class="table-cell">
                                    <div class="cell-value"><?php echo $work['name']; ?></div>
                                    <div class="cell-input">
                                        <input name="name" type="text" class="form-control mb-2 mr-sm-2 work-name" placeholder="Work Name" value="<?php echo $work['name']; ?>" required>
                                    </div>
                                </div>
                                <div class="table-cell">
                                    <div class="cell-value"><?php echo $work['starting_date']; ?></div>
                                    <div class="cell-input">
                                        <input name="startingDate" type="text" class="form-control mb-2 mr-sm-2 starting-date" placeholder="Starting Date" value="<?php echo $work['starting_date']; ?>" required>
                                    </div>
                                </div>
                                <div class="table-cell">
                                    <div class="cell-value"><?php echo $work['ending_date']; ?></div>
                                    <div class="cell-input">
                                        <input name="endingDate" type="text" class="form-control mb-2 mr-sm-2 ending-date" placeholder="Ending Date" value="<?php echo $work['ending_date']; ?>" required>
                                    </div>
                                </div>
                                <div class="table-cell">
                                    <div class="cell-value"><?php echo $work['status']; ?></div>
                                    <div class="cell-input status">
                                        <select name="status" class="form-control mb-2 mr-sm-2">
                                            <?php foreach (array('Planning', 'Doing', 'Complete') as $status) {
                                                echo '<option '.($work['status'] === $status ? 'selected' : '').'>'.$status.'</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="table-cell">
                                    <div class="btn-group actions cell-edit-delete" role="group" aria-label="actions">
                                        <button title="edit" type="button" class="btn btn-info btn-work-edit">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                        <a href="index.php?deleteWork=<?php echo $work['id']; ?>" title="delete" type="button" class="btn btn-danger btn-work-delete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group actions cell-save-discard" role="group" aria-label="actions">
                                        <button title="discard" type="button" class="btn btn-warning btn-work-discard">
                                            <i class="fa fa-repeat" aria-hidden="true"></i>
                                        </button>
                                        <button name="saveWork" value="save-work" title="save" type="submit" class="btn btn-success btn-work-save">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <script src="../public/vendors/jquery/jquery-3.4.1.min.js"></script>
        <script src="../public/vendors/bootstrap/bootstrap.min.js"></script>
        <script src="../public/js/main.js"></script>
    </body>
</html>