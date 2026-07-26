<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600 dark:text-transparent dark:bg-clip-text dark:bg-gradient-to-r dark:from-violet-400 dark:to-fuchsia-400 leading-tight">
            {{ __('AI Assistant') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl overflow-hidden transition hover:shadow-2xl"
                 x-data="chatAssistant()"
                 x-init="init()"
                 @keydown.window.prevent.cmd.enter="send()"
                 @keydown.window.prevent.ctrl.enter="send()">

                <!-- Messages -->
                <div class="p-6 h-[60vh] overflow-y-auto space-y-4" x-ref="messages">
                    <template x-for="(message, index) in messages" :key="index">
                        <div :class="message.role === 'user' ? 'text-right' : 'text-left'">
                            <div :class="message.role === 'user'
                                ? 'inline-block bg-gradient-to-r from-violet-600 to-fuchsia-600 text-white rounded-2xl px-4 py-2 max-w-[80%] text-left whitespace-pre-wrap shadow-lg'
                                : 'inline-block bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-2xl px-4 py-2 max-w-[80%] text-left whitespace-pre-wrap'"
                                x-text="message.content"></div>
                        </div>
                    </template>

                    <div x-show="loading" class="text-left">
                        <div class="inline-block bg-gray-100 dark:bg-gray-700 rounded-2xl px-4 py-2 text-gray-500">
                            <span class="animate-pulse">Thinking…</span>
                        </div>
                    </div>
                </div>

                <!-- Composer -->
                <div class="border-t border-gray-200 dark:border-gray-700 p-4">
                    <form @submit.prevent="send()" class="flex gap-2">
                        <textarea
                            x-model="input"
                            @keydown.enter.prevent="send()"
                            rows="1"
                            placeholder="Ask about students, classes, attendance…"
                            class="flex-1 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-violet-500 focus:ring-2 focus:ring-violet-500 resize-none"></textarea>

                        <button type="submit"
                            :disabled="loading || !input.trim()"
                            class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-violet-600 to-fuchsia-600 hover:from-violet-700 hover:to-fuchsia-700 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest disabled:opacity-50 disabled:cursor-not-allowed transition transform hover:scale-105 shadow">
                            Send
                        </button>
                    </form>
                    <p class="mt-2 text-xs text-gray-400">Powered by Anthropic Claude. Press Enter to send, Shift+Enter for a new line.</p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function chatAssistant() {
                return {
                    messages: [],
                    input: '',
                    loading: false,

                    init() {
                        this.messages.push({
                            role: 'assistant',
                            content: 'Hi! I\'m SchoolMate, your school management assistant. How can I help you today?'
                        });
                    },

                    scrollToBottom() {
                        this.$nextTick(() => {
                            this.$refs.messages.scrollTop = this.$refs.messages.scrollHeight;
                        });
                    },

                    async send() {
                        const text = this.input.trim();
                        if (!text || this.loading) {
                            return;
                        }

                        this.messages.push({ role: 'user', content: text });
                        this.input = '';
                        this.loading = true;
                        this.scrollToBottom();

                        const assistantIndex = this.messages.push({ role: 'assistant', content: '' }) - 1;

                        try {
                            const response = await fetch('{{ route('chat.send') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                    'Accept': 'text/event-stream',
                                },
                                body: JSON.stringify({ messages: this.messages.filter(m => m.content !== '') }),
                            });

                            if (!response.ok) {
                                throw new Error('Request failed with status ' + response.status);
                            }

                            const reader = response.body.getReader();
                            const decoder = new TextDecoder();
                            let buffer = '';

                            while (true) {
                                const { value, done } = await reader.read();
                                if (done) {
                                    break;
                                }

                                buffer += decoder.decode(value, { stream: true });

                                let newlineIndex;
                                while ((newlineIndex = buffer.indexOf('\n\n')) !== -1) {
                                    const raw = buffer.slice(0, newlineIndex).trim();
                                    buffer = buffer.slice(newlineIndex + 2);

                                    if (!raw.startsWith('data:')) {
                                        continue;
                                    }

                                    const payload = JSON.parse(raw.slice(5).trim());

                                    if (payload.error) {
                                        this.messages[assistantIndex].content = 'Error: ' + payload.error;
                                        break;
                                    }

                                    if (payload.token) {
                                        this.messages[assistantIndex].content += payload.token;
                                        this.scrollToBottom();
                                    }
                                }
                            }
                        } catch (error) {
                            this.messages[assistantIndex].content = 'Something went wrong: ' + error.message;
                        } finally {
                            this.loading = false;
                            this.scrollToBottom();
                        }
                    },
                };
            }
        </script>
    @endpush
</x-app-layout>
