<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DocumentController extends Controller
{
    public function document():View
    {
        $documents = Document::paginate(10);
        return view('pages.document', compact('documents'));
    }
}
