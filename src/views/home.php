<div class="container crypto-coin-exchange-list-div">
    <div class="text-center">
        <h1>Crypto Coin Exchange Live List</h1>
    </div>
    <div class="table-responsive">
        <table id="crypto-data-datatable" class="table table-striped">
            <thead>

            <tr role="row">
                <th class="sorting" tabindex="0">Rank</th>
                <th class="sorting" tabindex="0">Name</th>
                <th class="sorting" tabindex="0">Price</th>
                <th class="sorting" tabindex="0">Market Cap</th>
                <th class="sorting" tabindex="0">Vwap 24Hr</th>
                <th class="sorting" tabindex="0">Supply</th>
                <th class="sorting" tabindex="0">Volume 24Hr</th>
                <th class="sorting" tabindex="0">Change 24Hr</th>
                <th class="sorting" tabindex="0">Trade</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data->data as $key => $value) {
                echo
                    '<tr class="'.$value->id.'">' .
                         '<td class="rank">' . $value->rank . '</td>' .
                        '<td class="name">' . $value->name . '-' . $value->symbol . '</td>' .
                        '<td class="price">&#36;<span>' . $value->priceUsd . '</span></td>' .
                        '<td class="market_cap">' . round(number_format($value->marketCapUsd, 4, ',', '.'), 2) . 'b</td>' .
                        '<td class="vwap">&#36;' . number_format($value->vwap24Hr, 2, '.', ',') . '</td>' .
                        '<td class="supply">' . round(number_format($value->supply, 2, ',', '.'), 2) . 'm</td>' .
                        '<td class="volume">' . round(number_format($value->volumeUsd24Hr, 4, ',', '.'), 2) . 'b</td>' .
                        '<td class="change">' . round($value->changePercent24Hr, 2) . '%</td>' .
                        '<td>' .
                                '<button type="button" class="btn btn-primary trade_button" data-toggle="modal" data-target="#staticBackdrop">' .
                                  'Trade' .
                                '</button>' .
                        '</td>' .
                    '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade " id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Coin Trade</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="coin_price">Coin Price ($)</label>
                        <input type="text" class="form-control" id="coin_price" value="12414124124">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="text" class="form-control" id="quantity" value="1">
                    </div>
                    <div class="form-group">
                        <label for="total_price">Total Price ($)</label>
                        <input type="text" class="form-control" id="total_price" value="12414124124">
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
