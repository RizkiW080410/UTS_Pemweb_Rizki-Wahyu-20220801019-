<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pendaftaran</title>
    <link rel="stylesheet" href="tampilan_scan/style.css">
    
    <!-- font awesome icons cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        .pendaftaran-form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .pendaftaran-form h2 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .pendaftaran-form form div {
            margin-bottom: 15px;
        }

        .pendaftaran-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .pendaftaran-form input[type="text"],
        .pendaftaran-form input[type="email"],
        .pendaftaran-form input[type="date"],
        .pendaftaran-form input[type="number"],
        .pendaftaran-form input[type="file"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        .pendaftaran-form button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-bottom: 10px;
        }

        .pendaftaran-form button:hover {
            background-color: #0056b3;
        }

        .pendaftaran-form .btn-cancel {
            background-color: #6c757d;
        }

        .pendaftaran-form .btn-cancel:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="pendaftaran-form">
        <h2>Daftar Beasiswa: {{ $beasiswa->name_beasiswa }}</h2>
    
        <form action="{{ route('pendaftaran.store', $beasiswa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" required>
            </div>
            <div>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div>
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
            </div>
            <div>
                <label for="tempat_lahir">Tempat Lahir:</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" required>
            </div>
            <div>
                <label for="NIK">NIK:</label>
                <input type="text" id="NIK" name="NIK" required>
            </div>
            <div>
                <label for="nilai">Nilai:</label>
                <input type="number" step="0.01" id="nilai" name="nilai" required>
            </div>
            <div>
                <label for="transkrip_nilai">Transkrip Nilai:</label>
                <input type="file" id="transkrip_nilai" name="transkrip_nilai" required>
            </div>
            <div>
                <button type="submit">Submit</button>
                <button type="button" class="btn-cancel" onclick="history.back();">Cancel</button>
            </div>
        </form>
    </div>
</body>
</html>
