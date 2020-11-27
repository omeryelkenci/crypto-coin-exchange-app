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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.3/socket.io.js" integrity="sha512-Jr0UIR/Q8MUX+93zjDOhuDUKLqJZObtwpkLJQcR9qMaLgL0thet39IORuavUaZFkZ8a4ktrUsKPM9mf5LWMduA==" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready( function () {
        $('#crypto-data-datatable').DataTable();

        //datatable process
        let table = $('#crypto-data-datatable').DataTable();

        //navbar menu activity
        let window_href = window.location.href;
        $('.nav-item').find('a').each(function (index, item) {
            $(item).parent().removeClass('active');
            if (window_href === item.href) {
                $(item).parent().addClass('active');
            }
        });
    });

    //Socket io process
    const pricesWs = new WebSocket('wss://ws.coincap.io/prices?assets=bitcoin,ethereum,monero,litecoin')

    pricesWs.onmessage = function (msg) {
        let object_json = jQuery.parseJSON(msg.data);
        let object_keys = Object.keys(object_json);
        $(object_keys).each(function (index, item) {
            $('.' + item).find('.price').html('&#36;'+object_json[item]);
        });
    }
</script>