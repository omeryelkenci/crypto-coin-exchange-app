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
                    '<tr class="'. strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $value->name))) .'">' .
                         '<td class="rank">' . $value->rank . '</td>' .
                        '<td class="name">' . $value->name . '-' . $value->symbol . '</td>' .
                        '<td class="price">&#36;' . number_format($value->priceUsd, 2, '.', ',') . '</td>' .
                        '<td class="market_cap">' . round(number_format($value->marketCapUsd, 4, ',', '.'), 2) . 'b</td>' .
                        '<td class="vwap">&#36;' . number_format($value->vwap24Hr, 2, '.', ',') . '</td>' .
                        '<td class="supply">' . round(number_format($value->supply, 2, ',', '.'), 2) . 'm</td>' .
                        '<td class="volume">' . round(number_format($value->volumeUsd24Hr, 4, ',', '.'), 2) . 'b</td>' .
                        '<td class="change">' . round($value->changePercent24Hr, 2) . '%</td>' .
                        '<td>Trade</td>' .
                    '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>