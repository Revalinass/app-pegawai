<!DOCTYPE html>
<html>
<head>
    <title>Edit Pegawai</title>
</head>
<body>
    <h1>Edit Pegawai</h1>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <table>
            <tr>
                <td><label for="nama_lengkap">Nama Lengkap:</label></td>
                <td><input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ $employee->nama_lengkap }}"></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" id="email" name="email" value="{{ $employee->email }}"></td>
            </tr>
            <tr>
                <td><label for="nomor_telepon">Nomor Telepon:</label></td>
                <td><input type="text" id="nomor_telepon" name="nomor_telepon" value="{{ $employee->nomor_telepon }}"></td>
            </tr>
            <tr>
                <td><label for="tanggal_lahir">Tanggal Lahir:</label></td>
                <td><input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ $employee->tanggal_lahir }}"></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat:</label></td>
                <td><textarea id="alamat" name="alamat">{{ $employee->alamat }}</textarea></td>
            </tr>
            <tr>
                <td><label for="tanggal_masuk">Tanggal Masuk:</label></td>
                <td><input type="date" id="tanggal_masuk" name="tanggal_masuk" value="{{ $employee->tanggal_masuk }}"></td>
            </tr>
            <tr>
                <td><label for="status">Status:</label></td>
                <td>
                    <select id="status" name="status">
                        <option value="aktif" {{ $employee->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ $employee->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;">
                    <button type="submit">Update</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
