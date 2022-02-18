<!DOCTYPE html>
<html class="js responsive supports flexbox no-flexboxtweener csstransforms3d csstransitions csstransformspreserve3d csstransforms"
      style="" lang="cs">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>{{$webItem->getTitle()}}</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">
    <meta name="msapplication-TileImage" content="{{asset('images/logos/favicon-114x114.png')}}">
    <meta name="msapplication-TileColor" content="#b04fc1">
    <meta name="theme-color" content="#b04fc1">
    <meta name="apple-mobile-web-app-title" content="{{config('app.name')}}">
    <meta name="application-name" content="{{config('app.name')}}">
    <meta name="author" content="{{config('app.name')}}">
    <meta name="referrer" content="always">
    <meta name="referrer" content="unsafe-url">
    <link rel="preload" href="{{asset('images/logos/Logo-stips-no-text-svg.svg')}}" as="image">
    <link rel="preload" href="{{asset('images/empty.gif')}}" as="image">
    <link rel="mask-icon" href="{{asset('images/logos/favicon-svg.svg')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/logos/favicon-180x180.png')}}" type="image/png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/logos/favicon-76x76.png')}}" type="image/png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('images/logos/favicon-114x114.png')}}" type="image/png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('images/logos/favicon-120x120.png')}}" type="image/png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('images/logos/favicon-144x144.png')}}" type="image/png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('images/logos/favicon-152x152.png')}}" type="image/png">
    <link rel="icon" href="{{asset('images/logos/favicon-32x32.png')}}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{asset('images/logos/favicon-16x16.png')}}" sizes="16x16" type="image/png">
    <link rel="icon" href="{{asset('images/logos/favicon-96x96.png')}}" sizes="96x96" type="image/png">
    <link rel="icon" href="{{asset('images/logos/favicon-192x192.png')}}" sizes="192x192" type="image/png">

    @if($mainImageUrl = $webItem->getMainImageUrl() )
    <link rel="image_src"  href="{{$mainImageUrl}}">
    @endif

    <meta name="description" content="{{$webItem->getDescription()}}">
    <meta name="keywords" content="{{$webItem->getKeywords()}}">

    <link rel="canonical" href="{{$webItem->getUrl()}}">

    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net/">
    <link rel="dns-prefetch" href="https://s.w.org/">
    <link rel="alternate" type="application/rss+xml" title="Stips.cz » RSS zdroj" href="https://stips.cz/feed/">
    <link rel="alternate" type="application/rss+xml" title="Stips.cz » RSS komentářů" href="https://stips.cz/comments/feed/">
    <link rel="alternate" type="application/rss+xml" title="Stips.cz » RSS komentářů pro Vyhlídkový let balonem – starty po celé ČR" href="https://stips.cz/darek/let-balonem-letenka-pro-jednoho/feed/">
    <noscript><img height='1' width='1' style='display: none;'
                   src='https://www.facebook.com/tr?id=1055757671165008&ev=PageView&noscript=1&cd[domain]=stips.cz'
                   alt='facebook_pixel'></noscript>
    <noscript><img height='1' width='1' style='display: none;'
                   src='https://www.facebook.com/tr?id=1055757671165008&ev=GeneralEvent&noscript=1&cd[post_type]=product&cd[content_name]=Vyhl%C3%ADdkov%C3%BD+let+balonem+-+starty+po+cel%C3%A9+%C4%8CR&cd[post_id]=56560&cd[value]=4190&cd[currency]=CZK&cd[content_category]=Leteck%C3%A9+z%C3%A1%C5%BEitky%2C+Vyhl%C3%ADdkov%C3%BD+let+balonem&cd[tags]=baloncetrum+b%C5%99estek%2C+b%C5%99estek+baloncentrum%2C+let+balonem%2C+let+vyhl%C3%ADdkov%C3%BDm+balonem%2C+tipy-darky-k-mezinarodni-den-zen-mp1%2C+tipy-darky-pro-tchyni-4x9%2C+tipy-darky-pro-zeny-mp1%2C+tipy-na-vanocni-darek-ka3%2C+tipy-na-vanocni-darek-pro-dva-7hh%2C+vanocni-darek-6ec%2C+vanocni-darek-6ec41%2C+vanocni-darek-pro-manzelku-2ki%2C+vanocni-darek-pro-muze-7vf%2C+vanocni-darek-pro-pritele-ru2%2C+vanocni-darek-pro-pritelkyni-h3c%2C+vanocni-darky-pro-maminku-5kl%2C+vyhlidkovy+let+balonem&cd[domain]=stips.cz'
                   alt='facebook_pixel'></noscript>
    <noscript><img height='1' width='1' style='display: none;'
                   src='https://www.facebook.com/tr?id=1055757671165008&ev=ViewContent&noscript=1&cd[content_type]=product&cd[content_ids]=%5B%2256560%22%5D&cd[tags]=baloncetrum+b%C5%99estek%2C+b%C5%99estek+baloncentrum%2C+let+balonem%2C+let+vyhl%C3%ADdkov%C3%BDm+balonem%2C+tipy-darky-k-mezinarodni-den-zen-mp1%2C+tipy-darky-pro-tchyni-4x9%2C+tipy-darky-pro-zeny-mp1%2C+tipy-na-vanocni-darek-ka3%2C+tipy-na-vanocni-darek-pro-dva-7hh%2C+vanocni-darek-6ec%2C+vanocni-darek-6ec41%2C+vanocni-darek-pro-manzelku-2ki%2C+vanocni-darek-pro-muze-7vf%2C+vanocni-darek-pro-pritele-ru2%2C+vanocni-darek-pro-pritelkyni-h3c%2C+vanocni-darky-pro-maminku-5kl%2C+vyhlidkovy+let+balonem&cd[content_name]=Vyhl%C3%ADdkov%C3%BD+let+balonem+-+starty+po+cel%C3%A9+%C4%8CR&cd[category_name]=Leteck%C3%A9+z%C3%A1%C5%BEitky%2C+Vyhl%C3%ADdkov%C3%BD+let+balonem&cd[value]=4190&cd[currency]=CZK&cd[domain]=stips.cz'
                   alt='facebook_pixel'></noscript>
    <meta property="og:title" content="{{$webItem->getTitle()}}">
    <meta property="og:type" content="article">
    <meta property="og:description" content="{{$webItem->getDescription()}}">
    <meta property="og:url" content="{{$webItem->getUrl()}}">
    <meta property="og:site_name" content="{{config('app.name')}}">

    @if($mainImageUrl = $webItem->getMainImageUrl() )
        <meta property="og:image" content="{{$mainImageUrl}}">
    @endif


    <link rel="stylesheet" href="{{asset('style1.css')}}" media="all">
    <link rel="stylesheet" href="{{asset('slick.css')}}" id="slick-css"  type="text/css" media="all">

    <?php /*
    <link rel="stylesheet" href="{{url('/')}}/assets/style2.css" media="all">
 */ ?>

    <link rel="stylesheet" href="{{asset('checkout.css')}}" media="all">
    <link rel="stylesheet" href="{{asset('checkout2.css')}}" media="all">

    <link rel="stylesheet" href="{{asset('style_new.css')}}" media="all">

