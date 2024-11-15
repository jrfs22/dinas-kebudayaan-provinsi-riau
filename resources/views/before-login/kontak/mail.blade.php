
<!DOCTYPE html>
<html>

<head>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");

        body {
            font-family: "poppins", Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f6f6f6;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #dddddd;
            border-radius: 26px;
            text-align: center;
        }

        .header {
            background-color: #f8bc24;
            border-radius: 16px;
            color: #ffffff;
            padding: 10px;
            text-align: center;
        }

        .content {
            padding: 20px;
            color: #241442;
        }

        .footer {
            background-color: #f6f6f6;
            color: #888888;
            padding: 10px;
            text-align: center;
            font-size: 12px;
        }

        .logo {
            width: auto;
            height: 64px;
            padding-right: 4px;
        }

        .button {
            padding: 16px 24px;
            font-size: 16px;
            border-radius: 12px;
            color: white;
            background-color: #c2163e;
            border: 0px;
            cursor: pointer;
            margin-top: 16px;
        }

        .name {
            font-weight: bold;
        }

        .description {
            color: #4f536c;
        }

        .closing {
            margin-top: 64px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td align="center" style="padding: 10px">
                        <img src="{{ asset('assets/guest/img/image/logo-riau.png') }}" alt="Logo 1" class="logo" />
                        <img src="{{ asset('assets/guest/img/image/logo-disbud.png') }}" alt="Logo 2" class="logo" />
                    </td>
                </tr>
            </table>
        </div>

        <!-- Content -->
        <div class="content">
            <p>Halo <span class="name">Dinas Kebudayaan</span>,</p>
            <p class="description"> 
                {{ $messages }}
            </p>
            <p class="closing">
                <span class="description">Salam hangat,</span><br />
                {{ $name }} <br>
                {{ $sender }}
            </p>
        </div>
    </div>
</body>

</html>
