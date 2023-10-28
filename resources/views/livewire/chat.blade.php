<div wire:poll>
    <div class="container">

            @if (auth()->user()->email == "hassan@gmail.com")
            <a class="btn btn-primary pull-right" href="{{ Url('delete_chat') }}">حذف المحادثة</a>
            @endif
            <h3 class=" text-center">CHAT</h3>

        <br>
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
                                    {{-- <div class="incoming_msg_img">
                                        <img  width="50px" height="50px" src="https://ptetutorials.com/images/user-profile.png" alt="user"> 
                                    </div> --}}
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
                            <h5 style="text-align: center;color:red"> لاتوجد رسائل سابقة</h5>
                        @endforelse

                    </div><br>
                    <div class="type_msg">
                        <div id="myForm" class="input_msg_write">
                            <form wire:submit.prevent="sendMessage">
                                <input id="messageInput" onkeydown='scrollDown()' wire:model.defer="messageText" type="text"
                                    class="write_msg" placeholder="اكتب رسالتك" required/>
                                <button style="background-color: #05728f;" class="msg_send_btn" type="submit">ارسال</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
