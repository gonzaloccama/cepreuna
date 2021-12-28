<?php
//$pattern = '/:%icon=([\w -]+)%:/';

$pattern = '/:\%icon=(.*?)\%:/s';
$replacement = '<img src="/assets/images/icon/media/${1}.png" alt="" width="30">';

echo preg_replace($pattern, $replacement, $icon);
?>
{{--<img src="{{ asset($img) }}" alt="" width="30">--}}
