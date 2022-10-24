<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <div class="mt-2">
        <a class="btn btn-secondary" role="button" href="<?php echo URLROOT; ?>/tasks">
            <i class="fa fa-backward"></i> Back
        </a>
    </div>
    <div class="card mt-2">
        <div class="card-header">
            <span class="pull-none">Add Task</span>
        </div>
        <div class="card-body bg-light">
            <form action="<?php echo URLROOT; ?>/tasks/add" method="post">
                <div class="form-group mt-2">
                    <label for="title">Name: <sup>*</sup></label>
                    <input type="text" name="name" class="form-control form-control-lg
                        <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>"
                           value="<?php echo $data['name']; ?>">
                    <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                </div>
                <div class="form-group mt-3">
                    <label for="beschreibung">Beschreibung: <sup>*</sup></label>
                    <textarea name="beschreibung" rows="5" class="form-control form-control-lg
                            <?php echo (!empty($data['beschreibung_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['beschreibung']; ?></textarea>
                    <span class="invalid-feedback"><?php echo $data['beschreibung_err']; ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="text-end">
                            <input class="btn btn-primary pull-right" type="submit" value="Add Task" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
