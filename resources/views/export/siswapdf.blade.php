<!DOCTYPE html>
<html>
<head>
    <title>Daftar Siswa</title>
</head>
<body>


<table border="1" style="width:100%">
  <thead>
    <tr>
      <th>
        Daftar Siswa
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        
      </td>
    </tr>
  </tbody>
</table>

  <table border="1" style="width:100%">
    <thead>
      <tr>
        <th>
          DAFTAR NAMA SISWA
          SD INPRES DABOLDING
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          
        </td>
      </tr>
    </tbody>
  </table>

<table border="1" style="width:100%">
  <thead>
    <tr>
      <th>
        TAHUN PELAJARAN 2021/2022
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        
      </td>
    </tr>
  </tbody>
</table>


    <table style="width:100%">    
      <thead>
        <tr>
          <th>No.</th>
          <th>Nama Depan</th>
          <th>Nama Belakang</th>
          <th>NIS</th>
          <th>Jenis Kelamin</th>
          <th>Agama</th>
          <th>Alamat</th>
        </tr>
      </thead>
      <tbody>
        @php $i=1 @endphp
        @foreach($data_siswa as $siswa)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{$siswa -> nama_depan}}</td>
          <td>{{$siswa -> nama_belakang}}</td>
          <td>{{$siswa -> nis}}</td>
          <td>{{$siswa -> jenis_kelamin}}</td>
          <td>{{$siswa -> agama}}</td>
          <td>{{$siswa -> alamat}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
</body>
</html>

