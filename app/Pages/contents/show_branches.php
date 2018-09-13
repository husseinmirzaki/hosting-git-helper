<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header font-weight-bold">Branches of <?php echo $GLOBALS['repository'] ?>
            <a href="/repositories" class="float-right btn btn-danger">Back</a>
            <a href="/repository/<?php echo $GLOBALS['repository'] ?>" class="float-right btn btn-info mr-2">Info</a></div>
            <div class="card-body">
                <div class="row">
                    <?php foreach ($GLOBALS['branches'] as $branch): ?>
                        <div class="col col-4 mb-2">
                            <a href="/commits/<?php echo $GLOBALS['repository'].'/';
                            echo $branch['name'] ?>">
                                <div class="card">
                                    <div class="card-body">
                                        <?= $branch['name']?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>