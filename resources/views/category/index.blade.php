<x-admin-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <a href="{{ route('category.create') }}" class="btn btn-sm btn-outline-primary float-end">Tambah
                    Category</a>
                <h6 class="mb-4">Categories Table</h6>
                <div class="table table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Category</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $idd = 1; ?>
                            @foreach ($categories as $post)
                                <tr>
                                    <th scope="row"><?= $idd++ ?></th>
                                    <td>{{ $post->names }}</td>
                                    <td>
                                        <form method="post" action="{{ route('category.destroy', $post->id) }}"
                                            class="inline">
                                            @csrf
                                            @method('delete')
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('category.edit', $post->id) }}"
                                                    class="btn btn-sm btn-outline-warning">Edit</a>

                                                <button class="btn btn-sm btn-outline-danger"
                                                    type="submit">DELETE</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
