@php
$prepend = isset($argv[5]) ? $argv[5] : '.html';
$append = isset($argv[1]) ? $argv[1] : 'https://sample.com/';
$prio = isset($argv[3]) ? $argv[3] : '0.5';
$backdate = isset($argv[4]) ? $argv[4] : date('Y-m-d');
$freq = isset($argv[2]) ? $argv[2] : 'weekly';
@endphp
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
@foreach($keywords as $id => $keyword)
@php
$data = get_data(str_slug($keyword));
$timestamp = rand(strtotime($backdate), time());
$data['keyword'] = $keyword;
$mmv = strtolower($keyword);
@endphp
<url>
	<loc>{{ $append }}{{ str_replace(' ', '-', $mmv) }}{{ $prepend }}</loc>
	<lastmod>{{ date('Y-m-d', $timestamp) }}T{{ date('H:i:s', $timestamp) }}+00:00</lastmod>
	<priority>{{ $prio }}</priority>
	<changefreq>{{ $freq }}</changefreq>
</url>
@endforeach
</urlset>