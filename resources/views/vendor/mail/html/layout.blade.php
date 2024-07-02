<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="color-scheme" content="light">
        <meta name="supported-color-schemes" content="light">

        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!--[if gte mso 9]><xml>
            <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml><![endif]-->
    </head>

    <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <table cellpadding="0" cellspacing="0" border="0" style="width:100%; height:100vh; background-color:#edf1f3;">
            <tr>
                <td>
                    <table cellpadding="0" cellspacing="0" border="0" style="max-width:600px; margin-top:64px; margin-bottom:64px; margin-left:auto; margin-right:auto; background-color:white;">
                        <thead style="max-width:600px;">
                            <tr style="max-width:600px;">
                                <td>
                                    <x-mail::header />
                                </td>
                            </tr>
                        </thead>
                        <tbody style="max-width:px; display:block">
                            <tr style="max-width:600px;">
                                <td style="max-width:600px; border-right:1px solid #C0C9D0; border-left:1px solid #C0C9D0;" class="form-container">
                                    {{ $slot }}
                                </td>
                            </tr>
                        </tbody>
                        <tfoot style="max-width:600px;">
                            <tr style="max-width:600px;">
                                <td style="max-width:600px;">
                                    <x-mail::footer />
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
        </table>
    </body>

</html>
