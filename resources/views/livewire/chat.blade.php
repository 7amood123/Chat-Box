<div wire:poll>
    @if(session('new_user_registered'))
        <div class="alert alert-success">
            {{ session('new_user_registered') }}
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                let alert = document.querySelector('.alert');
                if (alert) {
                    alert.style.transition = 'opacity 0.5s ease';
                    alert.style.opacity = '0';
                    setTimeout(function () {
                        alert.remove();
                    }, 500);
                }
            }, 3000); // 3 seconds
        });
    </script>
    <div class="container">

        <h3 class=" text-center">

            @if (auth()->user()->email == 'mohag@taglaw.ps')
                <a class="btn btn-primary" href="{{ Url('delete_chat') }}">Delete messages</a>
            @endif
            Soul
        </h3>
        <div class="messaging">
            <div class="inbox_msg">
                <div class="mesgs">
                    <div id="chat" class="msg_history">
                        @forelse ($messages as $message)

                            @if ($message->user->name == auth()->user()->name)
                                <!-- Reciever Message-->
                                <div class="outgoing_msg">
                                    <div class="sent_msg">
                                        <p>{{ $message->message_text }}</p>
                                        <span class="time_date">
                                            {{ $message->created_at->diffForHumans(null, false, false) }}</span>
                                    </div>
                                </div>

                            @else

                                <div class="incoming_msg">{{ $message->user->name }}
                                    <div class="incoming_msg_img"> <img
                                            src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p>{{ $message->message_text }}</p>
                                            <span
                                                class="time_date">{{ $message->created_at->diffForHumans(null, false, false) }}</span>
                                        </div>
                                    </div>
                                </div>

                            @endif
                        @empty
                            <h5 style="text-align: center;color:red"> No messages yet </h5>
                        @endforelse

                    </div>
                    <div class="type_msg">
                        <div class="input_msg_write">
                            <form wire:submit.prevent="sendMessage">
                                <input onkeydown='scrollDown()' wire:model.defer="messageText" type="text"
                                    class="write_msg" placeholder="Write your message.." />
                                <button class="msg_send_btn" type="submit">Send</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
