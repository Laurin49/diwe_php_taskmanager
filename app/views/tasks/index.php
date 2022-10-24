<?php require APPROOT . '/views/inc/header.php'; ?>

    <div class="container">
        <?php flash('task_message'); ?>
        <div class="mt-2">
            <a class="btn btn-secondary" role="button" href="<?php echo URLROOT; ?>/tasks/add">
                <i class="fa fa-plus"></i> Add Task
            </a>
        </div>
        <div class="card mt-2">
            <div class="card-header">
                Task List
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-left">Name</th>
                        <th class="text-left">Beschreibung</th>
                        <th class="text-center">Edit</th>
                        <th class="text-center">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['tasks'] as $task) : ?>
                            <tr>
                                <td class="text-center"><?php echo $task->id; ?></td>
                                <td class=""><?php echo $task->name; ?></td>
                                <td class=""><?php echo $task->beschreibung; ?></td>
                                <td class="text-center">
                                    <a class="btn btn-primary"
                                       href="<?php echo URLROOT; ?>/tasks/edit/<?php echo $task->id; ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <form action="<?php echo URLROOT; ?>/tasks/delete/<?php echo $task->id; ?>" method="post">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



<?php require APPROOT . '/views/inc/footer.php'; ?>