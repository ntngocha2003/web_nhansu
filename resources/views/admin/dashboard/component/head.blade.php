<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin_NgocHa</title>

    <link href="../admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="../admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="../admin/css/animate.css" rel="stylesheet">

    @if(isset($config['css']) && is_array($config['css']))
        @foreach($config['css'] as $key => $value)
            {!!'<link rel="stylesheet" href="'.$value.'"></link>'!!}
        @endforeach
    @endif

    <link href="../admin/css/style.css" rel="stylesheet">
    <link href="../admin/css/customize.css" rel="stylesheet">
    <script src="../admin/js/jquery-3.1.1.min.js"></script>