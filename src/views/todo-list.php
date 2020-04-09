<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Todo List</title>
        <meta name="description" content="Todo List with pure PHP in MVC pattern">
        <meta name="author" content="Nhut Le">

        <!-- styles -->
        <link rel="stylesheet" href="public/vendors/font-awesome/font-awesome.min.css">
        <link rel="stylesheet" href="public/vendors/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="public/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="public/css/main.css">
    </head>

    <body>
        <div class="container">
            <h1 class="title">
                <span>Todo List</span>
                <a href="index.php?action=openCalendar" target="_blank" type="button" class="btn btn-primary pull-right btn-open-calendar">Open Calendar</a>
            </h1>

            <div class="notification">
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

            <div class="new-work">
                <form class="form-inline new-work-form" action="index.php?action=addWork" method="post">
                    <label class="sr-only" for="workNameInput">Work Name</label>
                    <input name="name" type="text" class="form-control mb-2 mr-sm-2" id="workNameInput" placeholder="Work Name" autocomplete="off" required>

                    <label class="sr-only" for="startingDateInput">Starting Date</label>
                    <input name="startingDate" type="text" class="form-control mb-2 mr-sm-2 datepicker" id="startingDateInput" placeholder="Starting Date" autocomplete="off" required>

                    <label class="sr-only" for="endingDateInput">Ending Date</label>
                    <input name="endingDate" type="text" class="form-control mb-2 mr-sm-2 datepicker" id="endingDateInput" placeholder="Ending Date" autocomplete="off" required>

                    <select name="status" class="form-control mb-2 mr-sm-2">
                        <option value="Planning">Planning</option>
                        <option value="Doing">Doing</option>
                        <option value="Complete">Complete</option>
                    </select>

                    <button type="submit" name="addNewWork" value="add-new-work" class="btn btn-primary mb-2">Add Work</button>
                </form>
            </div>

            <?php if ($works) { ?>
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
                            <?php foreach ($works as $work) { ?>
                                <form class="table-row" action="index.php?action=updateWork" method="post">
                                    <input type="hidden" name="id" value="<?php echo $work['id']; ?>">
                                    <div class="table-cell">
                                        <div class="cell-value"><?php echo $work['name']; ?></div>
                                        <div class="cell-input">
                                            <input name="name" type="text" class="form-control mb-2 mr-sm-2 work-name" placeholder="Work Name" value="<?php echo $work['name']; ?>" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="table-cell">
                                        <div class="cell-value"><?php echo date('d-m-Y', strtotime($work['starting_date'])); ?></div>
                                        <div class="cell-input">
                                            <input name="startingDate" type="text" class="form-control mb-2 mr-sm-2 datepicker starting-date" placeholder="Starting Date" value="<?php echo date('d-m-Y', strtotime($work['starting_date'])); ?>" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="table-cell">
                                        <div class="cell-value"><?php echo date('d-m-Y', strtotime($work['ending_date'])); ?></div>
                                        <div class="cell-input">
                                            <input name="endingDate" type="text" class="form-control mb-2 mr-sm-2 datepicker ending-date" placeholder="Ending Date" value="<?php echo date('d-m-Y', strtotime($work['ending_date'])); ?>" autocomplete="off" required>
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
                                            <button data-href="index.php?action=deleteWork&id=<?php echo $work['id']; ?>" title="delete" type="button" class="btn btn-danger btn-work-delete">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <div class="btn-group actions cell-save-discard" role="group" aria-label="actions">
                                            <button title="discard" type="button" class="btn btn-warning btn-work-discard">
                                                <i class="fa fa-repeat" aria-hidden="true"></i>
                                            </button>
                                            <button name="updateWork" value="update-work" title="save" type="submit" class="btn btn-success btn-work-update">
                                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
            </div>
            <?php } ?>
        </div>

        <!-- scripts -->
        <script src="public/vendors/jquery/jquery-3.4.1.min.js"></script>
        <script src="public/vendors/bootstrap/bootstrap.min.js"></script>
        <script src="public/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="public/js/main.js"></script>
    </body>
</html>