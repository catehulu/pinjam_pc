<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Peminjaman</title>
    <style>
        table {
            table-layout: fixed;
            width: 400px;
            
        }

        table, th, td {
        }
    </style>
</head>
<body style="
    font-family: 'Times New Roman', Times, serif;
    widtd: 757px;
    margin-left: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
">
<img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/images/kopsuratncc.png';?>" class="" alt="">
<br>
<p style="text-align:center;font-size:24px;margin-top:0px"><strong>Peminjaman Inventaris NCC</strong></p>
<div style="
    margin-left: 60px;
">
    <p>Saya yang beridentitas dibawah ini : </p>
    <table style="text-align:left;" align="center">
        <tbody>
            <tr>
                <td>NRP</td>
                <td>: {{$peminjamBarang->NRP}}</td>
            </tr>
            <tr>
                <td><br></td>
                <td></td>
            </tr>
             <tr>
                <td>Nama</td>
                <td>: {{$peminjamBarang->nama}}</td>
            </tr>
            <tr>
                <td><br></td>
                <td></td>
            </tr>
            <tr>
                <td>Barang</td>
                <td>: {{$peminjamBarang->nama_barang}}</td>
            </tr>
            <tr>
                <td><br></td>
                <td></td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td>: {{$peminjamBarang->jumlah}}</td>
            </tr>
        </tbody>
    </table>
    <p>Ingin melaukan peminjaman {{$peminjamBarang->nama_barang}} sejumlah {{$peminjamBarang->jumlah}}</p>
</div>
<br>
<br>
<div>
    <table style="text-align:center;width:100%" align="center">
        <tbody>
            <tr>
                <td>Peminjam</td>
                <td>Kepala Lab NCC</td>
            </tr>
            <tr>
                <td><br></td>
                <td></td>
            </tr>
            <tr>
                <td><br></td>
                <td></td>
            </tr>
            <tr>
                <td><br></td>
                <td></td>
            </tr>
            <tr>
                <td>{{$peminjamBarang->nama}}</td>
                <td>Tohari Ahmad, S.Kom, MIT, Ph.D</td>
            </tr>
            <tr>
                <td>NRP {{$peminjamBarang->NRP}}</td>
                <td>NIP</td>
            </tr>
        </tbody>
    </table>
</div>
<br>
<br>
<div>
    <!-- <table style="text-align:center;width:100%" align="center">
        <tbody>
            <tr>
                <td>Kepala Lab NCC</td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td>Tohari Ahmad, S.Kom, MIT, Ph.D</td>
            </tr>
            <tr>
                <td>NIP </td>
            </tr>
            
        </tbody>
    </table> -->
</div>
</body>
</html>