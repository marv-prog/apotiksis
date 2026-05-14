<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Kategori</th>
            <th>Deskripsi</th> <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kategoris as $k)
        <tr>
            <td>{{ $k->id_kategori }}</td>
            <td>{{ $k->nama_kategori }}</td>
            <td>{{ $k->deskripsi }}</td>
            <td>
                <a href="/admin/kategori/{{ $k->id_kategori }}/edit" class="btn btn-warning btn-sm">Edit</a>
                </td>
        </tr>
        @endforeach
    </tbody>
</table>