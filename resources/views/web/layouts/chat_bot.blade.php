    <!-- Social Media Floating Buttons -->
    <div class="social-float">
        <a href="https://wa.me/{{ setting('whatsapp') }}" class="whatsapp-btn bg-success whatsapp-float">
            <div class="whatsapp-content">
                <i class="fab fa-whatsapp text-white"></i>
                <span class="whatsapp-text">{{ __('attributes.contuctWhatsapp') }}</span>
            </div>
        </a>
        <button class="chat-btn rounded-circle bg-white chat-float" id="chatBtn">
            <!-- <i class="far fa-comment-dots text-primary"></i> -->
            <img src="{{ asset('web/images/chatbot.svg') }}" alt="{{ setting('name') ?? '' }}">
        </button>
    </div>

    <!-- Chat Modal -->
    <div class="chat-container" id="chatContainer">
        <div class="chat-header text-center">
            <div class="chat-logo">
                <img src="{{ asset('web/images/logo-white.svg') }}" alt="{{ setting('name') ?? '' }}"
                    width="30">
                <span>{{ setting('name') ?? '' }}</span>
            </div>
            <div class="chat-actions">
                <span class="chat-title">{{ __('attributes.Questions') }}</span>
                <button class="close-chat" id="closeChat">&times;</button>
            </div>
        </div>
        <div class="chat-body" id="chatBody">
            <div class="chat-website">
                <span>{{ setting('website') ?? '' }}</span>
            </div>
            <div class="chat-message">
                <div class="chat-avatar">
                    <img src="{{ asset('web/images/logo-white.svg') }}" alt="{{ setting('title') ?? '' }}"
                        width="30">
                </div>
                <div class="chat-bubble">
                    <span>{{ __('attributes.HowHelp') }}</span>
                </div>
            </div>
            <div id="chatSuggestions">
                @foreach (\App\Models\Faq::where('active', 1)->orderBy('position')->limit(4)->get() as $suggestion)
                    <button
                        class="suggestion-btn">{{ $suggestion->getTranslation('question', app()->getLocale()) }}</button>
                @endforeach
            </div>
        </div>
        <div class="chat-footer">
            <input type="text" class="chat-input" id="chatInput"
                placeholder="{{ __('attributes.TypeMessage') }}">
            <button class="chat-send" id="sendMessage">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>