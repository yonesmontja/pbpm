  <table class="table table-bordered">
    <caption>List of users</caption>
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