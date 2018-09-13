<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header font-weight-bold">Repositories of <?php echo $GLOBALS['user']['login'] ?></div>
            <div class="card-body">
                <div class="row">
                    <?php foreach ($GLOBALS['repositories'] as $repository): ?>
                        <div class="col col-4 mb-2">
                            <a href="<?php echo getHost() ?>/branches/<?php echo $repository['name'] ?>">
                                <div class="card">
                                    <div class="card-body">
                                        <?= $repository['full_name'] ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="card mt-md-3">
            <div class="card-header">Project Directory</div>
            <div class="card-body">
                <form method="POST" action="<?php echo getHost() ?>/changeProjectDirectory">
                    <div class="form-group row">
                        <label for="token" class="col-sm-4 col-form-label text-md-right">Project Directory</label>
                        <div class="col-md-6">
                            <input id="token" type="text" name="pd" value="<?php echo getDownPath() ?>" autofocus="autofocus" class="form-control">

                            <span>This app dir : <?php echo getMainDir() ?></span>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>