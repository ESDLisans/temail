@extends('layouts.app')

@section('title', 'Email: ' . $message->subject)
@section('meta_description', 'View email from ' . $message->sender_name . ' - ' . \Illuminate\Support\Str::limit(strip_tags($message->body), 150))

@section('content')
    <div class="min-h-screen bg-slate-50 dark:bg-slate-900">
        <div class="max-w-4xl mx-auto px-4 py-8">
            <!-- Header Navigation -->
            <div class="flex items-center justify-between mb-6">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-4 py-2 text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-white dark:hover:bg-slate-800 rounded-lg transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m12 19-7-7 7-7"/><path d="M19 12H5"/>
                    </svg>
                    <span class="font-medium">Back to Inbox</span>
                </a>
                <div class="flex items-center gap-3">
                    <span class="text-sm text-slate-500 dark:text-slate-400">{{ $email->email }}</span>
                    <div class="flex items-center gap-1">
                        <button class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-950 rounded-lg transition-all duration-200" title="Delete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                            </svg>
                        </button>
                        <button class="p-2 text-slate-400 hover:text-amber-500 hover:bg-amber-50 dark:hover:bg-amber-950 rounded-lg transition-all duration-200" title="Star">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Top Email Ad -->
            @php
                $emailTopAd = \App\Models\AdSlot::where('position', 'email_top')->where('is_active', true)->first();
            @endphp
            @if($emailTopAd)
            <div class="mb-6 w-full text-center bg-white dark:bg-slate-800 rounded-xl shadow-md p-4 border border-slate-200 dark:border-slate-700">
                {!! $emailTopAd->ad_code !!}
            </div>
            @endif

            <!-- Email Card -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 overflow-hidden">
                <!-- Email Header -->
                <div class="p-6 border-b border-slate-100 dark:border-slate-700">
                    <div class="flex items-start gap-4">
                        <!-- Sender Avatar -->
                        @php
                            $fromParts = explode(' <', $message->from);
                            $senderName = trim($fromParts[0]);
                            $senderEmail = isset($fromParts[1]) ? trim($fromParts[1], '<>') : $message->from;
                            $firstLetter = mb_substr($senderName, 0, 1, 'UTF-8');
                            
                            // Generate a consistent color based on sender
                            $colors = [
                                'from-blue-400 to-blue-600',
                                'from-green-400 to-green-600', 
                                'from-purple-400 to-purple-600',
                                'from-pink-400 to-pink-600',
                                'from-indigo-400 to-indigo-600',
                                'from-red-400 to-red-600',
                                'from-yellow-400 to-yellow-600',
                                'from-teal-400 to-teal-600'
                            ];
                            $colorIndex = crc32($senderEmail) % count($colors);
                            $gradientColor = $colors[$colorIndex];
                        @endphp
                        <div class="flex-shrink-0">
                            <div class="h-12 w-12 rounded-full bg-gradient-to-br {{ $gradientColor }} flex items-center justify-center text-white font-semibold text-lg shadow-lg">
                                {{ strtoupper($firstLetter) }}
                            </div>
                        </div>

                        <!-- Sender Info -->
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between mb-2">
                                <div>
                                    <h2 class="text-lg font-semibold text-slate-900 dark:text-slate-100">{{ $senderName }}</h2>
                                    <p class="text-sm text-slate-500 dark:text-slate-400">{{ $senderEmail }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-slate-500 dark:text-slate-400">{{ $message->received_at->format('M j, Y') }}</p>
                                    <p class="text-xs text-slate-400 dark:text-slate-500">{{ $message->received_at->format('h:i A') }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400">
                                <span>to</span>
                                <span class="font-medium">{{ $email->email }}</span>
                                @if(!$message->is_read)
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900 dark:text-emerald-300">
                                        New
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Subject -->
                    <div class="mt-4">
                        <h1 class="text-xl font-semibold text-slate-900 dark:text-slate-100 leading-tight">
                            {{ $message->subject ?: 'No Subject' }}
                        </h1>
                    </div>
                </div>

                <!-- Email Content -->
                <div class="email-content">
                    @if($message->body_html)
                        <div class="p-6 prose prose-slate dark:prose-invert max-w-none email-html-content">
                            @php
                                $content = $message->body_html;
                                $emailMiddleAd = \App\Models\AdSlot::where('position', 'email_middle')->where('is_active', true)->first();
                                
                                if($emailMiddleAd) {
                                    // Split content into paragraphs for middle ad insertion
                                    $paragraphs = preg_split('/(<\/p>\s*<p[^>]*>)/i', $content, -1, PREG_SPLIT_DELIM_CAPTURE);
                                    $totalParagraphs = count($paragraphs);
                                    $middleIndex = intval($totalParagraphs / 2);
                                    
                                    // Show first half
                                    for($i = 0; $i < $middleIndex; $i++) {
                                        echo $paragraphs[$i];
                                    }
                                    
                                    // Show middle ad
                                    echo '</div><div class="my-8 text-center bg-slate-50 dark:bg-slate-700/30 rounded-xl p-6 border border-slate-200 dark:border-slate-600">';
                                    echo $emailMiddleAd->ad_code;
                                    echo '</div><div class="p-6 prose prose-slate dark:prose-invert max-w-none email-html-content">';
                                    
                                    // Show second half
                                    for($i = $middleIndex; $i < $totalParagraphs; $i++) {
                                        echo $paragraphs[$i];
                                    }
                                } else {
                                    echo $content;
                                }
                            @endphp
                        </div>
                    @elseif($message->body_text)
                        <div class="p-6 prose prose-slate dark:prose-invert max-w-none">
                            @php
                                $textContent = $message->body_text;
                                $emailMiddleAd = \App\Models\AdSlot::where('position', 'email_middle')->where('is_active', true)->first();
                                
                                if($emailMiddleAd) {
                                    // Split text content by line breaks
                                    $lines = explode("\n", $textContent);
                                    $totalLines = count($lines);
                                    $middleIndex = intval($totalLines / 2);
                                    
                                    // Show first half
                                    echo '<div class="whitespace-pre-wrap text-slate-700 dark:text-slate-300 leading-relaxed">';
                                    echo implode("\n", array_slice($lines, 0, $middleIndex));
                                    echo '</div>';
                                    
                                    // Show middle ad
                                    echo '</div><div class="my-8 text-center bg-slate-50 dark:bg-slate-700/30 rounded-xl p-6 border border-slate-200 dark:border-slate-600">';
                                    echo $emailMiddleAd->ad_code;
                                    echo '</div><div class="p-6 prose prose-slate dark:prose-invert max-w-none">';
                                    
                                    // Show second half
                                    echo '<div class="whitespace-pre-wrap text-slate-700 dark:text-slate-300 leading-relaxed">';
                                    echo implode("\n", array_slice($lines, $middleIndex));
                                    echo '</div>';
                                } else {
                                    echo '<div class="whitespace-pre-wrap text-slate-700 dark:text-slate-300 leading-relaxed">';
                                    echo $textContent;
                                    echo '</div>';
                                }
                            @endphp
                        </div>
                    @else
                        <div class="p-6 text-center py-12">
                            <div class="h-16 w-16 mx-auto mb-4 rounded-full bg-slate-100 dark:bg-slate-700 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400">
                                    <rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-slate-900 dark:text-slate-100 mb-1">No Content</h3>
                            <p class="text-slate-500 dark:text-slate-400">This email doesn't contain any readable content.</p>
                        </div>
                    @endif
                </div>

                <!-- Attachments -->
                @if($message->attachments->count() > 0)
                    <div class="border-t border-slate-100 dark:border-slate-700 p-6">
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100 mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m21.44 11.05-9.19 9.19a6 6 0 0 1-8.49-8.49l8.57-8.57A4 4 0 1 1 18 8.84l-8.59 8.57a2 2 0 0 1-2.83-2.83l8.49-8.48"/>
                            </svg>
                            Attachments ({{ $message->attachments->count() }})
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            @foreach($message->attachments as $attachment)
                                <a href="{{ $attachment->getFileUrl() }}" download="{{ $attachment->filename }}" class="group flex items-center gap-3 p-4 border border-slate-200 dark:border-slate-600 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-700 transition-all duration-200">
                                    <div class="flex-shrink-0">
                                        <div class="h-10 w-10 rounded-lg bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 dark:text-blue-400">
                                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="font-medium text-slate-900 dark:text-slate-100 truncate group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                            {{ $attachment->filename }}
                                        </p>
                                        <p class="text-sm text-slate-500 dark:text-slate-400">
                                            {{ $attachment->mime_type }} • {{ number_format($attachment->file_size / 1024, 1) }} KB
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/>
                                        </svg>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Actions Footer -->
                <div class="border-t border-slate-100 dark:border-slate-700 p-4 bg-slate-50 dark:bg-slate-800/50">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <button class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-950 rounded-lg transition-all duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m3 16 4 4 4-4"/><path d="M7 20V4"/><path d="M11 4h4"/><path d="M11 8h7"/><path d="M11 12h10"/>
                                </svg>
                                Forward
                            </button>
                            <button class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 hover:text-amber-600 dark:hover:text-amber-400 hover:bg-amber-50 dark:hover:bg-amber-950 rounded-lg transition-all duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                                </svg>
                                {{ $message->is_starred ? 'Unstar' : 'Star' }}
                            </button>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                            </svg>
                            <span>Received {{ $message->received_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Email Ad -->
            @php
                $emailBottomAd = \App\Models\AdSlot::where('position', 'email_bottom')->where('is_active', true)->first();
            @endphp
            @if($emailBottomAd)
            <div class="mt-8 w-full text-center bg-white dark:bg-slate-800 rounded-xl shadow-md p-4 border border-slate-200 dark:border-slate-700">
                {!! $emailBottomAd->ad_code !!}
            </div>
            @endif
        </div>
    </div>

    <style>
        /* Custom styles for email content */
        .email-html-content {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
        }
        
        .email-html-content img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }
        
        .email-html-content table {
            width: 100%;
            border-collapse: collapse;
            margin: 1rem 0;
        }
        
        .email-html-content th,
        .email-html-content td {
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .email-html-content th {
            background-color: #f8fafc;
            font-weight: 600;
        }
        
        .dark .email-html-content th {
            background-color: #1e293b;
        }
        
        .email-html-content blockquote {
            border-left: 4px solid #e2e8f0;
            padding-left: 1rem;
            margin: 1rem 0;
            font-style: italic;
            color: #64748b;
        }
        
        .dark .email-html-content blockquote {
            border-left-color: #475569;
            color: #94a3b8;
        }
    </style>
@endsection 