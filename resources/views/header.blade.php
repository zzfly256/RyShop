<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'RyShop Index') - {{\App\Setings::whereRaw("name='siteName'")->first()->value}}</title>
    <?php if($_SERVER["REQUEST_URI"]=="/"){?>
    <meta name="description" content="{!! \App\Setings::whereRaw("name='description'")->first()->value !!}">
    <meta name="keyword" content="{!! \App\Setings::whereRaw("name='keyword'")->first()->value !!}">
    <?php }?>
    <link rel="stylesheet" href="/style.css">
</head>
<body>