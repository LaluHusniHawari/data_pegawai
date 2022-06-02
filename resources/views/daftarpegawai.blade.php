@php
$no = 1;
//array scalar
$p1 = ['nip'=>'111','nama'=>'Andi', 'jabatan'=>'Manager', 'divisi'=>'SDM', 'agama'=>'islam'];
$p2 = ['nip'=>'112','nama'=>'Putra', 'jabatan'=>'Staff', 'divisi'=>'Keuangan', 'agama'=>'Hindu'];
$p3 = ['nip'=>'113','nama'=>'Putri', 'jabatan'=>'Asisten', 'divisi'=>'Marketing', 'agama'=>'Kristen'];
$p4 = ['nip'=>'114','nama'=>'Tami', 'jabatan'=>'Kabag', 'divisi'=>'Operasional', 'agama'=>'islam'];
$p5 = ['nip'=>'115','nama'=>'Tama', 'jabatan'=>'Staff', 'divisi'=>'Keuangan', 'agama'=>'islam'];
$p6 = ['nip'=>'116','nama'=>'Tira', 'jabatan'=>'Staff', 'divisi'=>'SDM', 'agama'=>'islam'];
$p7 = ['nip'=>'117','nama'=>'Dira', 'jabatan'=>'Asisten', 'divisi'=>'SDM', 'agama'=>'islam'];
$p8 = ['nip'=>'118','nama'=>'Yanto', 'jabatan'=>'Kabag', 'divisi'=>'Keuangan', 'agama'=>'islam'];
$p9 = ['nip'=>'119','nama'=>'Yanti', 'jabatan'=>'Manager', 'divisi'=>'Marketing', 'agama'=>'islam'];
$p10 = ['nip'=>'120','nama'=>'Anto', 'jabatan'=>'Staff', 'divisi'=>'SDM', 'agama'=>'islam'];

//array assoc
$pegawai = [$p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10];

$ar_judul = ['No','NIP','Nama','Jabatan','Divisi',
            'Agama', 'Gaji','Tunjangan Jabatan', 'Gaji Kotor', 'Take Home Pay'];
@endphp


<h1>Daftar Pegawai</h1>

<table border="0" align="center" cellpadding="10" cellspacing="0">
    <thead>
        <tr bgcolor="yellow">
            @foreach($ar_judul as $jdl)
            <th>{{ $jdl }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ( $pegawai as $result)
        <tr >
            <td>{{ $no++ }}</td>
            <td>{{ $result['nip'] }}</td>
            <td>{{ $result['nama']}}</td>
            <td>{{ $result['jabatan']}}</td>
            <td>{{ $result['divisi']}}</td>
            <td>{{ $result['agama']}}</td>
@php
    $jabatan = $result['jabatan'];
    $agama = $result['agama'];
@endphp

@switch($jabatan)
    @case('Manager')
         @php
             $gapok = 20000000;
         @endphp
        @break
    @case('Asisten')
            @php
                $gapok = 1500000;
            @endphp
        @break
     @case('Kabag')
            @php
                $gapok = 10000000;
            @endphp
        @break
     @case('Staff')
            @php
                $gapok = 400000;
            @endphp
        @break
    @default
@endswitch


@php
// menentukan tunjangan jabatan
$tunjangan_jabatan =  0.2 * $gapok;

// gaji kotor
$gaji_kotor = $gapok + $tunjangan_jabatan;

// zakat
$agama == 'islam' && $gapok >= 6000000 ? $zakat_profesi =  $gapok * 0.025 : $zakat_profesi = 0;

// thp/gaji bersih
$takeHomePay = $gaji_kotor - $zakat_profesi;

@endphp


<td>{{$gapok}}</td>
<td class="text-center">{{$tunjangan_jabatan }}</td>
<td>{{$gaji_kotor}}</td>
<td>{{$takeHomePay }}</td>

</tr>
@endforeach

</tbody>
</table>








