<?php

namespace App\Http\Controllers;

use App\DataTables\Bot\BotDataTable;
use Illuminate\Http\Request;

class BotController extends Controller
{
    public function index(BotDataTable $dataTable){
        return $dataTable->render('bot-report.index');
    }
}
