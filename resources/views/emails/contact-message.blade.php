<!DOCTYPE html>
<html>

<head>
    <title>Pesan Baru dari Form Kontak</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f7f9fc;
            margin: 0;
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            background: #f8f9fa;
            color: black;
            padding: 30px;
            text-align: center;
        }

        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }

        .email-body {
            padding: 30px;
        }

        .info-card {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
        }

        .info-item {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e9ecef;
        }

        .info-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .label {
            font-weight: 600;
            color: #495057;
            display: block;
            margin-bottom: 5px;
        }

        .value {
            color: #212529;
            font-size: 16px;
        }

        .message-content {
            background: #fff;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
        }

        .email-footer {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            color: #6c757d;
            font-size: 14px;
        }

        .timestamp {
            color: #868e96;
            font-size: 14px;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="email-container">

        <div class="email-header">
            <h1>Pesan Kontak Baru</h1>
            <p>Anda menerima pesan baru dari form kontak website</p>
        </div>


        <div class="email-body">
            <div class="timestamp">
                Diterima pada: {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y H:i') }}
            </div>

            <div class="info-card">
                <div class="info-item">
                    <span class="label">Nama Lengkap</span>
                    <span class="value">{{ $data['name'] }}</span>
                </div>

                <div class="info-item">
                    <span class="label">Email</span>
                    <span class="value">
                        <a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a>
                    </span>
                </div>

                <div class="info-item">
                    <span class="label"> Nomor Telepon</span>
                    <span class="value">
                        <a href="tel:{{ $data['telephone'] }}">{{ $data['telephone'] }}</a>
                    </span>
                </div>

                <div class="info-item">
                    <span class="label"> Subjek</span>
                    <span class="value">{{ $data['subject'] }}</span>
                </div>
            </div>

            <div class="message-content">
                <div class="label">Pesan:</div>
                <div class="value" style="margin-top: 10px; white-space: pre-line;">{{ $data['message'] }}</div>
            </div>
        </div>

        <div class="email-footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            <p>Email ini dikirim otomatis dari sistem.</p>
        </div>
    </div>
</body>

</html>
