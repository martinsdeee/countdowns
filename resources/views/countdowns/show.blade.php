
<!--
Author: WebThemez
Author URL: http://webthemez.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
Note: Please use our back link in your site (webthemez.com)
-->
<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html lang="en" class="ie ie6"> <![endif]-->
<!--[if IE 7 ]>	<html lang="en" class="ie ie7"> <![endif]-->
<!--[if IE 8 ]>	<html lang="en" class="ie ie8"> <![endif]-->
<!--[if IE 9 ]>	<html lang="en" class="ie ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>{{$countdown->title}}</title>
    <meta name="description" content="{{$countdown->description}}">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:regular,bold">

    <link rel="stylesheet" type="text/css" href="/css/styles.css">
</head>

<body id="home">
<div id="Header">
    <div class="wrapper">
        <h1>{{$countdown->title}}</h1>
    </div>
</div>
<div id="Content" class="wrapper">
    <div class="countdown styled"></div>
    <h2 class="intro">{{$countdown->description}}</h2>

    <span class="tempBy">Template by: <a href="http://webthemez.com" alt="webthemez">WebThemez.com</a></span>
</div>

<div id="overlay"></div>

<!--Scripts-->
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/Backstretch.js"></script>
<script type="text/javascript" src="js/jquery.countdown.js"></script>

<script type="text/javascript">
    /*
     Author: WebThemez
     Author URL: http://webthemez.com
     License: Creative Commons Attribution 3.0 Unported
     License URL: http://creativecommons.org/licenses/by/3.0/
     */
    $( function() {
// Add background image
        $.backstretch('{{$countdown->background_url}}');
        var endDate = "{{$countdown->datetime}}";
        $('.countdown.simple').countdown({ date: endDate });
        $('.countdown.styled').countdown({
            date: endDate,
            render: function(data) {
                $(this.el).html("<div>" + this.leadingZeros(data.days, 3) + " <span>days</span></div><div>" + this.leadingZeros(data.hours, 2) + " <span>hrs</span></div><div>" + this.leadingZeros(data.min, 2) + " <span>min</span></div><div>" + this.leadingZeros(data.sec, 2) + " <span>sec</span></div>");
            }
        });
        $('.countdown.callback').countdown({
            date: +(new Date) + 10000,
            render: function(data) {
                $(this.el).text(this.leadingZeros(data.sec, 2) + " sec");
            },
            onEnd: function() {
                $(this.el).addClass('ended');
            }
        }).on("click", function() {
            $(this).removeClass('ended').data('countdown').update(+(new Date) + 10000).start();
        });

    });

</script>

</body>
</html>
