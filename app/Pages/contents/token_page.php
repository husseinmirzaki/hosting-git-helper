<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Set Token</div>
            <div class="card-body">
                <form method="POST" action="<?php echo getHost() ?>/token">
                    <div class="form-group row">
                        <label for="token" class="col-sm-4 col-form-label text-md-right">Token</label>
                        <div class="col-md-6">
                            <input id="token" type="text" name="token" value="" required="required" autofocus="autofocus" class="form-control"></div>
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