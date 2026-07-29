<x-app-layout>

<div class="space-y-8">

    <!-- Welcome -->
    <div class="bg-gradient-to-r from-violet-600 to-fuchsia-600 rounded-xl shadow-lg p-6 text-white">

        <h1 class="text-3xl font-bold">
            Welcome Back,
            {{ Auth::user()->name }}
        </h1>

        <p class="mt-2 text-violet-100">
            Manage your school from one place.
        </p>

    </div>

    <!-- Statistics -->

    <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">

        <div class="bg-white rounded-xl shadow p-5">
            <h3 class="text-gray-500">Students</h3>
            <p class="text-3xl font-bold text-blue-600">
                {{ $students }}
            </p>
        </div>

        <div class="bg-white rounded-xl shadow p-5">
            <h3 class="text-gray-500">Teachers</h3>
            <p class="text-3xl font-bold text-green-600">
                {{ $teachers }}
            </p>
        </div>

        <div class="bg-white rounded-xl shadow p-5">
            <h3 class="text-gray-500">Classes</h3>
            <p class="text-3xl font-bold text-purple-600">
                {{ $classes }}
            </p>
        </div>

        <div class="bg-white rounded-xl shadow p-5">
            <h3 class="text-gray-500">Subjects</h3>
            <p class="text-3xl font-bold text-orange-600">
                {{ $subjects }}
            </p>
        </div>

    </div>

    <!-- Quick Actions -->

    <div class="bg-white rounded-xl shadow p-6">

        <h2 class="text-xl font-bold mb-5">
            Quick Actions
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">

            <a href="{{ route('students.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white rounded-lg p-4 text-center">

                Add Student

            </a>

            <a href="{{ route('teachers.create') }}"
               class="bg-green-600 hover:bg-green-700 text-white rounded-lg p-4 text-center">

                Add Teacher

            </a>

            <a href="{{ route('attendances.create') }}"
               class="bg-purple-600 hover:bg-purple-700 text-white rounded-lg p-4 text-center">

                Take Attendance

            </a>

            <a href="{{ route('results.create') }}"
               class="bg-red-600 hover:bg-red-700 text-white rounded-lg p-4 text-center">

                Enter Result

            </a>

        </div>

    </div>
<div class="card mt-4">
    <div class="card-header bg-primary text-white">
        🤖 School AI Assistant
    </div>

    <div class="card-body">

        <div id="chat-box" style="height:300px; overflow-y:auto; border:1px solid #ddd; padding:10px;">
        </div>

        <div class="mt-3 d-flex">
            <input
                type="text"
                id="message"
                class="form-control"
                placeholder="Ask anything about the school...">

            <button
                class="btn btn-primary ms-2"
                id="send-btn">

                Send

            </button>
        </div>

    </div>
</div>
</div>
<script>
document.getElementById('send-btn').addEventListener('click', function () {

    const message = document.getElementById('message').value;

    if (!message.trim()) return;

    const chatBox = document.getElementById('chat-box');

    chatBox.innerHTML += `
        <div class="mb-2">
            <strong>You:</strong> ${message}
        </div>
    `;

    fetch("{{ route('chat.ask') }}", {

        method: "POST",

        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },

        body: JSON.stringify({
            message: message
        })

    })
    .then(res => res.json())
    .then(data => {

        chatBox.innerHTML += `
            <div class="mb-3 text-primary">
                <strong>AI:</strong> ${data.reply}
            </div>
        `;

        document.getElementById('message').value = "";

        chatBox.scrollTop = chatBox.scrollHeight;

    })
    .catch(() => {

        chatBox.innerHTML += `
            <div class="text-danger">
                Failed to contact AI.
            </div>
        `;

    });

});
</script>
</x-app-layout>