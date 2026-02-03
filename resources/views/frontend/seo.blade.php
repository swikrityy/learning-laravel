@if ($keyword)
    <meta name="keywords" content="{{ $keyword ?? '' }}">
@endif
<link rel="profile" href="http://gmpg.org/xfn/11">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>{{ $title ?? '' }} | Umi-Advisor</title>
@if ($description)
    <meta name="description" content="{{ $description ?? '' }}">
@endif
<link rel="canonical" href="{{ url()->full() }}" />

@if (!empty($schema))
    <script type="application/ld+json">{!! $schema ?? '' !!}</script>
@endif