<?php

namespace App\Http\Controllers;

use App\Models\Annual_report;
use App\Models\Annual_report_pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;





class AnnualreportController extends Controller
{
    //
    protected $uploadPath;
    protected $uploadPathfile;

    public function __construct()
    {
        // Inisialisasi di constructor
        $this->uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/image/';
        $this->uploadPathfile = $_SERVER['DOCUMENT_ROOT'] . '/upload/file/';
    }
    public function index()
    {

        $title = 'Semua Annual Report';
        $annualreport = Annual_report::all();
        return view('annualreport.index', compact('title', 'annualreport'));
    }

    function add()
    {
        $title = 'Tambah Annual Report';
        return view('annualreport.add', compact('title'));
    }

    function store(Request $request)
    {
        $imagename = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imagename = 'annualreport_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->uploadPath, $imagename);
        }

        $filename = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = 'annualreport_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->uploadPathfile, $filename);
        }

        Annual_report::create([
            'title' => $request->title,
            'id_user' =>  Auth::user()->id,
            'description' => $request->description,
            'tahun' => $request->tahun,
            'image' => $imagename,
            'file' => $filename,
            'is_active' => $request->is_active,
        ]);

        return redirect('annualreport/add')->with('message', 'Annual Report Berhasil Ditambahkan');
    }

    function edit($id)
    {
        $title = 'Edit Annual Report';
        $annualreport = Annual_report::find($id);
        return view('annualreport.edit', compact('title', 'annualreport'));
    }
    function update(Request $request, $id)
    {
        $annualreport = Annual_report::find($id);
        $filename = $annualreport->file;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = 'annualreport_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->uploadPathfile, $filename);
        }

        $imagename = $annualreport->image;
        if ($request->hasFile('image')) {
            $file1 = $request->file('image');
            $imagename = 'annualreport_' . time() . '.' . $file1->getClientOriginalExtension();
            $file1->move($this->uploadPath, $imagename);
        }


        $annualreport->update([
            'title' => $request->title,
            'description' => $request->description,
            'tahun' => $request->tahun,
            'image' => $imagename,
            'file' => $filename,
            'is_active' => $request->is_active,
        ]);

        return redirect('annualreport/edit/' . $id)->with('message', 'Annual Report Berhasil Diubah');
    }


    function destroy($id)
    {
        try {
            $annualReport = Annual_report::findOrFail($id);

            // Delete image file if exists
            if ($annualReport->image) {
                $imagePath = public_path('upload/image/' . $annualReport->image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            // Delete PDF file if exists
            if ($annualReport->file) {
                $filePath = public_path('upload/file/' . $annualReport->file);
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
            }

            $annualReport->delete();

            return redirect('annualreport')->with('message', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('annualreport')->with('error', 'Gagal menghapus data');
        }
    }

    function pertanyaan()
    {
        $title = 'List Pertanyaan';
        $listpertanyaan = Annual_report_pertanyaan::join('annualreport', 'annualreport_pertanyaan.id_annualreport', '=', 'annualreport.id')
            ->select('annualreport_pertanyaan.*', 'annualreport.tahun')
            ->get();
        return view('annualreport.pertanyaan.index', compact('title', 'listpertanyaan'));
    }

    function showpertanyaan($id)
    {
        $title = 'Detail Pertanyaan';
        $pertanyaan =
            $listpertanyaan = Annual_report_pertanyaan::join('annualreport', 'annualreport_pertanyaan.id_annualreport', '=', 'annualreport.id')
            ->select('annualreport_pertanyaan.*', 'annualreport.tahun')
            ->where('annualreport_pertanyaan.id', $id)
            ->first();

        //Update status pertanyaan
        if ($pertanyaan->status == 'unread') {
            $pertanyaan->status = 'read';
            $pertanyaan->save();
        }
        return view('annualreport.pertanyaan.showpertanyaan', compact('title', 'pertanyaan'));
    }


    function updatepertanyaan(Request $request, $id)
    {
        $pertanyaan = Annual_report_pertanyaan::find($id);

        $request->validate([
            'reply_subject' => 'required',
            'reply_message' => 'required',
        ]);



        $filename = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = 'pertanyaan_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->uploadPathfile, $filename);
        }



        $pertanyaan->status = 'replied';
        $pertanyaan->replied_by = Auth::user()->id;
        $pertanyaan->reply_subject = $request->reply_subject;
        $pertanyaan->reply_message = $request->reply_message;
        $pertanyaan->reply_attachment = $filename;
        $pertanyaan->save();

        return redirect('annualreport/showpertanyaan/' . $id)->with('message', 'pesan Berhasil Dibalas');
    }
    function destroypertanyaan($id)
    {
        $pertanyaan = Annual_report_pertanyaan::find($id);
        $pertanyaan->delete();
        return redirect('annualreport/pertanyaan')->with('message', 'Pertanyaan Berhasil Dihapus');
    }



    //Kirim Annual Report
    public function sendreport($id)
    {
        try {
            $pertanyaan = Annual_report_pertanyaan::findOrFail($id);

            // Update status to replied
            $pertanyaan->status = 'replied';
            $pertanyaan->save();

            $annualreport = Annual_report::findOrFail($pertanyaan->id_annualreport);

            $email = $this->sendemail($annualreport->file, $pertanyaan->email);
            //dd($email);

            //$this->uploadPathfile

            // You can add email sending logic here if needed
            // Mail::to($pertanyaan->email)->send(new AnnualReportMail($pertanyaan));

            return redirect()->back()->with('message', 'Annual Report berhasil dikirim');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengirim Annual Report');
        }
    }

    public function sendemail($file, $email)
    {
        $filepdf = $this->uploadPathfile . $file;
        try {
            // Cara 1: Mengirim email text sederhana
            /* Mail::raw('Halo, bagaimana kabarmu kawan', function ($message) {
                $message->to('nafir91@gmail.com')
                    ->subject('Tanya Kabar');
            }); */

            /* // Cara 2: Mengirim email HTML
            Mail::html('<h1>Judul</h1><p>Isi email dalam format HTML</p>', function ($message) {
                $message->to('penerima@email.com')
                    ->subject('Judul Email');
            });

            // Cara 3: Mengirim email dengan view blade
            Mail::send('emails.template', ['data' => 'Data Anda'], function ($message) {
                $message->to('penerima@email.com')
                    ->subject('Judul Email');
            });*/

            // Cara 4: Mengirim dengan attachment $this->uploadPathfile
            /* Mail::raw('Terima Kasih telah menghubungi PT Sena, kami lampirkan file annual report', function ($message) use ($email, $filepdf) {
                $message->to($email)
                    ->subject('Annual Report');
                //->attach($filepdf);
            }); */
            // Tambahkan pesan yang menjelaskan ukuran file
            $filesize = round(filesize($filepdf) / 1024 / 1024, 2); // Convert to MB
            $message_text = "Terima Kasih telah menghubungi PT Sena, kami lampirkan file annual report\n";
            $message_text .= "Ukuran file: {$filesize}MB";

            // Jika file lebih dari 20MB, berikan link download sebagai alternatif
            if ($filesize > 20) {
                // Opsi 1: Kirim link download saja
                $download_link = url('download-report/' . $file); // Buat route untuk download
                Mail::raw(
                    "Terima Kasih telah menghubungi PT Sena\n\nFile annual report bisa didownload melalui link berikut:\n{$download_link}",
                    function ($message) use ($email) {
                        $message->to($email)
                            ->subject('Annual Report Download Link');
                    }
                );
            } else {
                // Opsi 2: Kirim file seperti biasa jika ukurannya masih dalam batas
                Mail::raw($message_text, function ($message) use ($email, $filepdf) {
                    $message->to($email)
                        ->subject('Annual Report')
                        ->attach($filepdf);
                });
            }

            return "Email berhasil dikirim!";
        } catch (\Exception $e) {
            return "Gagal mengirim email: " . $e->getMessage();
        }
    }


    function downloadreport($filename)
    {
        $filepath = $this->uploadPathfile . $filename;

        if (file_exists($filepath)) {
            return response()->download($filepath);
        }

        return abort(404);
    }
}
