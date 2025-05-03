<?php

namespace App\Http\Controllers;

use App\Models\SupplierModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    // Menampilkan halaman awal supplier
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Supplier',
            'list'  => ['Home', 'Supplier']
        ];

        $page = (object) [
            'title' => 'Daftar Supplier yang terdaftar dalam sistem'
        ];

        $activeMenu = 'supplier';

        $supplier = SupplierModel::all();

        return view('supplier.index', compact('breadcrumb', 'page', 'supplier', 'activeMenu'));
    }

    // Ambil data supplier dalam bentuk JSON untuk DataTables
    public function list()
    {
        $supplier = SupplierModel::select('supplier_id', 'supplier_kode', 'supplier_nama', 'supplier_alamat', 'supplier_telp');

        return DataTables::of($supplier)
            ->addIndexColumn()
            ->addColumn('aksi', function ($supplier) {
                // $btn = '<a href="' . url('/supplier/' . $supplier->supplier_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                // $btn .= '<a href="' . url('/supplier/' . $supplier->supplier_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                // $btn .= '<form class="d-inline-block" method="POST" action="' . url('/supplier/' . $supplier->supplier_id) . '">'
                //     . csrf_field() . method_field('DELETE') . 
                //     '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                $btn  = '<button onclick="modalAction(\'' . url('/supplier/' . $supplier->supplier_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/supplier/' . $supplier->supplier_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/supplier/' . $supplier->supplier_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    // Form tambah supplier
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Supplier',
            'list'  => ['Home', 'Supplier', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Supplier baru'
        ];

        $activeMenu = 'supplier';

        return view('supplier.create', compact('breadcrumb', 'page', 'activeMenu'));
    }

    // Simpan supplier baru
    public function store(Request $request)
    {
        $request->validate([
            'supplier_kode' => 'required|string|max:20',
            'supplier_nama' => 'required|string|max:100',
            'supplier_alamat' => 'required|string|max:255',
            'supplier_telp' => 'required|string|max:15',
        ]);

        SupplierModel::create([
            'supplier_kode' => $request->supplier_kode,
            'supplier_nama' => $request->supplier_nama,
            'supplier_alamat' => $request->supplier_alamat,
            'supplier_telp' => $request->supplier_telp,
        ]);

        return redirect('/supplier')->with('success', 'Data supplier berhasil disimpan');
    }

    // Detail supplier
    public function show(string $id)
    {
        $supplier = SupplierModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Supplier',
            'list'  => ['Home', 'Supplier', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Supplier'
        ];

        $activeMenu = 'supplier';

        return view('supplier.show', compact('breadcrumb', 'page', 'supplier', 'activeMenu'));
    }

    // Form edit supplier
    public function edit(string $id)
    {
        $supplier = SupplierModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Supplier',
            'list'  => ['Home', 'Supplier', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Supplier'
        ];

        $activeMenu = 'supplier';

        return view('supplier.edit', compact('breadcrumb', 'page', 'supplier', 'activeMenu'));
    }

    // Update supplier
    public function update(Request $request, string $id)
    {
        $request->validate([
            'supplier_kode' => 'required|string|max:20',
            'supplier_nama' => 'required|string|max:100',
            'supplier_alamat' => 'required|string|max:255',
            'supplier_telp' => 'required|string|max:15',
        ]);

        SupplierModel::find($id)->update([
            'supplier_kode' => $request->supplier_kode,
            'supplier_nama' => $request->supplier_nama,
            'supplier_alamat' => $request->supplier_alamat,
            'supplier_telp' => $request->supplier_telp,
        ]);

        return redirect('/supplier')->with('success', 'Data supplier berhasil diubah');
    }

    // Hapus supplier
    public function destroy(string $id)
    {
        $check = SupplierModel::find($id);

        if (!$check) {
            return redirect('/supplier')->with('error', 'Data supplier tidak ditemukan');
        }

        try {
            SupplierModel::destroy($id);
            return redirect('/supplier')->with('success', 'Data supplier berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/supplier')->with('error', 'Data supplier gagal dihapus karena masih terkait dengan data lain');
        }
    }

    public function create_ajax()
    {
        return view('supplier.create_ajax');
    }

    public function store_ajax(Request $request)
    {
        if ($request->ajax()) {
            $rules = [
                'supplier_kode' => 'required|string|max:10|unique:m_supplier,supplier_kode',
                'supplier_nama' => 'required|string|max:100',
                'supplier_alamat' => 'required|string|max:100',
                'supplier_telp' => 'required|string|max:20'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(),
                ]);
            }

            SupplierModel::create($request->only(['supplier_kode', 'supplier_nama', 'supplier_alamat', 'supplier_telp']));

            return response()->json([
                'status' => true,
                'message' => 'Data supplier berhasil disimpan'
            ]);
        }

        return redirect('/');
    }

    public function edit_ajax(string $id)
    {
        $supplier = SupplierModel::find($id);
        return view('supplier.edit_ajax', compact('supplier'));
    }

    public function update_ajax(Request $request, $id)
    {
        if ($request->ajax()) {
            $rules = [
                'supplier_kode' => 'required|string|max:10|unique:m_supplier,supplier_kode,' . $id . ',supplier_id',
                'supplier_nama' => 'required|string|max:100',
                'supplier_alamat' => 'required|string|max:100',
                'supplier_telp' => 'required|string|max:20'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors()
                ]);
            }

            $check = SupplierModel::find($id);
            if ($check) {
                $check->update($request->only(['supplier_kode', 'supplier_nama', 'supplier_alamat', 'supplier_telp']));
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diupdate'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }

        return redirect('/');
    }

    public function confirm_ajax(string $id)
    {
        $supplier = SupplierModel::find($id);
        return view('supplier.confirm_ajax', compact('supplier'));
    }

    public function delete_ajax(Request $request, $id)
    {
        if ($request->ajax()) {
            $supplier = SupplierModel::find($id);
            if ($supplier) {
                try {
                    $supplier->delete();
                    return response()->json([
                        'status' => true,
                        'message' => 'Data berhasil dihapus'
                    ]);
                } catch (\Illuminate\Database\QueryException $e) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Data gagal dihapus karena terkait dengan data lain'
                    ]);
                }
            }

            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }

        return redirect('/');
    }

    public function show_ajax(string $id)
    {
        $supplier = SupplierModel::find($id);

        return view('supplier.show_ajax', [
            'supplier' => $supplier,
        ]);
    }

    public function import()
    {
        return view('supplier.import');
    }

    public function import_ajax(Request $request)
{
    if ($request->ajax() || $request->wantsJson()) {
        $rules = [
            'file_supplier' => ['required', 'mimes:xlsx', 'max:2048']
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi Gagal',
                'msgField' => $validator->errors()
            ]);
        }

        $file = $request->file('file_supplier');

        try {
            $reader = IOFactory::createReader('Xlsx');
            $reader->setReadDataOnly(true);
            $spreadsheet = $reader->load($file->getRealPath());
            $sheet = $spreadsheet->getActiveSheet();
            $data = $sheet->toArray(null, false, true, true); // Baca dengan kolom A, B, C, D

            $inserted = 0;
            foreach ($data as $key => $row) {
                if ($key === 1) continue; // Skip header

                $supplierKode   = $row['A'] ?? null;
                $supplierNama   = $row['B'] ?? null;
                $supplierAlamat = $row['C'] ?? null;
                $supplierTelp   = $row['D'] ?? null;

                if ($supplierKode && $supplierNama && $supplierAlamat && $supplierTelp) {
                    // Cek apakah kode supplier sudah ada
                    $existing = SupplierModel::where('supplier_kode', $supplierKode)->first();
                    if (!$existing) {
                        SupplierModel::create([
                            'supplier_kode'   => $supplierKode,
                            'supplier_nama'   => $supplierNama,
                            'supplier_alamat' => $supplierAlamat,
                            'supplier_telp'   => $supplierTelp,
                        ]);
                        $inserted++;
                    }
                }
            }

            return response()->json([
                'status' => true,
                'message' => "Import berhasil. $inserted data supplier ditambahkan."
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat memproses file: ' . $e->getMessage()
            ]);
        }
    }

    return redirect('/');
}



