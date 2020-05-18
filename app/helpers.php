<?php

if (! function_exists('gtag')) {
    function gtag()
    {
        $gaID = config('analytics.google_id');

        if (!$gaID || !app()->environment('local')) {
            return;
        }

        // $script = "<script async src='https://www.googletagmanager.com/gtag/js?id=$gaID'></script>";
        // $script .= "<script>";
        // $script .= "window.dataLayer = window.dataLayer || [];";
        // $script .= "function gtag(){dataLayer.push(arguments);}";
        // $script .= "gtag('js', new Date());";
        // $script .= "gtag('config', '$gaID');";
        // $script .= "</script>";

        $script = "<!-- Google Analytics -->";
        $script .= "<script>";
        $script .= "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){";
        $script .= "(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),";
        $script .= "m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)";
        $script .= "})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');";
        $script .= "ga('create', '$gaID', 'auto');";
        $script .= "ga('send', 'pageview');";
        $script .= "</script>";
        $script .= "<!-- End Google Analytics -->";

        return $script;
    }
}
