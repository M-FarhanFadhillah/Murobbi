<p style="margin-top:0pt; margin-bottom:8pt; text-align:center; line-height:108%; font-size:12pt;"><strong><span
            style="font-family:'Times New Roman';">Arus Kas Masjid</span></strong></p>
<p style="margin-top:0pt; margin-bottom:8pt; text-align:center; line-height:108%; font-size:12pt;"><span
        style="font-family:'Times New Roman';">&nbsp;</span></p>
<table cellspacing="0" cellpadding="0" style="width:492.6pt; border-collapse:collapse;">
    <tbody>
        <tr style="height:18.4pt;">
            <td style="width:72.6pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><span
                        style="font-family:'Times New Roman';">Nama Masjid</span></p>
            </td>
            <td style="width:147.6pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><span
                        style="font-family:'Times New Roman';">: {{ $data->masjid_name }}</span></p>
            </td>
            <td style="width:71.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><span
                        style="font-family:'Times New Roman';">Ketua Masjid</span></p>
            </td>
            <td style="width:157.45pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><span
                        style="font-family:'Times New Roman';">: {{ $data->ketua_masjid }}</span></p>
            </td>
        </tr>
        <tr style="height:18.6pt;">
            <td style="width:72.6pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><span
                        style="font-family:'Times New Roman';">Kas Saat Ini</span></p>
            </td>
            <td style="width:147.6pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><span
                        style="font-family:'Times New Roman';">: {{ 'Rp ' . number_format($data->kas, 0, ',', '.') }}</span></p>
            </td>
            <td style="width:71.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><span
                        style="font-family:'Times New Roman';">Kapasitas</span></p>
            </td>
            <td style="width:157.45pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><span
                        style="font-family:'Times New Roman';">: {{ $data->kapasitas }} Orang</span></p>
            </td>
        </tr>
        <tr>
            <td style="width:72.6pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><span
                        style="font-family:'Times New Roman';">Alamat Masjid</span></p>
            </td>
            <td colspan="3" style="width:398.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><span
                        style="font-family:'Times New Roman';">: {{ $data->alamat }}</span></p>
            </td>
        </tr>
    </tbody>
</table>
<p style="margin-top:0pt; margin-bottom:8pt; line-height:108%; font-size:12pt;"><span
        style="font-family:'Times New Roman';">&nbsp;</span></p>
<table cellspacing="0" cellpadding="0" style="width:581.95pt; border:0.75pt solid #000000; border-collapse:collapse;">
    <tbody>
        <tr>
            <td
                style="width:95.55pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; background-color:#ffff00;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt;"><strong><span
                            style="font-family:'Times New Roman';">Tanggal</span></strong></p>
            </td>
            <td
                style="width:130.95pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; background-color:#ffff00;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt;"><strong><span
                            style="font-family:'Times New Roman';">Keterangan</span></strong></p>
            </td>
            <td
                style="width:95.5pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; background-color:#ffff00;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt;"><strong><span
                            style="font-family:'Times New Roman';">Debit</span></strong></p>
            </td>
            <td
                style="width:102.6pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; background-color:#ffff00;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt;"><strong><span
                            style="font-family:'Times New Roman';">Kredit</span></strong></p>
            </td>
            <td
                style="width:102.6pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; background-color:#ffff00;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt;"><strong><span
                            style="font-family:'Times New Roman';">Saldo</span></strong></p>
            </td>
        </tr>
        <tr>
            <td
                style="width:95.55pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt;"><span
                        style="font-family:'Times New Roman';">{{ $data->created_at->format('d F Y') }}</span></p>
            </td>
            <td
                style="width:130.95pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt;"><span
                        style="font-family:'Times New Roman';">Saldo Awal</span></p>
            </td>
            <td
                style="width:95.5pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt;"><span
                        style="font-family:'Times New Roman';">&nbsp;</span></p>
            </td>
            <td
                style="width:102.6pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt;"><span
                        style="font-family:'Times New Roman';">&nbsp;</span></p>
            </td>
            <td
                style="width:102.6pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt;"><span
                        style="font-family:'Times New Roman';">{{ 'Rp ' . number_format($data->saldo_awal, 0, ',', '.') }}</span></p>
            </td>
        </tr>
        @foreach ($lapkeu as $item)
        @php
                        $saldo = $data->saldo_awal;
                    @endphp
        <tr>
            <td
                style="width:95.55pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt;"><span
                        style="font-family:'Times New Roman';">{{ date('d F Y', strtotime($item->date)) }}</span></p>
            </td>
            <td
                style="width:130.95pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt;"><span
                        style="font-family:'Times New Roman';">{{ $item->note }}</span></p>
            </td>
            <td
                style="width:95.5pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt;"><span
                        style="font-family:'Times New Roman';">{{ $item->cashflow === 0 ? 'Rp ' . number_format($item->nominal, 0, ',', '.') : '' }}</span></p>
            </td>
            <td
                style="width:102.6pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt;"><span
                        style="font-family:'Times New Roman';">{{ $item->cashflow === 1 ? 'Rp ' . number_format($item->nominal, 0, ',', '.') : '' }}</span></p>
            </td>
            @php
                                $result = $item->cashflow === 0 ? $saldo + $item->nominal : $saldo - $item->nominal;
                            @endphp
            <td
                style="width:102.6pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt;"><span
                        style="font-family:'Times New Roman';">{{ 'Rp ' . number_format($result, 0, ',', '.') }}</span></p>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<p style="margin-top:0pt; margin-bottom:8pt; line-height:108%; font-size:12pt;"><span
        style="font-family:'Times New Roman';">&nbsp;</span></p>

<script type="text/javascript">
    window.print();
</script>
