<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body,
        table,
        td,
        a {
            text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        /* Container */
        body {
            margin: 0;
            padding: 0;
            width: 100% !important;
            font-family: Arial, sans-serif;
            color: #333;
        }

        .email-container {
            max-width: 600px;
            margin: auto;
            background: #f9f9f9;
            padding: 20px;
        }

        /* Main */
        .header {
            background: #f2bb15;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 20px;
            background: #fff;
            border-radius: 8px;
        }

        .content h2 {
            font-size: 20px;
            color: #f2bb15;
            margin: 0 0 10px;
        }

        .content p {
            line-height: 1.6;
            color: #666;
            margin: 5px 0;
            font-size: 14px;
            font-weight: 400;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #999;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <table role="presentation" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td>
                <div class="email-container">
                    <!-- Header -->
                    <div class="header">
                        <h1>Pesan dari {{ env('APP_URL') }}</h1>
                    </div>

                    <!-- Content -->
                    <div class="content">
                        <h2>Halo, Admin!</h2>
                        <p>Anda telah menerima pesan baru dari formulir Hubungi Kami di website:</p>

                        <p><strong>Nama:</strong>{{ $name }}</p>
                        <p><strong>Email:</strong> {{ $receiver }}</p>
                        <p><strong>Pesan:</strong></p>
                        <p>
                            {{ $messages }}
                        </p>

                        <br>
                        <br>
                        <p>Terima kasih!</p>
                    </div>

                    <!-- Footer -->
                    <div class="footer">
                        <p>&copy; Copyright {{ now()->year }} by {{ config('app.name') }}</p>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>
