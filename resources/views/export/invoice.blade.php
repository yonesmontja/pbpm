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
            border: 3px solid #eee;
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

        .invoice-box table tr.top1 table td th {
            padding: 2px;
            vertical-align: top;
            border: 1px solid rgb(12, 12, 12);

        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 2px;
            text-align: center;
            align-content: center;
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
            text-align: center;
            border: 1px solid rgb(12, 12, 12);
        }

        .invoice-box table tr.details td {
            padding-bottom: 2px;
            border: 1px solid rgb(12, 12, 12);
            border-bottom: 1px solid rgb(12, 12, 12);

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
                <td colspan="8">
                    <table>
                        <tr>
                            <td>
                                <img class="logo" src="{{ public_path('images/logo_dabolding.png') }}"
                                    width="610" alt="">
                                <hr align="center">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                RAPOR PESERTA DIDIK DAN PROFIL PESERTA DIDIK
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="top">
                <td colspan="8">
                    <table>
                        <tr class="information">
                            <td>
                                <table>
                                    <tr>
                                        <td colspan="2">
                                            Nama
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td colspan="2">
                                            {{ $students->nama_depan }} {{ $students->nama_belakang }}
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td colspan="2">
                                            Kelas
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td colspan="2">
                                            {{ $students->kelas }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            NIS
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td colspan="2">
                                            {{ $students->nis }}
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td colspan="2">
                                            Semester
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td colspan="2">
                                            Genap
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            NISN
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td colspan="2">
                                            {{ $students->nisn }}
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td colspan="2">
                                            Tahun Pelajaran
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td colspan="2">
                                            2021/2022
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="top">
                <td colspan="8">
                    <table>
                        <tr>
                            <td>
                                <hr align="center">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="8">
                    <table>
                        <tr class="information">
                            <td colspan="8">
                                A. Sikap
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="8">
            <tr class="heading">
                <td colspan="2">Aspek</td>
                <td colspan="6">Deskripsi</td>
            </tr>
            <tr class="details">
                <td colspan="2">Sikap Spiritual</td>
                <td style="text-align: left;" colspan="6">Deskripsi sikap spiritual</td>
            </tr>
            <tr class="details">
                <td colspan="2">Sikap Sosial</td>
                <td style="text-align: left;" colspan="6">Deskripsi sikap sosial</td>
            </tr>
            </td>
            </tr>
            <tr>
                <td colspan="8">
                    <table>
                        <tr class="information">
                            <td colspan="8">
                                B. Pengetahuan dan Keterampilan
                            </td>
                        </tr>
                        <tr>
                            <td>
                                KKM Satuan Pendidikan: 65
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td rowspan="2">No</td>
                <td rowspan="2">Mata Pelajaran</td>
                <td colspan="3">Pengetahuan</td>
                <td colspan="3">Keterampilan</td>
            </tr>
            <tr class="heading">
                <td>Nilai</td>
                <td>Predikat</td>
                <td>Deskripsi</td>
                <td>Nilai</td>
                <td>Predikat</td>
                <td>Deskripsi</td>
            </tr>
            <tr class="details">
                <td colspan="8">Kelompok A: </td>
            </tr>
            <tr class="details">
                <td style="text-align: center;">1</td>
                <td style="text-align: left;">Pendidikan Agama dan Budi Pekerti</td>
                <td style="text-align: center;">3</td>
                <td style="text-align: center;">4</td>
                <td style="text-align: center;">Sangat Baik</td>
                <td style="text-align: center;">6</td>
                <td style="text-align: center;">7</td>
                <td style="text-align: center;">Sangat Baik</td>
            </tr>
            <tr class="details">
                <td style="text-align: center;">2</td>
                <td style="text-align: left;">PPKn</td>
                <td style="text-align: center;">3</td>
                <td style="text-align: center;">4</td>
                <td style="text-align: center;">5</td>
                <td style="text-align: center;">6</td>
                <td style="text-align: center;">7</td>
                <td style="text-align: center;">8</td>
            </tr>
            <tr class="details">
                <td style="text-align: center;">3</td>
                <td style="text-align: left;">Bahasa Indonesia</td>
                <td style="text-align: center;">3</td>
                <td style="text-align: center;">4</td>
                <td style="text-align: center;">5</td>
                <td style="text-align: center;">6</td>
                <td style="text-align: center;">7</td>
                <td style="text-align: center;">8</td>
            </tr>
            <tr class="details">
                <td style="text-align: center;">4</td>
                <td style="text-align: left;">Matematika</td>
                <td style="text-align: center;">3</td>
                <td style="text-align: center;">4</td>
                <td style="text-align: center;">5</td>
                <td style="text-align: center;">6</td>
                <td style="text-align: center;">7</td>
                <td style="text-align: center;">8</td>
            </tr>
            <tr class="details">
                <td style="text-align: center;">5</td>
                <td style="text-align: left;">Ilmu Pengetahuan Alam</td>
                <td style="text-align: center;">3</td>
                <td style="text-align: center;">4</td>
                <td style="text-align: center;">5</td>
                <td style="text-align: center;">6</td>
                <td style="text-align: center;">7</td>
                <td style="text-align: center;">8</td>
            </tr>
            <tr class="details">
                <td style="text-align: center;">6</td>
                <td style="text-align: left;">Ilmu Pengetahuan Sosial</td>
                <td style="text-align: center;">3</td>
                <td style="text-align: center;">4</td>
                <td style="text-align: center;">5</td>
                <td style="text-align: center;">6</td>
                <td style="text-align: center;">7</td>
                <td style="text-align: center;">8</td>
            </tr>
            <tr class="details">
                <td colspan="8">Kelompok B: </td>
            </tr>
            <tr class="details">
                <td style="text-align: center;">1</td>
                <td style="text-align: left;">Pendidikan Jasmani, Olahraga dan Kesehatan</td>
                <td style="text-align: center;">3</td>
                <td style="text-align: center;">4</td>
                <td style="text-align: center;">5</td>
                <td style="text-align: center;">6</td>
                <td style="text-align: center;">7</td>
                <td style="text-align: center;">8</td>
            </tr>
            <tr class="details">
                <td style="text-align: center;">2</td>
                <td style="text-align: left;">Seni Budaya dan Keterampilan</td>
                <td style="text-align: center;">3</td>
                <td style="text-align: center;">4</td>
                <td style="text-align: center;">5</td>
                <td style="text-align: center;">6</td>
                <td style="text-align: center;">7</td>
                <td style="text-align: center;">8</td>
            </tr>
            <tr class="details">
                <td colspan="2" style="text-align: center;">Jumlah</td>
                <td style="text-align: center;">#605</td>
                <td colspan="2" style="text-align: center;">Enam Ratus Lima</td>
                <td style="text-align: center;">#449</td>
                <td colspan="2" style="text-align: center;">Empat ratus empat puluh sembilan</td>
            </tr>
            <tr class="details">
                <td colspan="2" style="text-align: center;">Rata-rata</td>
                <td style="text-align: center;">#605</td>
                <td colspan="2" style="text-align: center;">Enam Ratus Lima</td>
                <td style="text-align: center;">#449</td>
                <td colspan="2" style="text-align: center;">Empat ratus empat puluh sembilan</td>
            </tr>
            <tr class="details">
                <td colspan="2" style="text-align: center;">Total Nilai</td>
                <td style="text-align: center;">#605</td>
                <td colspan="5" style="text-align: center;">Enam Ratus Lima</td>
            </tr>
            <tr class="details">
                <td colspan="2" style="text-align: center;">Rata-rata</td>
                <td style="text-align: center;">#605</td>
                <td colspan="5" style="text-align: center;">Enam Ratus Lima</td>
            </tr>
            <tr>
                <td colspan="8">
                    <table>
                        <tr class="information">
                            <td colspan="8">
                                C. Ekstrakurikuler
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td colspan="2">Ekstrakurikuler</td>
                <td>Nilai</td>
                <td colspan="5">Keterangan dalam Kegiatan</td>
            </tr>
            <tr class="details">
                <td colspan="2" style="text-align: center;">Ekskul 1</td>
                <td style="text-align: center;">#605</td>
                <td colspan="5" style="text-align: center;">Baik</td>
            </tr>
            <tr class="details">
                <td colspan="2" style="text-align: center;">Ekskul 2</td>
                <td style="text-align: center;">#605</td>
                <td colspan="5" style="text-align: center;">Baik</td>
            </tr>
            <tr>
                <td colspan="8">
                    <table>
                        <tr class="information">
                            <td colspan="8">
                                D. Absensi
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>No</td>
                <td colspan="3">Ketidakhadiran</td>
                <td colspan="4">Jumlah hari</td>
            </tr>
            <tr class="details">
                <td style="text-align: center;">1</td>
                <td colspan="3" style="text-align: center;">Alpa</td>
                <td colspan="4" style="text-align: center;">5</td>
            </tr>
            <tr class="details">
                <td style="text-align: center;">2</td>
                <td colspan="3" style="text-align: center;">Ijin</td>
                <td colspan="4" style="text-align: center;">2</td>
            </tr>
            <tr class="details">
                <td style="text-align: center;">3</td>
                <td colspan="3" style="text-align: center;">Sakit</td>
                <td colspan="4" style="text-align: center;">2</td>
            </tr>
            <tr>
                <td colspan="8">
                    <table>
                        <tr class="information">
                            <td colspan="8">
                                E. Catatan Wali Kelas
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="details">
                <td colspan="8" style="text-align: left;">
                    1. Catatan 1
                    <br>2. Catatan 2
                    <br>3. Catatan 3
                </td>
            </tr>
            <tr class="top">
                <td colspan="8">
                    <table>
                        <tr>
                            <td colspan="8">
                                <hr align="center">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                Berdasarkan penilaian selama semester ini, siswa dinyatakan:
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                Naik/Tidak Naik
                                <br> ke kelas:
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <hr align="center">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                Mengetahui
                            </td>
                            <td colspan="4">
                                Kalomdol, 17 Juni 2022
                            </td>
                        </tr>
                        <tr>
                            <td text-align="center" colspan="4">
                                Orang tua/wali
                            </td>
                            <td text-align="center" colspan="4">
                                Wali kelas
                            </td>
                        </tr>
                        <tr>
                            <td text-align="center" colspan="4">
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </td>
                            <td text-align="center" colspan="4">
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td text-align="center" colspan="4">
                                ------------------------
                            </td>
                            <td text-align="center" colspan="4">
                                (Silimius Doyela)
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8" text-align="center">
                                Mengetahui
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8" text-align="center">
                                Kepala Sekolah
                            </td>
                        </tr>
                        <tr>
                            <td text-align="center" colspan="8">
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td text-align="center" colspan="8">
                                (Merkianus Kasipmabin, S.Pd)
                                <br> Nip. -------------
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
