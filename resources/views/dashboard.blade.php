<x-app-layout>
    <x-slot name="header">
        <div class="text-center">
            <x-auth-session-status :status="session('status')" />
        </div>
    </x-slot>

    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-100">

         <div class="max-w-7xl bg-red grid grid-cols-3 font-sans py-6 gap-4">

            <h2>signed in!</h2>
         </div>

    </div>

</x-app-layout>
