<link rel="stylesheet" href="{{url(asset('font/boxiconns.css'))}}" />

<!-- Core CSS -->
<link rel="stylesheet" href="{{url(asset('css/core.css'))}}" />
<link rel="stylesheet" href="{{url(asset('css/theme-default.css'))}}" />
<link rel="stylesheet" href="{{url(asset('css/demo.css'))}}" />

<link rel="stylesheet" href="{{url(asset('css/perfect-scrollbar.css'))}}" />

<!-- Vendor Styles -->
<link rel="stylesheet" href="{{url(asset('css/apex-charts.css'))}}">


<!-- Page Styles -->

<!-- Include Scripts for customizer, helper, analytics, config -->
<!-- laravel style -->
<script src="{{url(asset('js/helpers.js'))}}"></script>

<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{url(asset('js/config'))}}"></script>

<!-- beautify ignore:end -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'GA_MEASUREMENT_ID');

</script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="{{url(asset('js/button.js'))}}"></script>