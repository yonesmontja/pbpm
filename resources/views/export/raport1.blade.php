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
    @if ($rombel_kelas_raport == 1 || $rombel_kelas_raport == 2)
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="8">
                        <table>
                            <tr>
                                <td>
                                    <img class="logo" src="{{ asset('images/logo_dabolding.png') }}" width="610"
                                        alt="">
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
                                                {{ $nama_rombel }}
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
                                                {{ $semester_aktif }}
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
                                                {{ thnPel() }}
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
                    <td style="text-align: left;" colspan="6">{{ $deskripsi_sikap_spiritual }}</td>
                </tr>
                <tr class="details">
                    <td colspan="2">Sikap Sosial</td>
                    <td style="text-align: left;" colspan="6">{{ $deskripsi_sikap_sosial }}</td>
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
                                    KKM Satuan Pendidikan: 60
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
                    @if ($students->agama == 'Islam' || $students->agama == 'islam')
                        <td style="text-align: center;">{{ $raport_pengetahuan_agama }}</td>
                    @elseif($students->agama == 'Kristen Protestan' || $students->agama == 'kristen protestan')
                        <td style="text-align: center;">{{ $raport_pengetahuan_agama }}</td>
                    @elseif($students->agama == 'Katolik' || $students->agama == 'katolik')
                        <td style="text-align: center;">{{ $raport_pengetahuan_agama }}</td>
                    @endif
                    <td style="text-align: center;">{{ $predikat_huruf_agama }}</td>
                    <td style="text-align: left;">Memiliki kemampuan <strong> {{ $predikat_huruf_agama1 }} </strong>
                        {{ $predikat_deskripsi_agama }}</td>
                    @if ($students->agama == 'Islam' || $students->agama == 'islam')
                        <td style="text-align: center;">{{ $raport_keterampilan_agama }}</td>
                    @elseif($students->agama == 'Kristen Protestan' || $students->agama == 'kristen protestan')
                        <td style="text-align: center;">{{ $raport_keterampilan_agama }}</td>
                    @elseif($students->agama == 'Katolik' || $students->agama == 'katolik')
                        <td style="text-align: center;">{{ $raport_keterampilan_agama }}</td>
                    @endif
                    <td style="text-align: center;">{{ $predikat_keterampilan_huruf_agama }}</td>
                    <td style="text-align: left;">Memiliki keterampilan <strong> {{ $predikathuruf }} </strong>
                        {{ $predikat_keterampilan_deskripsi_agama }}</td>
                </tr>
                <tr class="details">
                    <td style="text-align: center;">2</td>
                    <td style="text-align: left;">PKn</td>
                    <td style="text-align: center;">{{ $raport_pengetahuan_ppkn }}</td>
                    <td style="text-align: center;">{{ $predikat_huruf_ppkn }}</td>
                    <td style="text-align: left;">Memiliki kemampuan <strong> {{ $predikat_huruf_ppkn1 }} </strong>
                        {{ $predikat_deskripsi_ppkn }}</td>
                    <td style="text-align: center;">{{ $raport_keterampilan_ppkn }}</td>
                    <td style="text-align: center;">{{ $predikat_keterampilan_huruf_ppkn }}</td>
                    <td style="text-align: left;">Memiliki keterampilan <strong> {{ $predikathuruf_ppkn }} </strong>
                        {{ $predikat_keterampilan_deskripsi_ppkn }}</td>
                </tr>
                <tr class="details">
                    <td style="text-align: center;">3</td>
                    <td style="text-align: left;">Bahasa Indonesia</td>
                    <td style="text-align: center;">{{ $raport_pengetahuan_indonesia }}</td>
                    <td style="text-align: center;">{{ $predikat_huruf_indonesia }}</td>
                    <td style="text-align: left;">Memiliki kemampuan <strong> {{ $predikat_huruf_bi }} </strong>
                        {{ $predikat_deskripsi_indonesia }}</td>
                    <td style="text-align: center;">{{ $raport_keterampilan_indonesia }}</td>
                    <td style="text-align: center;">{{ $predikat_keterampilan_huruf_indonesia }}</td>
                    <td style="text-align: left;">Memiliki keterampilan <strong> {{ $predikathuruf_bi }} </strong>
                        {{ $predikat_keterampilan_deskripsi_indonesia }}</td>
                </tr>
                <tr class="details">
                    <td style="text-align: center;">4</td>
                    <td style="text-align: left;">Matematika</td>
                    <td style="text-align: center;">{{ $raport_pengetahuan_matematika }}</td>
                    <td style="text-align: center;">{{ $predikat_huruf_matematika }}</td>
                    <td style="text-align: left;">Memiliki kemampuan <strong> {{ $predikat_huruf_math }} </strong>
                        {{ $predikat_deskripsi_matematika }}</td>
                    <td style="text-align: center;">{{ $raport_keterampilan_matematika }}</td>
                    <td style="text-align: center;">{{ $predikat_keterampilan_huruf_matematika }}</td>
                    <td style="text-align: left;">Memiliki keterampilan <strong> {{ $predikathuruf_math }} </strong>
                        {{ $predikat_keterampilan_deskripsi_matematika }}</td>
                </tr>

                <tr class="details">
                    <td colspan="8">Kelompok B: </td>
                </tr>
                <tr class="details">
                    <td style="text-align: center;">1</td>
                    <td style="text-align: left;">Pendidikan Jasmani, Olahraga dan Kesehatan</td>
                    <td style="text-align: center;">{{ $raport_pengetahuan_pjok }}</td>
                    <td style="text-align: center;">{{ $predikat_huruf_pjok }}</td>
                    <td style="text-align: left;">Memiliki kemampuan <strong> {{ $predikat_huruf_pjok1 }} </strong>
                        {{ $predikat_deskripsi_pjok }}</td>
                    <td style="text-align: center;">{{ $raport_keterampilan_pjok }}</td>
                    <td style="text-align: center;">{{ $predikat_keterampilan_huruf_pjok }}</td>
                    <td style="text-align: left;">Memiliki keterampilan <strong> {{ $predikathuruf_pjok }} </strong>
                        {{ $predikat_keterampilan_deskripsi_pjok }}</td>
                </tr>
                <tr class="details">
                    <td style="text-align: center;">2</td>
                    <td style="text-align: left;">Seni Budaya dan Keterampilan</td>
                    <td style="text-align: center;">{{ $raport_pengetahuan_sbk }}</td>
                    <td style="text-align: center;">{{ $predikat_huruf_sbk }}</td>
                    <td style="text-align: left;">Memiliki kemampuan <strong> {{ $predikat_huruf_sbk1 }} </strong>
                        {{ $predikat_deskripsi_sbk }}</td>
                    <td style="text-align: center;">{{ $raport_keterampilan_sbk }}</td>
                    <td style="text-align: center;">{{ $predikat_keterampilan_huruf_sbk }}</td>
                    <td style="text-align: left;">Memiliki keterampilan <strong> {{ $predikathuruf_sbk }} </strong>
                        {{ $predikat_keterampilan_deskripsi_sbk }}</td>
                </tr>
                <tr class="details">
                    <td colspan="2" style="text-align: center;">Jumlah</td>
                    <td style="text-align: center;">{{ $jumlah_raport_pengetahuan }}</td>
                    <td colspan="2" style="text-align: left;">{{ terbilang($jumlah_raport_pengetahuan) }}</td>
                    <td style="text-align: center;">{{ $jumlah_raport_keterampilan }}</td>
                    <td colspan="2" style="text-align: left;">{{ terbilang($jumlah_raport_keterampilan) }}</td>
                </tr>
                <tr class="details">
                    <td colspan="2" style="text-align: center;">Rata-rata</td>
                    <td style="text-align: center;">{{ $ratarata_raport_pengetahuan }}</td>
                    <td colspan="2" style="text-align: left;">{{ terbilang($ratarata_raport_pengetahuan) }}</td>
                    <td style="text-align: center;">{{ $ratarata_raport_keterampilan }}</td>
                    <td colspan="2" style="text-align: left;">{{ terbilang($ratarata_raport_keterampilan) }}</td>
                </tr>
                <tr class="details">
                    <td colspan="2" style="text-align: center;">Total Nilai</td>
                    <td style="text-align: center;">{{ $jumlah_raport }}</td>
                    <td colspan="5" style="text-align: left;">{{ terbilang($jumlah_raport) }}</td>
                </tr>
                <tr class="details">
                    <td colspan="2" style="text-align: center;">Rata-rata</td>
                    <td style="text-align: center;">{{ $ratarata_raport }}</td>
                    <td colspan="5" style="text-align: left;">{{ terbilang($ratarata_raport) }}</td>
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
                    <td colspan="2" style="text-align: center;">1</td>
                    <td style="text-align: center;">---</td>
                    <td colspan="5" style="text-align: center;">---</td>
                </tr>
                <tr class="details">
                    <td colspan="2" style="text-align: center;">2</td>
                    <td style="text-align: center;">---</td>
                    <td colspan="5" style="text-align: center;">---</td>
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
                    <td colspan="3"></td>
                    <td colspan="4">Jumlah hari</td>
                </tr>
                <tr class="details">
                    <td style="text-align: center;">1</td>
                    <td colspan="3" style="text-align: center;">Alpa</td>
                    <td colspan="4" style="text-align: center;">{{ $alpa1 }}</td>
                </tr>
                <tr class="details">
                    <td style="text-align: center;">2</td>
                    <td colspan="3" style="text-align: center;">Ijin</td>
                    <td colspan="4" style="text-align: center;">{{ $ijin1 }}</td>
                </tr>
                <tr class="details">
                    <td style="text-align: center;">3</td>
                    <td colspan="3" style="text-align: center;">Sakit</td>
                    <td colspan="4" style="text-align: center;">{{ $sakit1 }}</td>
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
                        <br>{{ $catatan_wali_kelas }}
                        <br>
                        <br>
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
                            @if ($semester_aktif == 'Genap')
                                <tr>
                                    <td colspan="8">
                                        Berdasarkan penilaian selama semester ini,
                                        <br> siswa dinyatakan:
                                    </td>
                                </tr>
                                <tr>
                                    @if ($kelas_siswa == 'Kelas 6')
                                        <td colspan="8">
                                            LULUS / TIDAK LULUS
                                            <br>
                                        </td>
                                    @else
                                        <td colspan="8">
                                            Naik/Tidak Naik
                                            <br> ke kelas: {{ $kelas_naik }}
                                        </td>
                                    @endif
                                </tr>
                            @endif
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
                                    {{ $kecamatan }}, {{ $tanggal_raport }}
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
                                    <br>
                                    <br>----------------------------------------
                                </td>
                                <td text-align="center" colspan="4">
                                    <br>({{ $wali_kelas }})
                                    <br> Nip. {{ $nip_guru }}
                                    <br>----------------------------------------
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
                                    <img class="logo" src="{{ asset('images/ttd_barcode.jpg') }}" width="310"
                                        alt="">
                                    <hr align="center">
                                </td>
                            </tr>
                            <tr>
                                <td text-align="center" colspan="8">
                                    <u>({{ $kepala }})</u>
                                    <br> Nip. {{ $nip }}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    @endif
    @if ($rombel_kelas_raport == 3 || $rombel_kelas_raport == 4 || $rombel_kelas_raport == 5 || $rombel_kelas_raport == 6)
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="8">
                        <table>
                            <tr>
                                <td>
                                    <img class="logo" src="{{ asset('images/logo_dabolding.png') }}"
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
                                                {{ $nama_rombel }}
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
                                                {{ $semester_aktif }}
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
                                                {{ thnPel() }}
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
                    <td style="text-align: left;" colspan="6">{{ $deskripsi_sikap_spiritual }}</td>
                </tr>
                <tr class="details">
                    <td colspan="2">Sikap Sosial</td>
                    <td style="text-align: left;" colspan="6">{{ $deskripsi_sikap_sosial }}</td>
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
                                    KKM Satuan Pendidikan: 60
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
                    @if ($students->agama == 'islam' || $students->agama == 'Islam')
                        <td style="text-align: center;">{{ $raport_pengetahuan_agama }}</td>
                    @elseif($students->agama == 'Kristen Protestan' || $students->agama == 'kristen protestan')
                        <td style="text-align: center;">{{ $raport_pengetahuan_agama }}</td>
                    @elseif($students->agama == 'Katolik' || $students->agama == 'katolik')
                        <td style="text-align: center;">{{ $raport_pengetahuan_agama }}</td>
                    @endif
                    <td style="text-align: center;">{{ $predikat_huruf_agama }}</td>
                    <td style="text-align: left;">Memiliki kemampuan <strong> {{ $predikat_huruf_agama1 }} </strong>
                        {{ $predikat_deskripsi_agama }}</td>

                    @if ($students->agama == 'islam' || $students->agama == 'Islam')
                        <td style="text-align: center;">{{ $raport_keterampilan_agama }}</td>
                    @elseif($students->agama == 'Kristen Protestan' || $students->agama == 'kristen protestan')
                        <td style="text-align: center;">{{ $raport_keterampilan_agama }}</td>
                    @elseif($students->agama == 'Katolik' || $students->agama == 'katolik')
                        <td style="text-align: center;">{{ $raport_keterampilan_agama }}</td>
                    @endif
                    <td style="text-align: center;">{{ $predikat_keterampilan_huruf_agama }}</td>
                    <td style="text-align: left;">Memiliki keterampilan <strong> {{ $predikathuruf }} </strong>
                        {{ $predikat_keterampilan_deskripsi_agama }}</td>
                </tr>
                <tr class="details">
                    <td style="text-align: center;">2</td>
                    <td style="text-align: left;">PKn</td>
                    <td style="text-align: center;">{{ $raport_pengetahuan_ppkn }}</td>
                    <td style="text-align: center;">{{ $predikat_huruf_ppkn }}</td>
                    <td style="text-align: left;">Memiliki kemampuan <strong> {{ $predikat_huruf_ppkn1 }} </strong>
                        {{ $predikat_deskripsi_ppkn }}</td>
                    <td style="text-align: center;">{{ $raport_keterampilan_ppkn }}</td>
                    <td style="text-align: center;">{{ $predikat_keterampilan_huruf_ppkn }}</td>
                    <td style="text-align: left;">Memiliki keterampilan <strong> {{ $predikathuruf_ppkn }} </strong>
                        {{ $predikat_keterampilan_deskripsi_ppkn }}</td>
                </tr>
                <tr class="details">
                    <td style="text-align: center;">3</td>
                    <td style="text-align: left;">Bahasa Indonesia</td>
                    <td style="text-align: center;">{{ $raport_pengetahuan_indonesia }}</td>
                    <td style="text-align: center;">{{ $predikat_huruf_indonesia }}</td>
                    <td style="text-align: left;">Memiliki kemampuan <strong> {{ $predikat_huruf_bi }} </strong>
                        {{ $predikat_deskripsi_indonesia }}</td>
                    <td style="text-align: center;">{{ $raport_keterampilan_indonesia }}</td>
                    <td style="text-align: center;">{{ $predikat_keterampilan_huruf_indonesia }}</td>
                    <td style="text-align: left;">Memiliki keterampilan <strong> {{ $predikathuruf_bi }} </strong>
                        {{ $predikat_keterampilan_deskripsi_indonesia }}</td>
                </tr>
                <tr class="details">
                    <td style="text-align: center;">4</td>
                    <td style="text-align: left;">Matematika</td>
                    <td style="text-align: center;">{{ $raport_pengetahuan_matematika }}</td>
                    <td style="text-align: center;">{{ $predikat_huruf_matematika }}</td>
                    <td style="text-align: left;">Memiliki kemampuan <strong> {{ $predikat_huruf_math }} </strong>
                        {{ $predikat_deskripsi_matematika }}</td>
                    <td style="text-align: center;">{{ $raport_keterampilan_matematika }}</td>
                    <td style="text-align: center;">{{ $predikat_keterampilan_huruf_matematika }}</td>
                    <td style="text-align: left;">Memiliki keterampilan <strong> {{ $predikathuruf_math }} </strong>
                        {{ $predikat_keterampilan_deskripsi_matematika }}</td>
                </tr>
                <tr class="details">
                    <td style="text-align: center;">5</td>
                    <td style="text-align: left;">Ilmu Pengetahuan Alam</td>
                    <td style="text-align: center;">{{ $raport_pengetahuan_ipa }}</td>
                    <td style="text-align: center;">{{ $predikat_huruf_ipa }}</td>
                    <td style="text-align: left;">Memiliki kemampuan <strong> {{ $predikat_huruf_ipa1 }} </strong>
                        {{ $predikat_deskripsi_ipa }}</td>
                    <td style="text-align: center;">{{ $raport_keterampilan_ipa }}</td>
                    <td style="text-align: center;">{{ $predikat_keterampilan_huruf_ipa }}</td>
                    <td style="text-align: left;">Memiliki keterampilan <strong> {{ $predikathuruf_ipa }} </strong>
                        {{ $predikat_keterampilan_deskripsi_ipa }}</td>
                </tr>
                <tr class="details">
                    <td style="text-align: center;">6</td>
                    <td style="text-align: left;">Ilmu Pengetahuan Sosial</td>
                    <td style="text-align: center;">{{ $raport_pengetahuan_ips }}</td>
                    <td style="text-align: center;">{{ $predikat_huruf_ips }}</td>
                    <td style="text-align: left;">Memiliki kemampuan <strong> {{ $predikat_huruf_ips1 }} </strong>
                        {{ $predikat_deskripsi_ips }}</td>
                    <td style="text-align: center;">{{ $raport_keterampilan_ips }}</td>
                    <td style="text-align: center;">{{ $predikat_keterampilan_huruf_ips }}</td>
                    <td style="text-align: left;">Memiliki keterampilan <strong> {{ $predikathuruf_ips }} </strong>
                        {{ $predikat_keterampilan_deskripsi_ips }}</td>
                </tr>
                <tr class="details">
                    <td colspan="8">Kelompok B: </td>
                </tr>
                <tr class="details">
                    <td style="text-align: center;">1</td>
                    <td style="text-align: left;">Pendidikan Jasmani, Olahraga dan Kesehatan</td>
                    <td style="text-align: center;">{{ $raport_pengetahuan_pjok }}</td>
                    <td style="text-align: center;">{{ $predikat_huruf_pjok }}</td>
                    <td style="text-align: left;">Memiliki kemampuan <strong> {{ $predikat_huruf_pjok1 }} </strong>
                        {{ $predikat_deskripsi_pjok }}</td>
                    <td style="text-align: center;">{{ $raport_keterampilan_pjok }}</td>
                    <td style="text-align: center;">{{ $predikat_keterampilan_huruf_pjok }}</td>
                    <td style="text-align: left;">Memiliki keterampilan <strong> {{ $predikathuruf_pjok }}
                        </strong> {{ $predikat_keterampilan_deskripsi_pjok }}</td>
                </tr>
                <tr class="details">
                    <td style="text-align: center;">2</td>
                    <td style="text-align: left;">Seni Budaya dan Keterampilan</td>
                    <td style="text-align: center;">{{ $raport_pengetahuan_sbk }}</td>
                    <td style="text-align: center;">{{ $predikat_huruf_sbk }}</td>
                    <td style="text-align: left;">Memiliki kemampuan <strong> {{ $predikat_huruf_sbk1 }} </strong>
                        {{ $predikat_deskripsi_sbk }}</td>
                    <td style="text-align: center;">{{ $raport_keterampilan_sbk }}</td>
                    <td style="text-align: center;">{{ $predikat_keterampilan_huruf_sbk }}</td>
                    <td style="text-align: left;">Memiliki keterampilan <strong> {{ $predikathuruf_sbk }} </strong>
                        {{ $predikat_keterampilan_deskripsi_sbk }}</td>
                </tr>
                <tr class="details">
                    <td colspan="2" style="text-align: center;">Jumlah</td>
                    <td style="text-align: center;">{{ $jumlah_raport_pengetahuan }}</td>
                    <td colspan="2" style="text-align: left;">{{ terbilang($jumlah_raport_pengetahuan) }}</td>
                    <td style="text-align: center;">{{ $jumlah_raport_keterampilan }}</td>
                    <td colspan="2" style="text-align: left;">{{ terbilang($jumlah_raport_keterampilan) }}</td>
                </tr>
                <tr class="details">
                    <td colspan="2" style="text-align: center;">Rata-rata</td>
                    <td style="text-align: center;">{{ $ratarata_raport_pengetahuan }}</td>
                    <td colspan="2" style="text-align: left;">{{ terbilang($ratarata_raport_pengetahuan) }}</td>
                    <td style="text-align: center;">{{ $ratarata_raport_keterampilan }}</td>
                    <td colspan="2" style="text-align: left;">{{ terbilang($ratarata_raport_keterampilan) }}</td>
                </tr>
                <tr class="details">
                    <td colspan="2" style="text-align: center;">Total Nilai</td>
                    <td style="text-align: center;">{{ $jumlah_raport }}</td>
                    <td colspan="5" style="text-align: left;">{{ terbilang($jumlah_raport) }}</td>
                </tr>
                <tr class="details">
                    <td colspan="2" style="text-align: center;">Rata-rata</td>
                    <td style="text-align: center;">{{ $ratarata_raport }}</td>
                    <td colspan="5" style="text-align: left;">{{ terbilang($ratarata_raport) }}</td>
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
                    <td colspan="2" style="text-align: center;">1</td>
                    <td style="text-align: center;">---</td>
                    <td colspan="5" style="text-align: center;">---</td>
                </tr>
                <tr class="details">
                    <td colspan="2" style="text-align: center;">2</td>
                    <td style="text-align: center;">---</td>
                    <td colspan="5" style="text-align: center;">---</td>
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
                    <td colspan="4" style="text-align: center;">{{ $alpa1 }}</td>
                </tr>
                <tr class="details">
                    <td style="text-align: center;">2</td>
                    <td colspan="3" style="text-align: center;">Ijin</td>
                    <td colspan="4" style="text-align: center;">{{ $ijin1 }}</td>
                </tr>
                <tr class="details">
                    <td style="text-align: center;">3</td>
                    <td colspan="3" style="text-align: center;">Sakit</td>
                    <td colspan="4" style="text-align: center;">{{ $sakit1 }}</td>
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
                        {{ $catatan_wali_kelas }}
                        <br>
                        <br>
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
                            @if ($semester_aktif == 'Genap')
                                <tr>
                                    <td colspan="8">
                                        Berdasarkan penilaian selama semester ini,
                                        <br>siswa dinyatakan:
                                    </td>
                                </tr>
                                <tr>
                                    @if ($kelas_siswa == 'Kelas 6')
                                        <td colspan="8">
                                            Lulus/Tidak Lulus

                                        </td>
                                    @elseif($kelas_siswa == 'Kelas 5' || $kelas_siswa == 'Kelas 4' || $kelas_siswa == 'Kelas 3')
                                        <td colspan="8">
                                            Naik/Tidak Naik
                                            <br> ke kelas: {{ $kelas_naik }}
                                        </td>
                                    @endif
                                </tr>
                            @endif
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
                                    {{ $kecamatan }}, {{ $tanggal_raport }}
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
                                    ({{ $wali_kelas }})
                                    <br> Nip. {{ $nip_guru }}
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
                                    <img class="logo" src="{{ asset('images/ttd_barcode.jpg') }}" width="310"
                                        alt="">
                                    <hr align="center">
                                </td>
                            </tr>
                            <tr>
                                <td text-align="center" colspan="8">
                                    ({{ $kepala }})
                                    <br> Nip. {{ $nip }}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    @endif
</body>

</html>
