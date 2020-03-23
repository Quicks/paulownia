<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500" rel="stylesheet" type="text/css">
    </head>

    <body style="font-family: montserrat, sans-serif;">
        <div style="max-width: 1000px; margin: 5% auto; border:10px solid #75B018;" >
            <div style="text-align: center; margin-top: 5%;background:url('/public/images/line-for-letter.png') no-repeat; background-size:contain; height: 170px;">
                <img src="//images/logo.png" class="lazyload" style="  margin-right:10%;width: 27%;float: right;">
                {{ $header ?? '' }}
            </div>

            <div>
                {{ $slot }}

                {{ $subcopy ?? '' }}
            </div>
        </div>
    </body>
</html>


</div>
