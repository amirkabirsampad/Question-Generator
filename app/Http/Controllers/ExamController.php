<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function generatePdf(Request $request)
    {
        $data = $request->all();

        $questions   = $data['questions'] ?? [];
        $subject     = $data['subject'] ?? '';
        $grade       = $data['grade'] ?? '';
        $chapter     = $data['chapter'] ?? '';
        $schoolName  = $data['school_name'] ?? '';
        $teacherName = $data['teacher_name'] ?? '';
        $examName    = $data['exam_name'] ?? 'آزمون';

        return view('main.print', compact(
            'questions',
            'subject',
            'grade',
            'chapter',
            'schoolName',
            'teacherName',
            'examName'
        ));
    }
}
