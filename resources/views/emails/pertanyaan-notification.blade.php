<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New {{ $jenis }} Question</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #2c3e50;
            background: linear-gradient(135deg, #1b7a7b 0%, #2d9b9c 100%);
            padding: 40px 20px;
        }

        .email-wrapper {
            max-width: 600px;
            margin: 0 auto;
        }

        .container {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .header {
            background: linear-gradient(135deg, #1b7a7b 0%, #2d9b9c 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .header p {
            font-size: 14px;
            opacity: 0.9;
        }

        .icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .content {
            padding: 40px 30px;
        }

        .intro {
            font-size: 16px;
            color: #555;
            margin-bottom: 30px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #1b7a7b;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .info-item {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #e9ecef;
        }

        .info-item.full {
            grid-column: 1 / -1;
        }

        .field-label {
            font-weight: 600;
            color: #1b7a7b;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
            display: block;
        }

        .field-value {
            color: #2c3e50;
            font-size: 15px;
            word-wrap: break-word;
        }

        .field-value a {
            color: #1b7a7b;
            text-decoration: none;
            border-bottom: 1px solid #1b7a7b;
            transition: all 0.3s ease;
        }

        .field-value a:hover {
            color: #2d9b9c;
        }

        .badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-business {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
        }

        .badge-general {
            background: linear-gradient(135deg, #1b7a7b 0%, #2d9b9c 100%);
            color: white;
        }

        .message-box {
            background: linear-gradient(135deg, #f5f7fa 0%, #e8f4f5 100%);
            border-left: 4px solid #1b7a7b;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            font-style: italic;
            line-height: 1.8;
            color: #2c3e50;
        }

        .timestamp {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
            font-size: 13px;
            color: #95a5a6;
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #1b7a7b 0%, #2d9b9c 100%);
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            margin-top: 20px;
            transition: all 0.3s ease;
            text-align: center;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(27, 122, 123, 0.4);
        }

        .footer {
            background: #f8f9fa;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }

        .footer p {
            font-size: 13px;
            color: #7f8c8d;
            margin: 5px 0;
        }

        .footer-links {
            margin: 15px 0;
        }

        .footer-links a {
            color: #1b7a7b;
            text-decoration: none;
            margin: 0 10px;
            font-size: 13px;
        }

        .divider {
            height: 1px;
            background: #e9ecef;
            margin: 20px 0;
        }

        @media (max-width: 600px) {
            .info-grid {
                grid-template-columns: 1fr;
            }

            .header h1 {
                font-size: 24px;
            }

            .content {
                padding: 25px 20px;
            }
        }
    </style>
</head>

<body>
    <div class="email-wrapper">
        <div class="container">
            <!-- Header -->
            <div class="header">
                <div class="icon">📬</div>
                <h1>New {{ $jenis }} Question</h1>
                <p>You have received a new inquiry from your website</p>
            </div>

            <!-- Content -->
            <div class="content">
                <div class="intro">
                    <strong>Hello Admin!</strong> A new {{ strtolower($jenis) }} question has been submitted. Please
                    review the details below.
                </div>

                <!-- Info Grid -->
                <div class="info-grid">
                    <!-- Type Badge -->
                    <div class="info-item">
                        <span class="field-label">📋 Question Type</span>
                        <span class="badge {{ $pertanyaan->jenis === 'bisnis' ? 'badge-business' : 'badge-general' }}">
                            {{ $jenis }}
                        </span>
                    </div>

                    <!-- Name -->
                    <div class="info-item">
                        <span class="field-label">👤 Full Name</span>
                        <div class="field-value">{{ $pertanyaan->name }}</div>
                    </div>

                    <!-- Email -->
                    <div class="info-item">
                        <span class="field-label">📧 Email Address</span>
                        <div class="field-value">
                            <a href="mailto:{{ $pertanyaan->email }}">{{ $pertanyaan->email }}</a>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="info-item">
                        <span class="field-label">📱 Phone Number</span>
                        <div class="field-value">{{ $pertanyaan->phone }}</div>
                    </div>

                    @if ($pertanyaan->company)
                        <!-- Company -->
                        <div class="info-item">
                            <span class="field-label">🏢 Company Name</span>
                            <div class="field-value">{{ $pertanyaan->company }}</div>
                        </div>
                    @endif

                    <!-- Subject -->
                    <div class="info-item {{ !$pertanyaan->company ? 'full' : '' }}">
                        <span class="field-label">💼 Subject</span>
                        <div class="field-value">{{ $pertanyaan->subject }}</div>
                    </div>
                </div>

                <!-- Divider -->
                <div class="divider"></div>

                <!-- Message -->
                <div>
                    <span class="field-label">💬 Message</span>
                    <div class="message-box">
                        {{ $pertanyaan->message }}
                    </div>
                </div>

                <!-- Timestamp -->
                {{-- <div class="timestamp">
                    ⏰ Submitted on: <strong>{{ $pertanyaan->created_at->format('d F Y') }}</strong> at
                    <strong>{{ $pertanyaan->created_at->format('H:i:s') }}</strong>
                </div> --}}
            </div>

            <!-- Footer -->
            <div class="footer">
                <p><strong>PT SENA</strong></p>
                <p>This is an automated notification from PT SENA website</p>
                <div class="footer-links">
                    <a href="https://pt-sena.co.id">Visit Website</a> •
                    <a href="mailto:info@pt-sena.co.id">Contact Us</a>
                </div>
                <p style="margin-top: 15px; font-size: 12px; color: #95a5a6;">&copy; {{ date('Y') }} PT SENA. All
                    rights reserved.</p>
            </div>
        </div>
    </div>
</body>

</html>