<?php /*
    <link rel="stylesheet" href="{{url('/')}}/assets/js/plugins/carousel2.css" media="all">
*/ ?>

    <?php
    /*
    <link rel="https://api.w.org/" href="https://stips.cz/wp-json/">
    <link rel="alternate" type="application/json" href="https://stips.cz/wp-json/wp/v2/product/56560">
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://stips.cz/xmlrpc.php?rsd">
    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://stips.cz/wp-includes/wlwmanifest.xml">
    <link rel="shortlink" href="https://stips.cz/?p=56560">
    <link rel="alternate" type="application/json+oembed" href="https://stips.cz/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fstips.cz%2Fdarek%2Flet-balonem-letenka-pro-jednoho%2F">
    <link rel="alternate" type="text/xml+oembed" href="https://stips.cz/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fstips.cz%2Fdarek%2Flet-balonem-letenka-pro-jednoho%2F&amp;format=xml">
    */ ?>

    <noscript>
        <style> .wpb_animate_when_almost_visible {
                opacity: 1;
            }</style>
    </noscript>

    <link rel="stylesheet" href="{{asset('style3.css')}}" media="all">

    <link rel="icon" type="image/png" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAQCAYAAADJViUEAAACZ0lEQVQoU42SXUgUYRSGz5nZv5l1ZtbCZS/KzXIVs0jLLkrUDfsBA7sIgwTtJvohNCQwWIsWKlEIpEBCb4wCM8UuCqksRImupBvpqgtDFPsx2dZtZmd3Zr/TGCisu0YffFeH5z3vOedF2OTRt+NeHfROYHAWCIkZ8FQ0xBAGXi2tIZiNJSLUZ2s6rdp1SiFCigCZJZDkusSyiQ5EpFUuDV6FAu11x8q2ccVPguoVZlIxMiCre9z6Nkvos4iOWqwc/5EBb2+rrbLbbMNFXpc6dHBFcQCZiFwv8DiFBjqBMbtT2DqJh0fiGXD+1eBDlyhc8m6RvvYFom+KXOZj24l3k2s2N464bjsYDtrmYvZRwS3UezyyKbvFa68v9j/YbKEZnQMddd2iILQrigweWVryKPLNilLvo9ZAayKbSNrCysOndtvd4qAs5eyzQMiV5QgKvqbIzwtvhxvA2Gg/41TVvedLRMHZmCu5fVF30L+S3JvHVBahuP5ccigD480+9Z93XitWj0Ubmab1maqawzTdoIQRmm4rv/dfcAMRvzg4f8vU4jeYqiHTEjMiOI6+D+3/m7J129R3wB6LLe+SvPI8Ns+sWzvd/6J0wfCPpdSkHzR9wQJqpsNVs2lw5E6Bn8B8iYBzgDSKxMXAzg7FeKn8HNdT+EtT8lFLfICU++TH7opoGvw7vMOXiNMEcVSCHDArvgQc8iovLjY5e5IrmqTwSePydNeRZxkzr+Z6uWXnbSAKWQKWAQCOI0o6XD310sAnMmihYE/lxMgZTGVdWKylME9XU3etno1gCXA8DLkEDOXc//I9W0j+AAVt+RH6UdWRAAAAAElFTkSuQmCC">

</head>
