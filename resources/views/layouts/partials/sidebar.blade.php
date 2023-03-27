<x-maz-sidebar :href="route('dashboard')" :logo="asset('images/logo/logo.png')">

    <!-- Add Sidebar Menu Items Here -->

    <x-maz-sidebar-item name="Dashboard" :link="route('dashboard')" icon="bi bi-grid-fill"></x-maz-sidebar-item>

    {{-- <x-maz-sidebar-item name="Search Projects" icon="bi bi-stack">
        <x-maz-sidebar-item name="Detail" :link="route('detail')" icon="bi bi-grid-fill"> </x-maz-sidebar-item>
        <x-maz-sidebar-sub-item name="Alert" :link="route('components.alert')"></x-maz-sidebar-sub-item>
    </x-maz-sidebar-item> --}}

</x-maz-sidebar>
