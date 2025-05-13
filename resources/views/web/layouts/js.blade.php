    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('web/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/19.2.16/js/intlTelInput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('js')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    text: "{{ session('error') }}",
                    timer: 5000,
                    showConfirmButton: false
                });
            @endif

            @if (session('success'))
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    text: "{{ session('success') }}",
                    timer: 1500,
                    showConfirmButton: false
                });
            @endif
        });
    </script>
    <script>
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'F12' || (e.ctrlKey && e.shiftKey && e.key === 'I')) {
                e.preventDefault();
            }
        });
    </script>

    {{-- chat Bot --}}
    <script>
        const sendButton = document.getElementById('sendMessage');
        const chatBody = document.getElementById('chatBody');
        const chatInput = document.getElementById('chatInput');

        sendButton.addEventListener('click', function() {
            const message = chatInput.value.trim();
            if (message) {
                appendMessage('user', message);
                chatInput.value = '';

                fetch('/ask-question', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            question: message
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        appendMessage('bot', data.answer);
                    })
                    .catch(error => console.error('Error:', error));
            }
        });

        function appendMessage(sender, message) {
            const messageDiv = document.createElement('div');
            messageDiv.classList.add('chat-message', sender);

            const avatarDiv = document.createElement('div');
            avatarDiv.classList.add('chat-avatar');
            avatarDiv.innerHTML = sender === 'user' ?
                `<img src="{{ asset('web/images/user.png') }}" width="30">` :
                `<img src="{{ asset('web/images/logo-white.svg') }}" width="30">`;

            const bubbleDiv = document.createElement('div');
            bubbleDiv.classList.add('chat-bubble');
            bubbleDiv.innerHTML = `<span>${message}</span>`;

            messageDiv.appendChild(avatarDiv);
            messageDiv.appendChild(bubbleDiv);
            chatBody.appendChild(messageDiv);

            chatBody.scrollTop = chatBody.scrollHeight;
        }

        document.querySelectorAll('.suggestion-btn').forEach(button => {
            button.addEventListener('click', function() {
                const selectedQuestion = this.textContent;
                appendMessage('user', selectedQuestion);

                document.getElementById('chatSuggestions').style.display = 'none';

                fetch('/ask-question', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            question: selectedQuestion
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        appendMessage('bot', data.answer);
                        showSuggestionsAgain();
                    })
                    .catch(error => console.error('Error:', error));
            });
        });

        function showSuggestionsAgain() {
            const chatSuggestions = document.getElementById('chatSuggestions');

            chatSuggestions.style.display = 'none';

            setTimeout(() => {
                const suggestionContainer = document.createElement('div');
                suggestionContainer.classList.add('chat-message', 'bot');

                const suggestionBubble = document.createElement('div');
                suggestionBubble.classList.add('chat-bubble');

                suggestionBubble.innerHTML = `
            <span>{{ __('attributes.DoYouHelp') }}</span>
            <div id="chatSuggestions">
                @foreach (\App\Models\Faq::where('active', 1)->orderBy('position')->limit(4)->get() as $suggestion)
                    <button class="suggestion-btn">{{ $suggestion->getTranslation('question', app()->getLocale()) }}</button>
                @endforeach
            </div>
        `;

                suggestionContainer.appendChild(suggestionBubble);
                chatBody.appendChild(suggestionContainer);

                chatSuggestions.style.display = 'block';

                chatBody.scrollTop = chatBody.scrollHeight;

                document.querySelectorAll('.suggestion-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const selectedQuestion = this.textContent;
                        appendMessage('user',
                            selectedQuestion);

                        chatSuggestions.style.display = 'none';

                        fetch('/ask-question', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                },
                                body: JSON.stringify({
                                    question: selectedQuestion
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                appendMessage('bot', data
                                    .answer);
                                showSuggestionsAgain();
                            })
                            .catch(error => console.error('Error:', error));
                    });
                });

            }, 2000);
        }
    </script>
