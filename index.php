<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Todo List</title>
        <meta name="description" content="Todo List in pure PHP with MVC pattern">
        <meta name="author" content="Nhut Le">
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="main.css">
    </head>

    <body>
        <div class="container">
            <h1 class="alert alert-success title">Todo List</h1>
            <div class="new-work">
                <form class="form-inline new-work-form">
                    <label class="sr-only" for="workNameInput">Work Name</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="workNameInput" placeholder="Work Name">

                    <label class="sr-only" for="startingDateInput">Starting Date</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="startingDateInput" placeholder="Starting Date">

                    <label class="sr-only" for="endingDateInput">Ending Date</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="endingDateInput" placeholder="Ending Date">

                    <select class="form-control mb-2 mr-sm-2">
                        <option>Planing</option>
                        <option>Doing</option>
                        <option>Complete</option>
                    </select>

                    <button type="submit" class="btn btn-primary mb-2">Add New Work</button>
                </form>
            </div>
            <div class="works">
                <div class="works-table">
                    <div class="table-header">
                        <div class="table-head">
                            No.
                        </div>
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
                        <div class="table-row">
                            <div class="table-cell">
                                1
                            </div>
                            <div class="table-cell">
                                Buying new laptop
                            </div>
                            <div class="table-cell">
                                31/03/2020
                            </div>
                            <div class="table-cell">
                                31/03/2020
                            </div>
                            <div class="table-cell">
                                Planning
                            </div>
                            <div class="table-cell">
                                <div class="btn-group actions" role="group" aria-label="actions">
                                    <button type="button" class="btn btn-info btn-work-edit">
                                        <svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"></path>
                                            <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-work-delete">
                                        <svg class="bi bi-trash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M2.5 1a1 1 0 00-1 1v1a1 1 0 001 1H3v9a2 2 0 002 2h6a2 2 0 002-2V4h.5a1 1 0 001-1V2a1 1 0 00-1-1H10a1 1 0 00-1-1H7a1 1 0 00-1 1H2.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM8 5a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 018 5zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="jquery-3.4.1.min.js"></script>
        <script src="bootstrap.min.js"></script>
        <script src="main.js"></script>
    </body>
</html>