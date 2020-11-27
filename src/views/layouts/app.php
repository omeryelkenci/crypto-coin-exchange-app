<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title; ?> | Crypto Coin Exchange App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" >
    <link rel="stylesheet" href="assets/css/style.css" >
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">CCE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Live Exchange </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/wallet">Wallet</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php require $content; ?>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.3/socket.io.js" integrity="sha512-Jr0UIR/Q8MUX+93zjDOhuDUKLqJZObtwpkLJQcR9qMaLgL0thet39IORuavUaZFkZ8a4ktrUsKPM9mf5LWMduA==" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready( function () {
        $('#crypto-data-datatable').DataTable();

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
    const pricesWs = new WebSocket('wss://ws.coincap.io/prices?assets=ALL')

    pricesWs.onmessage = function (msg) {
        let object_json = jQuery.parseJSON(msg.data);
        let object_keys = Object.keys(object_json);

        $(object_keys).each(function (index, item) {
            $('.' + item).find('.price').find('span').html(object_json[item]);
            if ($('.' + item).find('#coin_price').length > 0) {
                $('.' + item).find('#coin_price').val(object_json[item]);

                $('.' + item).find('#total_price').val($('.' + item).find('#coin_price').val() * $('.' + item).find('#quantity').val());
            }
        });
    }

    //Trade modal process
    $('.trade_button').click(function () {
        $('.modal-body').find('form').removeClass();
        $('.modal-body').find('form').addClass($(this).parent().parent().attr('class').split(' ')[0]);
        $('.modal-title').html($(this).parent().parent().find('.name').html());
        $('#coin_price').val($(this).parent().parent().find('.price').find('span').html());

        $('#total_price').val($('#coin_price').val() * $('#quantity').val());
    });
</script>
</html>