<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit Student</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto">

            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('students.update', $student) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

                @php($button = 'Update Student')

                @include('students._form')

            </form>

        </div>
    </div>
</x-app-layout>