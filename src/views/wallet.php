<div class="container">
    <div class="card-deck mb-12 text-center">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">User Balance </h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">$<?php echo $param_current_balance;?></h1>
                <button type="button" data-toggle="modal" data-target="#staticBackdrop" class="btn btn-lg btn-block btn-outline-primary">Increase User Balance</button>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table id="crypto-data-datatable" class="table table-striped">
            <thead>

            <tr role="row">
                <th class="sorting" tabindex="0">Coin ID</th>
                <th class="sorting" tabindex="0">Quantity</th>
            </tr>
            </thead>
            <tbody>
                    <?php
                    if (isset($user_coins)) {
                        foreach ($user_coins as $user_coin) {
                            echo '<tr>' .
                            '<td class="coin_id">bitcoin</td>' .
                            '<td class="quantitiy">5</td>' .
                            '</tr>';
                        }
                    }
                    ?>
            </tbody>
        </table>
    </div>
</div>

<?php if (isset($_SESSION["message"])) echo $_SESSION["message"]; ?>

<div class="modal fade " id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">User Account Balance Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/update_user_balance" method="post">
                    <div class="form-group">
                        <label for="balance">Balance ($)</label>
                        <input required type="text" class="form-control" id="balance" name="balance" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>