public function export_excel()
{
    // Ambil data supplier dari database
    $supplier = SupplierModel::select('supplier_kode', 'supplier_nama', 'supplier_alamat', 'supplier_telp')->get();

    // Buat objek spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Header kolom
    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Kode Supplier');
    $sheet->setCellValue('C1', 'Nama Supplier');
    $sheet->setCellValue('D1', 'Alamat Supplier');
    $sheet->setCellValue('E1', 'Telepon Supplier');

    $sheet->getStyle('A1:E1')->getFont()->setBold(true); // Tebalkan header

    // Isi data
    $no = 1;
    $baris = 2;
    foreach ($supplier as $value) {
        $sheet->setCellValue('A' . $baris, $no);
        $sheet->setCellValue('B' . $baris, $value->supplier_kode);
        $sheet->setCellValue('C' . $baris, $value->supplier_nama);
        $sheet->setCellValue('D' . $baris, $value->supplier_alamat);
        $sheet->setCellValue('E' . $baris, $value->supplier_telp);

        $no++;
        $baris++;
    }

    // Set auto size kolom
    foreach (range('A', 'E') as $col) {
        $sheet->getColumnDimension($col)->setAutoSize(true);
    }

    $sheet->setTitle('Data Supplier');

    // Output Excel
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $filename = 'Data Supplier ' . date('Y-m-d H-i-s') . '.xlsx';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
    header('Cache-Control: cache, must-revalidate');
    header('Pragma: public');

    $writer->save('php://output');
    exit;
}

}