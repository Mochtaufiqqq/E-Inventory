<div>

    @include('livewire.usermodal')

    <div class="container-fluid">
        @if (session()->has('message'))
        <h5 class="alert alert-success alert-dismissible fade show" data-bs-dismiss="alert" aria-label="Close">
            {{ session('message') }}</h5>
        @endif

        <div class="page-title">
            <div class="card card-absolute mt-5 mt-md-4">
                <div class="card-header bg-primary">
                    <h5 class="text-white">
                        📅📚 • Atur Jadwal Pelajaran
                    </h5>
                </div>
                <div class="card-body">
                    <p>
                        Dibawah ini adalah form untuk tambah jadwal pelajaran mata kuliahmu.
                        <span class="d-none d-md-inline">
                            Data dibawah pastikan kamu isi dengan benar dan lengkap ya, nanti datanya akan kami simpan
                            dan dapat kamu akses dimana saja dan kapan saja.
                        </span>
                    </p>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="card">
                <div class="card-header">
                       <div class="dt-buttons btn-group flex-wrap">
                        <a href="{{ url('/reportpdfuser') }}" target="_blank" class="btn btn-info btn-md"> PDF</a>
                        <a href="#" target="_blank" class="btn btn-info btn-md">Excell</a></div>
                        <h5 class="text-center text-me mb-3">All Users</h5>
                    <input type="search" wire:model="search" class="form-control" placeholder="Search item..." style="width: 1300px" />
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $index => $u)
                            <tr>
                                <td>{{ $users->firstItem() + $index }}</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->address }}</td>
                                <td>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#updateUserModal"
                                        wire:click="editUser({{$u->id}})" class="btn btn-primary">
                                        Edit
                                    </button>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#deleteUserModal"
                                        wire:click="deleteUser({{$u->id}})" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No Record Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
