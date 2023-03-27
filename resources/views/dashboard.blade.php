<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Project List</h3>
                <p class="text-subtitle text-muted">This is the main page.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                {{-- <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav> --}}
            </div>
        </div>
    </x-slot>

    <section class="section">
        <div class="card shadow-sm">
            <div class="card-header">
                {{-- <h4 class="card-title text-center">List Projects</h4> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Location</th>
                                <th scope="col">Tester</th>
                                <th scope="col">Approver</th>
                                <th scope="col">Area of Cone</th>
                                <th scope="col">Area of Mandle</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->location }}</td>
                                    <td>{{ $item->tester }}</td>
                                    <td>{{ $item->approver }}</td>
                                    <td>{{ $item->area_of_cone }}</td>
                                    <td>{{ $item->area_of_mandle }}</td>
                                    <td> <a class="btn btn-success" href="detail/{{ $item->id }}">Detail</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
