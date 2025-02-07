<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tracking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }
        input, textarea, button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        input:focus, textarea:focus {
            border-color: #007bff;
            outline: none;
        }
        textarea {
            resize: none;
        }
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Edit Data Pengiriman</h1>
        <form action="{{route('admin.tracking.update', $tracking)}}" method="post">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Nama</label>
                <input type="text" id="name" name="nama" placeholder="Masukkan Nama" value="{{$tracking->nama}}" required>
            </div>
            <div>
                <label for="tracking_number">Resi</label>
                <input type="text" id="tracking_number" name="resi" placeholder="Masukkan Nomor Resi" value="{{$tracking->resi}}" disabled>
            </div>
            <div>
                <label for="address">Alamat</label>
                <textarea id="address" name="alamat" placeholder="Masukkan Alamat" rows="3" required>{{$tracking->alamat}}</textarea>
            </div>
            <div>
                <label for="phone">Handphone</label>
                <input type="tel" id="phone" name="handphone" placeholder="Masukkan Nomor Handphone" value="{{$tracking->handphone}}" required>
            </div>
            <div>
                <label for="description">Deskripsi</label>
                <textarea id="description" name="deskripsi" placeholder="Masukkan Deskripsi Barang" rows="3">{{$tracking->deskripsi}}</textarea>
            </div>
            <div>
                <label for="courier">Pilih Kurir</label>
                <select name="courier" id="courier">
                    <option selected disabled>Pilih Kurir</option>
                    @foreach ($couriers as $courier)
                        <option value="{{$courier->id}}">{{$courier->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit">Simpan</button>
            </div>
        </form>
        <a href="{{route('admin.tracking')}}">
            <button class="btn-secondary">Kembali</button>
        </a>
    </div>
</body>
</html>
