<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-gray-100">

@include('layouts.sidebar')

<div class="lg:ml-64 min-h-screen">

@include('layouts.header')

<main class="p-4 md:p-8">

{{ $slot }}

</main>

</div>

<script>

const btn=document.getElementById('menuButton');

const sidebar=document.getElementById('sidebar');

btn?.addEventListener('click',()=>{

sidebar.classList.toggle('-translate-x-full');

});

</script>

</body>

</html>