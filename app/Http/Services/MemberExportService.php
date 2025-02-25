<?php
namespace App\Http\Services;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use App\Models\Member;

class MemberExportService
{
    //預設格式
    public function exportXlsxDefault(){
        $members        = Member::all();

        $spreadsheet    = new Spreadsheet();
        $sheet          = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1','id');        //excell標題
        $sheet->setCellValue('B1', 'name');
        
        //寫入excel資料
        $row = 2;   //第一橫排是標題，要從第2橫排開始
        foreach( $members as $m){
            $sheet->setCellValue("A{$row}", $m->id);
            $sheet->setCellValue("B{$row}", $m->name);
            //其他~
            $row++;
        }
        //將填入的資料生成暫存檔，並回傳暫存檔的路徑給controller
        $writer     = new Xlsx($spreadsheet);
        $fileName   = 'member.xlsx';
        $path       = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($path);

        return $path;
    }
    //同地址格式
    public function exportXlsxGroup(){
        $members        = Member::all();
        $groups         = $members->groupBy('address');

        $spreadsheet    = new Spreadsheet();
        $sheet          = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Members Grouped By Address');
        
        $sheet->setCellValue('A1','adress');        //excell標題
        $sheet->setCellValue('B1','name');
        $sheet->setCellValue('C1', 'birthdate');
        
        //寫入excel資料
        $row = 2; //第一橫排是標題，要從第2橫排開始
        foreach( $groups as $address => $membersWithSameAddress){
            $sheet->setCellValue("A{$row}", $address);

            $colIndex = 2; //第一直排是地址，要從第2橫排開始
            foreach( $membersWithSameAddress as $member){
                // $sheet->setCellValueByColumnAndRow($colIndex, $row, $member->name);
                // $colIndex++;
                // $sheet->setCellValueByColumnAndRow($colIndex, $row, $member->birthdate);
                // $colIndex++;
                $columnLetter = chr(64 + $colIndex);
                $sheet->setCellValue("{$columnLetter}{$row}", $member->name);
                $colIndex++;
                $columnLetter = chr(64 + $colIndex);
                $sheet->setCellValue("{$columnLetter}{$row}", $member->birthdate);
                $colIndex++;
            }
            $row++;
        }
        //將填入的資料生成暫存檔，並回傳暫存檔的路徑給controller
        $writer     = new Xlsx($spreadsheet);
        $fileName   = 'member.xlsx';
        $path       = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($path);

        return $path;
    }
}