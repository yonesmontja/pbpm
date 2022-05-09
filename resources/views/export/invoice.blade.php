<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>INVOICE</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 10px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
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
            padding: 2px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 2px;
            text-align: center;
        }

        .invoice-box table tr.top table td.title {
            font-size: 20px;
            line-height: 20px;
            color: rgb(12, 12, 12);
        }

        .invoice-box table tr.information table td {
            padding-bottom: 1px;
            text-align: left;
        }

        .invoice-box table tr.heading td {
            background: rgb(175, 228, 244);
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 2px;
            border: 1px solid rgb(12, 12, 12);

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
            <tr class="top">
                <td colspan="1">
                    <table>
                        <tr>
                            <td class="title">
                                <img class="logo" src="{{ public_path('images/logo_dabolding.png') }}"
                                    width="610" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <hr align="center">
                                RAPOR PESERTA DIDIK DAN PROFIL PESERTA DIDIK
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="1">
                    <table>
                        <tr>
                            <td>
                                Nama
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                {{ $students->nama_depan }}
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                Kelas
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                {{ $students->nama_depan }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                NIS
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                {{ $students->nama_depan }}
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                Semester
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                {{ $students->nama_depan }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                NISN
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                {{ $students->nama_depan }}
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                Tahun Pelajaran
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                {{ $students->nama_depan }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="top">
                <td colspan="1">
                    <table>
                        <tr>
                            <td>
                                <hr align="center">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td>
                    A. Sikap
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table>
                        <tr class="heading">
                            <td>
                                Aspek
                            </td>
                            <td>
                                Deskripsi
                            </td>
                        </tr>
                        <tr class="details">
                            <td>
                                1. Sikap Spiritual
                            </td>
                            <td>
                                {{ $students->nama_depan }}
                            </td>
                        </tr>
                        <tr class="details">
                            <td>
                                2. Sikap Sosial
                            </td>
                            <td>
                                {{ $students->nama_belakang }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td>
                    B. Pengetahuan dan Keterampilan
                </td>
            </tr>
            <tr>
                <td colspan="8">
                    <table>
                        <tr>
                            <td>
                                KKM Satuan Pendidikan: 65
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="8">
                    <table>
                        <tr class="heading">
                            <td>No</td>
                            <td>Mata Pelajaran</td>
                            <td>
                                Pengetahuan
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                Keterampilan
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="heading">
                            <td></td>
                            <td></td>
                            <td>
                                Nilai
                            </td>
                            <td>
                                Predikat
                            </td>
                            <td>
                                Deskripsi
                            </td>
                            <td>
                                Nilai
                            </td>
                            <td>
                                Predikat
                            </td>
                            <td>
                                Deskripsi
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <table rules="none" border="1">
                                    <tr>
                                        <td>
                                            Kelompok A:
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr class="item">
                            <td></td>
                            <td></td>
                            <td>
                                1. Sikap Spiritual
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                {{ $students->nama_depan }}
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="item">
                            <td></td>
                            <td></td>
                            <td>
                                2. Sikap Sosial
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                {{ $students->nama_belakang }}
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <table rules="none" border="1">
                                    <tr>
                                        <td>
                                            Kelompok B:
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr class="item">
                            <td></td>
                            <td></td>
                            <td>
                                1. Sikap Spiritual
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                {{ $students->nama_depan }}
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="item">
                            <td></td>
                            <td></td>
                            <td>
                                2. Sikap Sosial
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                {{ $students->nama_belakang }}
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td>
                    C. Saran-saran
                </td>
            </tr>
            <tr class="heading">
                <td>
                    Aspek
                </td>
                <td>
                    Deskripsi
                </td>
            </tr>
            <tr class="details">
                <td>
                    1. Sikap Spiritual
                </td>
                <td>
                    {{ $students->nama_depan }}
                </td>
            </tr>
            <tr class="details">
                <td>
                    2. Sikap Sosial
                </td>
                <td>
                    {{ $students->nama_belakang }}
                </td>
            </tr>
            <tr class="information">
                <td>
                    D. Tinggi dan Berat Badan
                </td>
            </tr>
            <tr class="heading">
                <td>
                    Aspek
                </td>
                <td>
                    Deskripsi
                </td>
            </tr>
            <tr class="details">
                <td>
                    1. Sikap Spiritual
                </td>
                <td>
                    {{ $students->nama_depan }}
                </td>
            </tr>
            <tr class="details">
                <td>
                    2. Sikap Sosial
                </td>
                <td>
                    {{ $students->nama_belakang }}
                </td>
            </tr>
            <tr class="information">
                <td>
                    E. Kondisi Kesehatan
                </td>
            </tr>
            <tr class="heading">
                <td>
                    Aspek
                </td>
                <td>
                    Deskripsi
                </td>
            </tr>
            <tr class="details">
                <td>
                    1. Sikap Spiritual
                </td>
                <td>
                    {{ $students->nama_depan }}
                </td>
            </tr>
            <tr class="details">
                <td>
                    2. Sikap Sosial
                </td>
                <td>
                    {{ $students->nama_belakang }}
                </td>
            </tr>
            <tr class="information">
                <td>
                    F. Prestasi
                </td>
            </tr>
            <tr class="heading">
                <td>
                    Aspek
                </td>
                <td>
                    Deskripsi
                </td>
            </tr>
            <tr class="details">
                <td>
                    1. Sikap Spiritual
                </td>
                <td>
                    {{ $students->nama_depan }}
                </td>
            </tr>
            <tr class="details">
                <td>
                    2. Sikap Sosial
                </td>
                <td>
                    {{ $students->nama_belakang }}
                </td>
            </tr>
            <tr class="information">
                <td>
                    G. Kehadiran
                </td>
            </tr>
            <tr class="heading">
                <td>
                    Aspek
                </td>
                <td>
                    Deskripsi
                </td>
            </tr>
            <tr class="details">
                <td>
                    1. Sikap Spiritual
                </td>
                <td>
                    {{ $students->nama_depan }}
                </td>
            </tr>
            <tr class="details">
                <td>
                    2. Sikap Sosial
                </td>
                <td>
                    {{ $students->nama_belakang }}
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
