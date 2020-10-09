<x-page>
    <form method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <input class="" type="file" name="image">
        </div>

        <div>
            <input class="mt-4 py-2 px-4 rounded-md text-white bg-indigo-600" type="submit">
        </div>
    </form>
</x-page>
