<?php
  ob_start();
?>

<?php

// Include config file
define('__ROOT__', dirname(dirname(__FILE__,2)));
require_once(__ROOT__.'/config.php');
// Include the main Excel library (search for installation path).
require_once(__ROOT__.'/vendor/autoload.php');
?>

<?php
//
        use PhpOffice\PhpSpreadsheet\Spreadsheet;
        use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
        
         $todaysdate =   date("l jS \of F Y ");
         $row_header_main = 3;
         $row_header = 6;
         $row_body = $row_header+1;
         //FORMAT 
           //
           $styleSet_table_main_header = [
               //FONT
               'font'=>[
                   'bold'=>true,
                   'italic'=>false,
                   'underline'=>false,
                   'strikethrough'=>false,
                   //'color'=>['argb'=>'FFFF0000'],
                   'name'=>"Cooper Hewitt",
                   'size'=>12
                   ],
                //ALIGNMENT
                'alignment'=>[
                    'horizontal'=> \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
                   ],
                 
                ];
//
         $spreadsheet = new Spreadsheet();
//
            $sheet = $spreadsheet->getActiveSheet();
            //Heading
            //
            $sheet->mergeCells('A'.$row_header_main.':'. 'G'.$row_header_main);
            $sheet->getStyle('A'.$row_header_main.':'. 'G'.$row_header_main)->applyFromArray( $styleSet_table_main_header);
            $sheet->setCellValue('A'.$row_header_main, 'SECURITY PAYMENT STATUS AS AT TODAY: '. $todaysdate);
           
            $sheet->setCellValue('B'.$row_header, 'SN');
            $sheet->setCellValue('C'.$row_header, 'Phone');
            $sheet->setCellValue('D'.$row_header, 'Name');
            $sheet->setCellValue('E'.$row_header, 'Cumulative Payment Due');
            $sheet->setCellValue('F'.$row_header, 'Cumulative Payment Made');
            $sheet->setCellValue('G'.$row_header, 'Balance');
           
          //COL RESIZING 
            $sheet->getColumnDimension('A')->setWidth('10');
            $sheet->getColumnDimension('B')->setWidth('5');
            $sheet->getColumnDimension('C')->setWidth('15');
            $sheet->getColumnDimension('D')->setWidth('40');
            $sheet->getColumnDimension('E')->setWidth('20');
            $sheet->getColumnDimension('F')->setWidth('20');
            $sheet->getColumnDimension('G')->setWidth('20');
            
           //FORMAT 
           //
           $styleSet_table_header = [
               //FONT
               'font'=>[
                   'bold'=>true,
                   'italic'=>false,
                   'underline'=>false,
                   'strikethrough'=>false,
                   'color'=>['argb'=>'FFFF0000'],
                   'name'=>"Cooper Hewitt",
                   'size'=>12],
                //ALIGNMENT
                'alignment'=>[
                    'horizontal'=> \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
               // (C3) BORDER
                "borders" => [
                  
                  "outline" => [
                    "borderStyle" => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    //"color" => ["argb" => "FFFF0000"]
                        ]
                    ],
                ];
           $styleSet_table_body_center = [
               //FONT
               'font'=>[
                   'bold'=>false,
                   'italic'=>false,
                   'underline'=>false,
                   'strikethrough'=>false,
                   //'color'=>['argb'=>'FFFF0000'],
                   'name'=>"Cooper Hewitt",
                   'size'=>10],
                //ALIGNMENT
                'alignment'=>[
                    'horizontal'=> \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                "borders" => [
                  
                  "outline" => [
                    "borderStyle" => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    //"color" => ["argb" => "FFFF0000"]
                        ]
                    ],
                ];
           $styleSet_table_body_left = [
               //FONT
               'font'=>[
                   'bold'=>false,
                   'italic'=>false,
                   'underline'=>false,
                   'strikethrough'=>false,
                   //'color'=>['argb'=>'FFFF0000'],
                   'name'=>"Cooper Hewitt",
                   'size'=>10],
                //ALIGNMENT
                'alignment'=>[
                    'horizontal'=> \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT],
                "borders" => [
                  
                "outline" => [
                    "borderStyle" => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    //"color" => ["argb" => "FFFF0000"]
                        ]
                    ],
                ];
           $styleSet_table_body_right = [
               //FONT
               'font'=>[
                   'bold'=>false,
                   'italic'=>false,
                   'underline'=>false,
                   'strikethrough'=>false,
                   //'color'=>['argb'=>'FFFF0000'],
                   'name'=>"Cooper Hewitt",
                   'size'=>10],
                //ALIGNMENT
                'alignment'=>[
                    'horizontal'=> \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT],
                "borders" => [
                  
                  "outline" => [
                    "borderStyle" => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    //"color" => ["argb" => "FFFF0000"]
                        ]
                    ],
                ];
           
           
           // Attempt select query execution
                    $sql = "select DISTINCT users.name_value vname,users.sec_contr_dec21 contr, users.sec_outst_dec21 outst, users.mobile_no mobile, amount_due(users.occupancy, users.no_rooms, users.effective_date) due, sum(pay_sec_update.amount) paid, amount_due(users.occupancy, users.no_rooms, users.effective_date)- sum(pay_sec_update.amount) difference from users INNER JOIN pay_sec_update where users.mobile_no = pay_sec_update.mobile_no and pay_sec_update.service = 'security' group by users.mobile_no ";
                                       //
            //Obtain Total Count 
                    if ($result_count=mysqli_query($link,$sql))
                    {
                    // Return the number of rows in result set
                    $rowcount=mysqli_num_rows($result_count);
                    //printf("Result set has %d rows.\n",$rowcount);
                    // Free result set
                    mysqli_free_result($result_count);
                    } else{
                          header("location: error.php");
                          exit();
                        //echo "Oops! Something went wrong. Please try again later.";
                    }
           
            $sheet->getStyle('B'.$row_header.':'. 'G'.$row_header)->getAlignment()->setWrapText(true);
            //
            $sheet->getStyle('B'.$row_header)->applyFromArray( $styleSet_table_header);
            $sheet->getStyle('C'.$row_header)->applyFromArray( $styleSet_table_header);
            $sheet->getStyle('D'.$row_header)->applyFromArray( $styleSet_table_header);
            $sheet->getStyle('E'.$row_header)->applyFromArray( $styleSet_table_header);
            $sheet->getStyle('F'.$row_header)->applyFromArray( $styleSet_table_header);
            $sheet->getStyle('G'.$row_header)->applyFromArray( $styleSet_table_header);
         
            //Range end is computed by adding body start row(3) to data count ($rowcount) returned
            $sheet->getStyle('B'.$row_body.':B'.strval($rowcount + $row_header))->applyFromArray($styleSet_table_body_center);
            $sheet->getStyle('C'.$row_body.':C'.strval($rowcount + $row_header))->applyFromArray($styleSet_table_body_center);
            //
            $sheet->getStyle('D'.$row_body.':D'.strval($rowcount + $row_header))->applyFromArray($styleSet_table_body_left);
            //
            $sheet->getStyle('E'.$row_body.':E'.strval($rowcount+ $row_header))->applyFromArray($styleSet_table_body_right);
            $sheet->getStyle('F'.$row_body.':F'.strval($rowcount+ $row_header))->applyFromArray($styleSet_table_body_right);
            $sheet->getStyle('G'.$row_body.':G'.strval($rowcount+ $row_header))->applyFromArray($styleSet_table_body_right);
                      
            
            
            //     
                    
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            $count = $row_header;
                                while($row = mysqli_fetch_array($result))
                                { 
                                    $count++;
                                      
                                       $sheet->setCellValue('B'.strval($count), $count - $row_header);
                                       $sheet->setCellValue('C'.strval($count), $row['mobile']);
                                       $sheet->setCellValue('D'.strval($count), $row['vname']);
                                       $sheet->setCellValue('E'.strval($count), number_format($row['contr']+$row['outst']+$row['due'],2));                                        
                                       $sheet->setCellValue('F'.strval($count), number_format($row['contr']+$row['paid'],2)); 
                                       $sheet->setCellValue('G'.strval($count), number_format(($row['contr']+$row['paid'])-($row['contr']+$row['outst']+$row['due']),2));
                                  
                                       
                                }
                                //
                              
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            $sheet->setCellValue('B'.strval($count), 'No Record were found');
                        }
                    } else{
                          header("location: error.php");
                          exit();
                        //echo "Oops! Something went wrong. Please try again later.";
                    }
           //
                            
            $writer = new Xlsx($spreadsheet);
            $writer->save('excel_store/sec_update_report.xlsx');
            
            
            
?>


<!DOCTYPE html>
<html lang="en">
 <?php
 include '../adminHF/header_admin.php';
 ?>
      <div class="container">
    <div class="row justify-content-center">
        
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
    
    <div class="rf-register-form">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3"> List of Members' Security Payment Status in Microsoft Excel Format</h2>
                    <p></p>
                    <p></p>
                    <a href="/admin/contributn_summary/excel_store/sec_update_report.xlsx" class="btn btn-danger ml-3">Download Report in Excel Format</a>
                    <p></p>
                    <div class="alert alert-danger"> Please click to <?php   $url = htmlspecialchars($_SERVER['HTTP_REFERER']);  echo "<a href='$url'>Go Back</a>";  ?>  </div>
                </div>
            </div>        
        </div>
    </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
 <?php
  include '../adminHF/footer_admin.php';
 ?>
    
</html>

<?php
  ob_end_flush();
?>