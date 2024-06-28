<x-admin-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="py-12">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Data Kue</h6>
                    {{-- don't forget to add multipart/form-data so we can accept file in our form --}}
                    <form method="post"
                        action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}"
                        class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        {{-- add @method('put') for edit mode --}}
                        @isset($post)
                            @method('put')
                        @endisset
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Nama Kue" value="{{ $post->name ?? old('name') }}" required autofocus>
                            <label for="name">Nama Kue</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Deskripsi kue..." id="desc" name="desc" style="height: 150px;"> {{ $post->desc ?? old('desc') }}</textarea>
                            <label for="desc">Deskripsi kue
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="price" name="price" placeholder="Harga"
                                value="{{ $post->price ?? old('price') }}" required>
                            <label for="price">Harga Kue</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="discount" name="discount" placeholder="0"
                                value="{{ $post->discount ?? old('discount') }}">
                            <label for="discount">%
                                Discount</label>
                            <div id="discountHelp" class="form-text text-danger">
                                *kosongi bila tidak sedang discount
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" name="category" id="category" aria-label="category">
                                <option selected disabled>Open this select menu</option>
                                @foreach ($categories as $post)
                                    <option value="{{ $post->names }}">{{ $post->names }}</option>
                                @endforeach
                            </select>
                            <label for="category">category</label>
                        </div>

                        <div class="mb-3">
                            <input class="form-control bg-dark mb-3" type="file" id="img" name="img"
                                accept=".jpg, .jpeg, .png" autofocus>
                            <label class="form-label" for="img">Gambar Kue</label>
                            <img class="img-fluid rounded-2 mx-auto mb-4 " id="img_kue"
                                src="{{ isset($post) ? url('storage/' . $post->img) : '' }}" alt="Gambar Kue"
                                style="width: 200px; height: 200px;">
                        </div>


                        <button type="submit" class="btn btn-primary">Save</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // create onchange event listener for featured_image input
        document.getElementById('img').onchange = function(evt) {
            const [file] = this.files
            if (file) {
                // if there is an image, create a preview in featured_image_preview
                document.getElementById('img_kue').src = URL.createObjectURL(file)
            }
        }
    </script>

</x-admin-layout>
