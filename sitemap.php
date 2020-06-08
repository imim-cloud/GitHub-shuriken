<?php
header("Content-type: text/xml");
$sitemapBox="<?xml version='1.0' encoding='UTF-8'?><urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>";
foreach(glob('data/*.php') as $page){
    $sitemap = explode('data/',$page);
    $sitemap = explode('srz.php',$sitemap[1]);
    $sitemapBox .= "<url><loc>https://contoh-soal9.netlify.app/$sitemap[0]html</loc></url>";
}
$sitemapBox .= "</urlset>";
echo $sitemapBox;
exit();
?>