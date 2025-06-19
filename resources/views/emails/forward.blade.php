<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Forwarded Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .original-header {
            background-color: #f5f5f5;
            padding: 15px;
            margin-bottom: 20px;
            border-left: 4px solid #007bff;
        }
        .header-item {
            margin-bottom: 5px;
        }
        .header-label {
            font-weight: bold;
        }
        .email-content {
            padding: 15px;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div>
            <p>---------- Forwarded message ----------</p>
        </div>
        
        <div class="original-header">
            <div class="header-item">
                <span class="header-label">From:</span> {{ $originalMessage->from }}
            </div>
            <div class="header-item">
                <span class="header-label">Date:</span> {{ $originalMessage->received_at->format('D, M d, Y, h:i A') }}
            </div>
            <div class="header-item">
                <span class="header-label">Subject:</span> {{ $originalMessage->subject }}
            </div>
            <div class="header-item">
                <span class="header-label">To:</span> {{ $originalMessage->temporaryEmail->email }}
            </div>
        </div>
        
        <div class="email-content">
            @if ($originalMessage->body_html)
                {!! $originalMessage->body_html !!}
            @else
                <pre>{{ $originalMessage->body_text }}</pre>
            @endif
        </div>
    </div>
</body>
</html> 