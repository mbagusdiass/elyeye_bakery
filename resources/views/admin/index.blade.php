<x-admin-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                @if (Session::has('notif.success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('notif.success') }}
                    </div>
                @endif
                <a href="{{ route('posts.create') }}" class="btn btn-sm btn-outline-primary float-end">Tambah Kue</a>
                <h6 class="mb-4">Responsive Table</h6>
                <div class="table table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Kue</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Category</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $idd = 1; ?>
                            @foreach ($posts as $post)
                                <tr>
                                    <th scope="row"><?= $idd++ ?></th>
                                    <td>{{ $post->name }}</td>
                                    <td>{{ $post->desc }}</td>
                                    <td>{{ $post->category }}</td>
                                    <td>{{ $post->price }}</td>
                                    <td>{{ isset($post->discount) ? $post->discount . '%' : 'Tidak Discount' }}
                                    </td>
                                    <td>
                                        <img class="img-fluid rounded mb-1" id="img_kue"
                                            src="{{ url('storage/' . $post->img) }}" alt="Gambar Kue"
                                            style="max-width: 40vw; height: auto;">
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('posts.destroy', $post->id) }}"
                                            class="inline">
                                            @csrf
                                            @method('delete')
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('posts.edit', $post->id) }}"
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
