use Illuminate\Support\Carbon;

public function run(): void
{
    $data = [
        ['level_id' => 1, 'level_kode' => 'ADM', 'level_nama' => 'Administrator', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['level_id' => 2, 'level_kode' => 'MNG', 'level_nama' => 'Manager', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['level_id' => 3, 'level_kode' => 'USR', 'level_nama' => 'User', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['level_id' => 4, 'level_kode' => 'KSR', 'level_nama' => 'Kasir', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    ];

    foreach ($data as $row) {
        DB::table('m_level')->updateOrInsert(
            ['level_id' => $row['level_id']],
            ['level_kode' => $row['level_kode'], 'level_nama' => $row['level_nama'], 'created_at' => $row['created_at'], 'updated_at' => $row['updated_at']]
        );
    }
}
