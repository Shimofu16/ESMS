<?php

namespace App\Http\Controllers;

use App\Helpers\Activity;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function store(Request $request, $id)
    {

        $request->validate([
            'form137file', 'JHS_certfile', 'PSAfile', 'goodmoralfile', 'Cardfile'
        ]);

        $student = Student::findOrfail($id);

        $document = new Document;
        $document->student_id = $id;
        $document->Form137 = $request->form137;
        $document->JHS_cert = $request->JHS_cert;
        $document->PSA = $request->PSA;
        $document->Goodmoral = $request->goodmoral;
        $document->Card = $request->Card;


        if ($request->file('form137file') != null) {

            $form137_filepath = $request->file('form137file');
            $form137_fileName = $form137_filepath->getClientOriginalName();
            $form137_path = $request->file('form137file')->storeAs('document', $form137_fileName, 'public');


            $document->Form137_Path = $form137_path;
            $document->Form137_Document = $form137_fileName;
            Activity::log(auth()->user()->id, 'Document Management', 'Submitted Form 137');
        }

        if ($request->file('JHS_certfile') != null) {

            $JHS_cert_filepath = $request->file('JHS_certfile');
            $JHS_cert_fileName = $JHS_cert_filepath->getClientOriginalName();
            $JHS_cert_path = $request->file('JHS_certfile')->storeAs('document', $JHS_cert_fileName, 'public');

            $document->JHS_cert_Path = $JHS_cert_path;
            $document->JHS_cert_Document = $JHS_cert_fileName;
            Activity::log(auth()->user()->id, 'Document Management', 'Submitted Junior Highschool Certificate');
        }

        if ($request->file('PSAfile') != null) {

            $PSA_filepath = $request->file('PSAfile');
            $PSA_fileName = $PSA_filepath->getClientOriginalName();
            $PSA_path = $request->file('PSAfile')->storeAs('document', $PSA_fileName, 'public');

            $document->PSA_Path = $PSA_path;
            $document->PSA_Document = $PSA_fileName;
            Activity::log(auth()->user()->id, 'Document Management', 'Submitted PSA');
        }

        if ($request->file('goodmoralfile') != null) {

            $goodmoral_filepath = $request->file('goodmoralfile');
            $goodmoral_fileName = $goodmoral_filepath->getClientOriginalName();
            $goodmoral_path = $request->file('goodmoralfile')->storeAs('document', $goodmoral_fileName, 'public');

            $document->Goodmoral_Path = $goodmoral_path;
            $document->Goodmoral_Document = $goodmoral_fileName;
            Activity::log(auth()->user()->id, 'Document Management', 'Submitted good moral');
        }


        if ($request->file('Cardfile') != null) {
            $Card_filepath = $request->file('Cardfile');
            $Card_fileName = $Card_filepath->getClientOriginalName();
            $Card_path = $request->file('Cardfile')->storeAs('document', $Card_fileName, 'public');

            $document->Card_Path = $Card_path;
            $document->Card_Document = $Card_fileName;
            Activity::log(auth()->user()->id, 'Document Management', 'Submitted card');
        }
        $document->save();

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {

        // $student = Student::with('document')->findOrfail($id);
        // $student->document->update($request->all());

        // $request->validate([
        //     'form137file','JHS_certfile','PSAfile','goodmoralfile','Cardfile'
        //   ]);

        $student = Student::findOrfail($id);
        $document = Document::where('student_id', $id);
        $document->student_id =  $id;

        if ($request->form137 != null) {


            if ($request->form137file != null) {
                $form137_filepath = $request->file('form137file');
                $form137_fileName = $form137_filepath->getClientOriginalName();
                $form137_path = $request->file('form137file')->storeAs('document', $form137_fileName, 'public');

                $document->update([
                    'Form137_Path' => $form137_path, 'Form137_Document' => $form137_fileName, 'Form137' => $request->form137
                ]);
            }

            $document->update([
                'Form137' => $request->form137
            ]);
            Activity::log(auth()->user()->id, 'Document Management', 'Submitted Form 137');
        }

        if ($request->JHS_cert != null) {


            if ($request->JHS_certfile != null) {

                $JHS_cert_filepath = $request->file('JHS_certfile');
                $JHS_cert_fileName = $JHS_cert_filepath->getClientOriginalName();
                $JHS_cert_path = $request->file('JHS_certfile')->storeAs('document', $JHS_cert_fileName, 'public');

                $document->update([
                    'JHS_cert_Path' => $JHS_cert_path, 'JHS_cert_Document' => $JHS_cert_fileName, 'JHS_cert' => $request->JHS_cert
                ]);
            }

            $document->update([
                'JHS_cert' => $request->JHS_cert
            ]);
            Activity::log(auth()->user()->id, 'Document Management', 'Submitted Junior Highschool Certificate');
        }

        if ($request->PSA != null) {

            if ($request->PSAfile != null) {

                $PSA_filepath = $request->file('PSAfile');
                $PSA_fileName = $PSA_filepath->getClientOriginalName();
                $PSA_path = $request->file('PSAfile')->storeAs('document', $PSA_fileName, 'public');

                $document->update([
                    'PSA_Path' => $PSA_path, 'PSA_Document' => $PSA_fileName, 'PSA' => $request->PSA
                ]);
            }

            $document->update([
                'PSA' => $request->PSA
            ]);
            Activity::log(auth()->user()->id, 'Document Management', 'Submitted PSA');
        }

        if ($request->goodmoral != null) {

            if ($request->goodmoralfile != null) {

                $goodmoral_filepath = $request->file('goodmoralfile');
                $goodmoral_fileName = $goodmoral_filepath->getClientOriginalName();
                $goodmoral_path = $request->file('goodmoralfile')->storeAs('document', $goodmoral_fileName, 'public');

                $document->update([
                    'Goodmoral_Path' => $goodmoral_path, 'Goodmoral_Document' =>  $goodmoral_fileName, 'Goodmoral' => $request->goodmoral
                ]);
            }

            $document->update([
                'Goodmoral' => $request->goodmoral
            ]);
            Activity::log(auth()->user()->id, 'Document Management', 'Submitted good moral');
        }


        if ($request->Card != null) {

            if ($request->Cardfile != null) {

                $Card_filepath = $request->file('Cardfile');
                $Card_fileName = $Card_filepath->getClientOriginalName();
                $Card_path = $request->file('Cardfile')->storeAs('document', $Card_fileName, 'public');

                $document->update([
                    'Card_Path' => $Card_filepath, 'Card_Document' =>  $Card_fileName, 'Card' => $request->Card
                ]);
            }

            $document->update([
                'Card' => $request->Card
            ]);
            Activity::log(auth()->user()->id, 'Document Management', 'Submitted card');
        }
        return redirect()->back();
    }

    public function download($id, $Document)
    {

        //  $student = Student::findOrfail($id);
        $download = Document::find($id);


        if ($Document == $download->Form137_Document) {
            return storage::download('public/' . $download->Form137_Path, $download->Form137_Document);
        }
        if ($Document == $download->JHS_cert_Document) {
            return storage::download('public/' . $download->JHS_cert_Path, $download->JHS_cert_Document);
        }
        if ($Document == $download->PSA_Document) {
            return storage::download('public/' . $download->PSA_Path, $download->PSA_Document);
        }

        if ($Document == $download->GoodMoral_Document) {
            return storage::download('public/' . $download->GoodMoral_Path, $download->GoodMoral_Document);
        }

        if ($Document == $download->Card_Document) {
            return storage::download('public/' . $download->Card_Path, $download->Card_Document);
        }
    }
}
