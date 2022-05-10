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
            padding: 5px;
            vertical-align: top;
            font-size: 25px;
            line-height: 20px;
            font-family: 'Koulen';
        }

        .invoice-box table tr.details td {
            padding: 2px;
            vertical-align: top;
            padding-bottom: 12px;
            font-size: 15px;
            border: 2px solid rgb(12, 12, 12);
            border-bottom: 2px solid rgb(12, 12, 12);
            text-align: center
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
            <tr>
                <table>
                    <tr class="top">
                        <td>
                            <img class="logo" src="{{ asset('images/logo_dabolding.png') }}" width="610"
                                alt="">
                            <hr align="center">
                        </td>
                    </tr>
                    <tr class="top">
                        <td>
                            RAPOR PESERTA DIDIK
                            <br>
                            <br> SEKOLAH DASAR
                            <br>
                            <br> (SD)
                        </td>
                    </tr>
                </table>
            </tr>
            <table>
                <tr class="heading">
                    <td colspan="6">
                        <br> SD INPRES DABOLDING
                        <br>
                        <br> KALOMDOL - PEGUNUNGAN BINTANG - PAPUA
                    </td>
                </tr>
                <tr class="heading">
                    <td colspan="6">
                        <br> NSS:
                        <br>
                        <br> NPSN: 60302160
                    </td>
                </tr>
            </table>
            <tr class="top">
                <td colspan="8">
                    <table>
                        <tr>
                            <td>
                                <br>
                                <br>
                                NAMA PESERTA DIDIK
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br> {{ $siswa->nama_depan }} {{ $siswa->nama_belakang }}
                                <br> <hr>
                                <br> No. Induk:
                                <br> NISN:
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
                                <br>

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
                                <br> KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN
                                <br> REPUBLIK INDONESIA
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>
