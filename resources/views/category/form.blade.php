<x-admin-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="py-12">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Data Kue</h6>
                    {{-- don't forget to add multipart/form-data so we can accept file in our form --}}
                    <form method="post"
                        action="{{ isset($categories) ? route('category.update', $categories->id) : route('category.store') }}"
                        class="mt-6 space-y-6">
                        @csrf
                        {{-- add @method('put') for edit mode --}}
                        @isset($categories)
                            @method('put')
                        @endisset
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nama_category" name="nama_category"
                                placeholder="Nama Category" value="{{ $categories->names ?? old('names') }}" required
                                autofocus>
                            <label for="nama_category">Nama Categories</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
