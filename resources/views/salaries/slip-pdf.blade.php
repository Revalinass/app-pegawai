\<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slip Gaji - {{ $employee->nama_lengkap }}</title>

    <style>
    body {
        font-family: Arial, sans-serif;
        background: #f7f7f7;
        padding: 25px;
        display: flex;
        justify-content: center;
    }

    /* SLIP GAJI RESPONSIF */
    .slip {
        max-width: 720px;
        width: 100%;
        background: #ffffff;
        border: 2px solid #f2c8d5;
        border-radius: 8px;
        box-sizing: border-box;
        margin: 0 auto;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    
    /* WATERMARK */
    .watermark {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) rotate(-45deg);
        font-size: 110px;
        font-weight: bold;
        color: rgba(175, 26, 88, 0.04);
        pointer-events: none;
        z-index: 0;
        letter-spacing: 6px;
    }

    /* HEADER */
    .header {
        text-align: center;
        padding: 24px 0;
        background: linear-gradient(135deg, #fde8f0 0%, #fcd5e5 100%);
        border-bottom: 2px solid #f3c3d1;
        position: relative;
        z-index: 1;
    }

    .header-title {
        font-size: 22px;
        font-weight: bold;
        color: #af1a58;
        margin: 0;
        letter-spacing: 1px;
    }

    .header-sub {
        font-size: 16px;
        font-weight: 600;
        color: #aa1d55;
        margin-top: 5px;
    }

    .header-month {
        font-size: 13px;
        margin-top: 4px;
        color: #666;
        font-weight: 500;
    }

    /* SECTION */
    .section {
        padding: 24px 30px;
        border-bottom: 1px solid #f3c3d1;
        position: relative;
        z-index: 1;
    }

    .section-title {
        font-size: 14px;
        font-weight: bold;
        color: #aa1d55;
        margin-bottom: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-block;
    }

    table {
        width: 100%;
        font-size: 14px;
        border-collapse: collapse;
    }

    td {
        padding: 6px 0;
        vertical-align: top;
    }

    td:first-child {
        width: 35%;
        font-weight: 600;
        color: #333;
    }

    th {
        padding: 10px 0;
        border-bottom: 2px solid #f3c3d1;
        text-align: left;
        font-size: 13px;
        color: #aa1d55;
        font-weight: 600;
    }

    .salary-table td:last-child,
    .salary-table th:last-child {
        text-align: right;
        font-weight: 600;
    }

    .total {
        background: linear-gradient(135deg, #fde8f0 0%, #fcd5e5 100%);
        border: 2px solid #f2c8d5;
        padding: 14px 16px;
        margin-top: 16px;
        font-size: 15px;
        font-weight: bold;
        color: #af1a58;
        border-radius: 6px;
        text-align: center;
    }

    /* SIGNATURE - FIXED! */
    .signature {
        display: flex;
        justify-content: space-around;
        align-items: flex-start;
        padding: 30px 40px;
        gap: 40px;
        background: #fefbfc;
        position: relative;
        z-index: 1;
    }

    .sign {
        width: 45%;
        text-align: center;
    }

    .sign-label {
        color: #666;
        margin-bottom: 50px;
        font-size: 13px;
        font-weight: 600;
    }

    .sign-line {
        border-top: 2px solid #333;
        margin: 0 auto 10px auto;
        width: 80%;
    }

    .sign-name {
        font-weight: bold;
        font-size: 14px;
        color: #222;
    }

    /* FOOTER */
    .footer {
        padding: 16px;
        text-align: center;
        background: #fde8f0;
        color: #666;
        font-size: 11px;
        border-top: 2px solid #f3c3d1;
        line-height: 1.6;
        position: relative;
        z-index: 1;
    }
    
    .footer strong {
        color: #aa1d55;
        font-weight: 600;
    }
</style>
</head>
<body>


<div class="slip">
    <div class="watermark">SLIP GAJI</div>
    <!-- HEADER -->

    <div class="header">
        <div class="header-title">EMPLOYEE SYSTEM</div>
        <div class="header-sub">SLIP GAJI KARYAWAN</div>
        <div class="header-month">{{ $bulan }}</div>
    </div>

    <!-- DATA KARYAWAN -->
    <div class="section">
        <div class="section-title">Data Karyawan</div>
        <table>
            <tr>
                <td>Nama Lengkap</td>
                <td>: {{ $employee->nama_lengkap }}</td>
            </tr>
            <tr>
                <td>Posisi</td>
                <td>: {{ $employee->position->nama_posisi ?? '-' }}</td>
            </tr>
            <tr>
                <td>Departemen</td>
                <td>: {{ $employee->department->nama_department ?? '-' }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: {{ $employee->email }}</td>
            </tr>
        </table>
    </div>

    <!-- DETAIL GAJI -->
    <div class="section">
        <div class="section-title">Rincian Gaji</div>
        <table class="salary-table">
            <tr>
                <th>Keterangan</th>
                <th>Jumlah (Rp)</th>
            </tr>
            <tr>
                <td>Gaji Pokok</td>
                <td>{{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Tunjangan</td>
                <td>{{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Potongan</td>
                <td>{{ $salary->potongan > 0 ? '- ' . number_format($salary->potongan, 0, ',', '.') : '0' }}</td>
            </tr>
        </table>

        <div class="total">
            TOTAL GAJI BERSIH: Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}
        </div>
    </div>

    <!-- TANDA TANGAN-->
    <div class="signature">
        <div class="sign">
            <div class="sign-label">Disetujui Oleh</div>
            <div class="sign-line"></div>
            <div class="sign-name">Manager HRD</div>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        <strong>Dokumen otomatis — sah tanpa tanda tangan</strong><br>
        Dicetak: {{ $tanggal_cetak }}<br>
        Document ID: <strong>#{{ str_pad($salary->id, 6, '0', STR_PAD_LEFT) }}</strong>
    </div>
</div>

</body>
</html>