<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="/css/lists.css">
        <link rel="stylesheet" type="text/css" href="/css/public.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500" rel="stylesheet" type="text/css">
    </head>

    <body style="font-family: montserrat, sans-serif;">
        <div style="max-width: 1000px; margin: 5% auto" class="main-border-green">
            <div style="text-align: center;margin-top: 5%" class="line-for-letter" >
                <img src="/images/logo.png" class="img-letter">
                {{ $header ?? '' }}
            </div>

            <div>
                {{ $slot }}

                {{ $subcopy ?? '' }}
            </div>
        </div>
    </body>
</html>
