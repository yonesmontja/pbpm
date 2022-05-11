<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>RAPORT SISWA</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 10px;
            border: 3px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 15px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: rgb(12, 12, 12);
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 20px;
            line-height: 24px;
            text-align: center;
            vertical-align: top;
            font-size: 27px;
            padding-bottom: 12px;
            font-weight: bold;
        }

        .invoice-box table tr.top table td th {
            padding: 2px;
            vertical-align: top;
            border: 1px solid rgb(12, 12, 12);

        }

        .invoice-box table tr td:nth-child(2) {
            text-align: center;
            font-size: 20px;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 2px;
            text-align: center;
            align-content: center;
        }

        .invoice-box table tr.top table td.title {
            font-size: 20px;
            text-align: center;
            line-height: 20px;
            color: rgb(12, 12, 12);
        }

        .invoice-box table tr.information table td {
            padding-bottom: 10px;
            text-align: left;
        }

        .invoice-box table tr.heading td {
            background: rgb(175, 228, 244);
            font-weight: bold;
            text-align: center;
            border: 1px solid rgb(175, 228, 244);
            padding: 15px;
            vertical-align: top;
            font-size: 30px;
            line-height: 20px;

        }

        .invoice-box table tr.details td {
            padding: 2px;
            vertical-align: top;
            padding-bottom: 12px;
            font-size: 15px;

            text-align: left
        }

        .invoice-box table tr.item td {
            padding-bottom: 2px;
            border: 1px solid rgb(12, 12, 12);
            border-bottom: 1px solid rgb(12, 12, 12);
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }

    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="heading">
                <td colspan="12">
                    BIODATA PESERTA DIDIK
                </td>
            </tr>
            <tr>
                <br>
                <br>
            </tr>
            <tr class="details">
                <td>
                    1.
                </td>
                <td colspan="3">
                    Nama Peserta Didik
                </td>
                <td colspan="2" style="text-align: center;">
                    :
                </td>
                <td colspan="6">
                    {{ $siswa->nama_depan }} {{ $siswa->nama_belakang }}
                </td>
            </tr>
            <tr class="details">
                <td>
                    2.
                </td>
                <td colspan="3">
                    No. Induk/NISN
                </td>
                <td colspan="2" style="text-align: center;">
                    :
                </td>
                <td colspan="6">
                    {{ $siswa->NIS }}/{{ $siswa->NISN }}
                </td>
            </tr>
            <tr class="details">
                <td>
                    3.
                </td>
                <td colspan="3">
                    Tempat, Tgl. Lahir
                </td>
                <td colspan="2" style="text-align: center;">
                    :
                </td>
                <td colspan="6">
                    {{ $siswa->tempat_lahir }}, {{ $siswa->tgl_lahir }}
                </td>
            </tr>
            <tr class="details">
                <td>
                    4.
                </td>
                <td colspan="3">
                    Jenis Kelamin
                </td>
                <td colspan="2" style="text-align: center;">
                    :
                </td>
                <td colspan="6">
                    {{ $siswa->jenis_kelamin }}
                </td>
            </tr>
            <tr class="details">
                <td>
                    5.
                </td>
                <td colspan="3">
                    Agama
                </td>
                <td colspan="2" style="text-align: center;">
                    :
                </td>
                <td colspan="6">
                    {{ $siswa->agama }}
                </td>
            </tr>
            <tr class="details">
                <td>
                    6.
                </td>
                <td colspan="3">
                    Status dalam Keluarga
                </td>
                <td colspan="2" style="text-align: center;">
                    :
                </td>
                <td colspan="6">
                    {{ $siswa->status_keluarga }}
                </td>
            </tr>
            <tr class="details">
                <td>
                    7.
                </td>
                <td colspan="3">
                    Anak ke
                </td>
                <td colspan="2" style="text-align: center;">
                    :
                </td>
                <td colspan="6">
                    {{ $siswa->anak_ke }}
                </td>
            </tr>
            <tr class="details">
                <td>
                    8.
                </td>
                <td colspan="3">
                    Alamat peserta didik
                </td>
                <td colspan="2" style="text-align: center;">
                    :
                </td>
                <td colspan="6">
                    {{ $siswa->alamat }}
                </td>
            </tr>
            <tr class="details">
                <td>

                </td>
                <td colspan="3">
                    Telpon
                </td>
                <td colspan="2" style="text-align: center;">
                    :
                </td>
                <td colspan="6">
                    --
                </td>
            </tr>
            <tr class="details">
                <td>
                    9.
                </td>
                <td colspan="3">
                    Sekolah asal
                </td>
                <td colspan="2" style="text-align: center;">
                    :
                </td>
                <td colspan="6">
                    --
                </td>
            </tr>
            <tr class="details">
                <td>
                    10.
                </td>
                <td colspan="3">
                    Diterima di sekolah ini
                </td>
                <td colspan="2" style="text-align: center;">

                </td>
                <td colspan="6">

                </td>
            </tr>
             <tr class="details">
                <td>

                </td>
                <td colspan="3">
                    Di kelas
                </td>
                <td colspan="2" style="text-align: center;">
                    :
                </td>
                <td colspan="6">
                    --
                </td>
            </tr>
            <tr class="details">
                <td>

                </td>
                <td colspan="3">
                    Pada tanggal
                </td>
                <td colspan="2" style="text-align: center;">
                    :
                </td>
                <td colspan="6">
                    {{$siswa -> tgl_masuk_awal}}
                </td>
            </tr>
            <tr class="details">
                <td>
                    11.
                </td>
                <td colspan="3">
                    Nama orang tua
                </td>
                <td colspan="2" style="text-align: center;">

                </td>
                <td colspan="6">

                </td>
            </tr>
            <tr class="details">
                <td>
                    a.
                </td>
                <td colspan="3">
                    Ayah
                </td>
                <td colspan="2" style="text-align: center;">
                    :
                </td>
                <td colspan="6">
                    {{ $siswa -> nama_ayah }}
                </td>
            </tr>
            <tr class="details">
                <td>
                    b.
                </td>
                <td colspan="3">
                    Ibu
                </td>
                <td colspan="2" style="text-align: center;">
                    :
                </td>
                <td colspan="6">
                    {{ $siswa -> nama_ibu }}
                </td>
            </tr>
            <tr class="details">
                <td>
                    12.
                </td>
                <td colspan="3">
                    Alamat orang tua
                </td>
                <td colspan="2" style="text-align: center;">
                    :
                </td>
                <td colspan="6">
                    {{ $siswa -> alamat_ortu }}
                </td>
            </tr>
            <tr class="details">
                <td>

                </td>
                <td colspan="3">
                    Telpon
                </td>
                <td colspan="2" style="text-align: center;">
                    :
                </td>
                <td colspan="6">
                    --
                </td>
            </tr>
            <tr class="details">
                <td>
                    13.
                </td>
                <td colspan="3">
                    Pekerjaan orang tua
                </td>
                <td colspan="2" style="text-align: center;">

                </td>
                <td colspan="6">

                </td>
            </tr>
            <tr class="details">
                <td>

                </td>
                <td colspan="3">
                    Ayah
                </td>
                <td colspan="2" style="text-align: center;">
                    :
                </td>
                <td colspan="6">
                    {{ $siswa -> pekerjaan_ayah }}
                </td>
            </tr>
            <tr class="details">
                <td>

                </td>
                <td colspan="3">
                    Ibu
                </td>
                <td colspan="2" style="text-align: center;">
                    :
                </td>
                <td colspan="6">
                    {{ $siswa -> pekerjaan_ibu }}
                </td>
            </tr>
            <tr class="details">
                <td>
                    14.
                </td>
                <td colspan="3">
                    Nama wali
                </td>
                <td colspan="2" style="text-align: center;">
                    :
                </td>
                <td colspan="6">
                    {{ $siswa -> nama_wali }}
                </td>
            </tr>
            <tr class="details">
                <td>
                    15.
                </td>
                <td colspan="3">
                    Alamat wali
                </td>
                <td colspan="2" style="text-align: center;">
                    :
                </td>
                <td colspan="6">
                    {{ $siswa -> alamat_wali }}
                </td>
            </tr>
            <tr class="details">
                <td>

                </td>
                <td colspan="3">
                    Telpon
                </td>
                <td colspan="2" style="text-align: center;">
                    :
                </td>
                <td colspan="6">
                    --
                </td>
            </tr>
            <tr class="details">
                <td>
                    16.
                </td>
                <td colspan="3">
                    Pekerjaan wali
                </td>
                <td colspan="2" style="text-align: center;">
                    :
                </td>
                <td colspan="6">
                    {{ $siswa -> pekerjaan_wali }}
                </td>
            </tr>
            <tr class="details">
                <td colspan="6" style="text-align: center;">

                </td>
                <td colspan="6" style="text-align: center;">
                    Kalomdol, {{ $siswa -> tgl_masuk_awal }}
                    <br>Kepala Sekolah
                    <br>
                    <br>
                    <br>
                    <br>Merkianus Kasipmabin, S.Pd
                    <br>Nip. ----

                </td>
            </tr>

        </table>
    </div>

</body>

</html>
