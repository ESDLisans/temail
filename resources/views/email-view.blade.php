@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col gap-6">
            <div class="flex items-center justify-between">
                <a href="{{ route('home') }}" class="text-blue-500 hover:text-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Inbox
                </a>
                <div class="text-gray-500">{{ $email->email }}</div>
            </div>
            
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6 border-b">
                    <h1 class="text-2xl font-semibold mb-2">{{ $message->subject }}</h1>
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-2 text-gray-600">
                        <div>
                            <span class="font-semibold">From:</span> {{ $message->from }}
                        </div>
                        <div>
                            <span class="font-semibold">Received:</span> {{ $message->received_at->format('M d, Y h:i A') }}
                        </div>
                    </div>
                </div>
                
                <div class="p-6 bg-gray-50">
                    @if($message->body_html)
                        <div class="email-content-html prose max-w-none">
                            {!! $message->body_html !!}
                        </div>
                    @elseif($message->body_text)
                        <div class="email-content-text prose max-w-none whitespace-pre-wrap">
                            {{ $message->body_text }}
                        </div>
                    @else
                        <div class="text-gray-500 italic">
                            This email has no content.
                        </div>
                    @endif
                </div>
                
                @if($message->attachments->count() > 0)
                    <div class="p-6 border-t">
                        <h2 class="text-lg font-semibold mb-3">Attachments ({{ $message->attachments->count() }})</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($message->attachments as $attachment)
                                <a href="{{ $attachment->getFileUrl() }}" download="{{ $attachment->filename }}" class="flex items-center p-3 border rounded hover:bg-gray-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <div class="flex flex-col">
                                        <span class="text-sm font-medium truncate max-w-xs">{{ $attachment->filename }}</span>
                                        <span class="text-xs text-gray-500">{{ $attachment->mime_type }} ({{ $attachment->file_size }} bytes)</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            
            @if(isset($ads['email_view']))
                <div class="mt-6">
                    <x-ad-banner :adSlot="$ads['email_view']" />
                </div>
            @endif
        </div>
    </div>
@endsection 