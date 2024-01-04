@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-chat">
            <h1>Chat Room</h1>

            <div class="chat-box" id="chat-box">
                @foreach ($users as $user)
                    <div class="message">
                        <p><strong>Sender:</strong> <a href="#" class="open-modal" data-sender="{{ $user->id }}" data-name="{{ $user->name }}">{{ $user->name }}</a></p>
                    </div>
                @endforeach
            </div>

            <div id="chatModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="chatModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="chatModalLabel">Chat with <span id="userChatName"></span></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body message-container" id="chatModalBody">
                            <!-- Chat messages will be displayed here -->
                        </div>
                        <div class="modal-footer">
                            <input type="text" id="message" placeholder="Type your message">
                            <button id="send">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .message-container {
            overflow-y: auto;
            max-height: 300px;
            padding: 10px;
        }

        .received-message {
            background-color: #f1f0f0;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
            max-width: 70%;
            word-wrap: break-word;
            float: left;
            clear: both;
        }

        .sent-message {
            background-color: #dcf8c6;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
            max-width: 70%;
            word-wrap: break-word;
            float: right;
            clear: both;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.open-modal').click(function () {
                var senderId = $(this).data('sender');
                var chatMessages = getChatMessages(senderId);
                var userName = $(this).data('name');

                // Display the chat messages and user name in the modal
                $('#chatModalBody').html(chatMessages);
                $('#userChatName').text(userName);

                // Show the modal
                $('#chatModal').modal('show');
            });

            function getChatMessages(senderId) {
                // You need to implement the logic to fetch chat messages for the given senderId
                // This could involve making an AJAX request to your server
                // For now, let's assume you have the chat messages in a variable

                // Let's use Blade syntax to iterate over the chat messages
                var chatMessages = `
                    @foreach($chats as $chat)
                        @if($chat->id_sender == 22 )
                            <div class="sent-message">{{ $chat->message }}</div>
                        @else
                            <div class="received-message">{{ $chat->message }}</div>
                        @endif
                    @endforeach
                `;

                return chatMessages;
            }
        });
    </script>
@endsection
