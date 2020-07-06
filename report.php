<?php  /*Just for your server-side code*/
    header('Content-Type: text/html; charset=ISO-8859-1');
require 'fpdf.php';
require 'dbconnect.php';
session_start();
class mypage extends FPDF
{
    function footer()
    {
        $this->setFont('Arial','',8);   
         $this->setY(-10);
         $this->cell(0,10,'This report has been generated by cts student club web portal',0,1,'R');
        $this->setFont('Arial','',8);
        $this->cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
        
        
    }
    function content()
    {
        global $res,$scon,$row,$i,$res1,$row1,$res2,$row2,$rno,$name1,$res3,$row3,$name2,$res4,$row4,$t1,$t2,$month,$res6,$row6;
        $month=date('F');
         $this->setFont('Arial','B',14);
         $this->cell(0,10,'Cognizant Student Club Monthly Report February 2020',0,1,'C');   
         $this->setFont('Arial','',12);
        $this->cell(190,10,'College Name: St. Jospehs College of Engineering',0,1,'C');
        $this->cell(190,10,'Leader Name: Alvis F , Somasundar S',0,1,'C');
        $this->cell(0,10,'Faculty POC Name: Dr. MARIAKALAVATHY.G',0,0,'L');
        $this->cell(0,10,'Email ID: hodcsestudentaffairs@stjosephs.ac.in',0,1,'R');
        $this->cell(39,10,'',0,0,'L');
         $this->cell(30,10,'Dr. LILLY RAAMESH',0,0,'L');
        $this->cell(0,12,'Email ID: hoditstudentaffairs@stjosephs.ac.in',0,1,'R');
         $this->setFont('Arial','B',12);
          $this->Ln(10);
         $this->cell(0,10,'Events of the Month:',0,1,'L');
        
        $res=mysqli_query($scon,"select * from user_info where status=1");
        $i=1;
        $width=190;
        $lineHeight=5;
        while($row=mysqli_fetch_array($res))
        {
            $name=$row['event'];
            $date=$row['date'];
            $time=$row['time'];
            $des=$row['description'];
            $image1=$row['path'];
            $obj=$row['objective'];
            $image2=$row['path2'];
            $no=$row['event_no'];
            $link="ctsclub.ml";
            $this->setFont('Arial','B',12);
         $this->cell(0,10,$i.'. Event Name: '.$name,0,1,'L');
           
        $this->cell(0,10,'Objective: ',0,1,'L');
        $this->setFont('Arial','',12);
            $this->MultiCell($width, $lineHeight, $obj);
            $this->setFont('Arial','B',12);
        $this->cell(0,10,'Date & Time of the Event: '.$date.' '.$time,0,1,'L');
            $this->setFont('Arial','B',12);
        $this->cell(0,10,'Event Description: ',0,1,'L');
        $this->setFont('Arial','',12);
            $this->MultiCell($width, $lineHeight, "{$des}");
              $this->setFont('Arial','B',12);
        $this->cell(0,10,'Link or any supporting Documents for the event:',0,1,'L');
        $this->setFont('Arial','',12);
        if($no==18)
        {
            $this->Cell(70,12,'Cts Student Club Web portal', 0,1,'',false, "index.php");
        }
             $this->setFont('Arial','B',12);
        $this->cell(0,10,'Photos of the Event:',0,1,'L');
            $page_height = 286.93;
            $bottom_margin = 0;
            $height_of_cell=80;
             $space_left=$page_height-($this->GetY()+$bottom_margin);
             if ($height_of_cell > $space_left) {
        $this->AddPage();
             }
//            $this->Cell( 80, 60, $this->Image($image1, $this->GetX(), $this->GetY(), 60), 0, 0, 'L', false );
            if($image2=='')
            {
                $this->ln();
                $i++;
                continue;
                
            }
            else
//            $this->Cell( 80, 60, $this->Image($image2, $this->GetX(), $this->GetY(), 60), 0, 0, 'R', false );
            $this->ln();
            
//       $this->Image($path,10,10,-300);   
//            $this->Ln(35);
            $i++;
//        $this->cell(0,10,'',0,0,'C'); 
    }
        $this->setFont('Arial','B',12);
        $this->cell(190,10,'Star Performer and Best Mentor of the Month',0,1,'C');
         $this->setFont('Arial','B',12);
        $this->cell(0,10,'Star Performer:',0,1,'L');
        $this->setFont('Arial','B',10);
        $this->cell(10,5,'S.NO',0,0,'L');
        $this->cell(35,5,'Name',0,0,'L');
        $this->cell(15,5,'Degree',0,0,'L');
        $this->cell(15,5,'Branch',0,0,'L');
        $this->cell(90,5,'Justification for Nomination',0,0,'L');
        $this->cell(30,5,'Image',0,1,'L');
        $res1=mysqli_query($scon,"select * from performers where month='$month'");
        $i=1;
        while($row1=mysqli_fetch_array($res1))
        {
               $rno=$row1['RollNo'];
                $jus=$row1['justification'];
            $res2=mysqli_query($scon,"select * from login where RollNo='$rno' and username!='admin'");
            $row2=mysqli_fetch_array($res2);
            
                $name1=$row2['username'];
                $bat=$row2['branch'];
                $deg=$row2['degree'];
                $image1=$row2['imagepath'];
        $this->setFont('Arial','',10);
        $x = $this->GetX();
        $y = $this->GetY();
        $lnheight=$this->WordWrap($jus,90);

$this->MultiCell(10,10,$i,0,'L');
$this->SetXY($x + 10, $y);
$this->MultiCell(35,10,strtoupper($name1),0,'L');
$this->SetXY($x + 45, $y);

        $this->Multicell(15,10,$deg,0,'L');
        $this->SetXY($x + 60, $y);
        $this->Multicell(15,10,$bat,0,'L');
        $this->SetXY($x + 75, $y);
        $this->Multicell(90,7,$jus,0,'L');
        $this->SetXY($x + 165, $y);
        $this->Cell( 40, 40, $this->Image($image1, $this->GetX(), $this->GetY(), 33.78), 0, 1, 'L', false );
         $this->ln(5);
            $i++;
            
        }
        $width=190;
    $page_height = 286.93;
            $bottom_margin = 0;
            $height_of_cell=80;
             $space_left=$page_height-($this->GetY()+$bottom_margin);
             if ($height_of_cell > $space_left) 
        $this->AddPage();
         $this->setFont('Arial','B',12);
        $this->cell(0,10,'Best Mentor:',0,1,'L');
        $this->setFont('Arial','B',10);
        $this->cell(10,5,'S.NO',0,0,'L');
        $this->cell(35,5,'Name',0,0,'L');
        $this->cell(15,5,'Degree',0,0,'L');
        $this->cell(15,5,'Branch',0,0,'L');
        $this->cell(90,5,'Justification for Nomination',0,0,'L');
        $this->cell(30,5,'Image',0,1,'L');
        $res1=mysqli_query($scon,"select * from login where RollNo='17CS116' or RollNo='17IT000'");
        $i=1;
        $jus;
        while($row1=mysqli_fetch_array($res1))
        {
               $rno=$row1['RollNo'];
                if($rno=='17CS116')
                $jus='He showed utmost dedication to coordinating all club events and delieverd on imparting essential skills to all the participants of the events';
                else
                $jus='Good cooardinator and motivator';
            $res2=mysqli_query($scon,"select * from login where RollNo='$rno' and username!='admin'");
            $row2=mysqli_fetch_array($res2);
            
                $name1=$row2['username'];
                $bat=$row2['branch'];
                $deg=$row2['degree'];
                $image1=$row2['imagepath'];
        $this->setFont('Arial','',10);
        $x = $this->GetX();
        $y = $this->GetY();
        $lnheight=$this->WordWrap($jus,90);

$this->MultiCell(10,10,$i,0,'L');
$this->SetXY($x + 10, $y);
$this->MultiCell(35,10,strtoupper($name1),0,'L');
$this->SetXY($x + 45, $y);

        $this->Multicell(15,10,$deg,0,'L');
        $this->SetXY($x + 60, $y);
        $this->Multicell(15,10,$bat,0,'L');
        $this->SetXY($x + 75, $y);
        $this->Multicell(90,7,$jus,0,'L');
        $this->SetXY($x + 165, $y);
//        $this->Cell( 40, 40, $this->Image($image1, $this->GetX(), $this->GetY(), 33.78), 0, 1, 'L', false );
         $this->ln(20);
            $i++;
            
        }
        $this->setFont('Arial','B',12);
        $this->cell(0,10,'Attendance:',0,1,'L');
        $this->setFont('Arial','B',10);
        $this->cell(10,5,'S.NO',1,0,'L');
        $this->cell(80,5,'Name of the Student',1,0,'L');
        $this->cell(20,5,'Degree',1,0,'L');
        $this->cell(20,5,'Branch',1,0,'L');
        $this->cell(50,5,'No of Club events absent',1,1,'L');
        $res3=mysqli_query($scon,"select * from login");
        $i=1;
        while($row3=mysqli_fetch_array($res3))
        {
            $this->setFont('Arial','',10);
            $name2=$row3['username'];
            $bat=$row3['branch'];
                $deg=$row3['degree'];
        $this->cell(10,5,$i,1,0,'L');
        $this->cell(80,5,strtoupper($name2),1,0,'L');
        $this->cell(20,5,$deg,1,0,'L');
        $this->cell(20,5,$bat,1,0,'L');
        $this->cell(50,5,'NIL',1,1,'L');
        $i++;
        }
         $this->Ln(10);
        $this->setFont('Arial','B',12);
         $res4=mysqli_query($scon,"select feedback,plans from performers where month='$month'");
        $row4=mysqli_fetch_array($res4);
        $t1=$row4['plans'];
        $t2=$row4['feedback'];
        $this->cell(0,10,'Plans for Next Month Tasks:',0,1,'L');
        
        $width=190;
        $lineHeight=7;
        $this->setFont('Arial','',12);
       
        $this->MultiCell($width, $lineHeight, $t1);
        $this->setFont('Arial','B',12);
        $this->cell(0,10,'Suggestion or Feedbacks:',0,1,'L');
        $this->setFont('Arial','',12);
        $this->MultiCell($width, $lineHeight, $t2);
            $this->setFont('Arial','B',12);
        $this->cell(0,10,'Declaration:',0,1,'L');
        $width=190;
        $lineHeight=7;
        $declare="I hereby declare  that  all above  mentioned   tasks and events   are done as  part   of  student club  and   as per the directions of Cognizant HR POC. In case of any discrepancy or norms violation, I agree to disqualify the submitted tasks or remove the team from Cognizant Student Club 2019.";
        $this->setFont('Arial','',12);
        $this->MultiCell($width, $lineHeight, "{$declare}");
         $this->Ln(10);
          $this->setFont('Arial','',12);
        $this->cell(0,10,'Leader Name: Alvis F',0,1,'L');
        $this->cell(28,10,'',0,0,'L');
        $this->cell(15,10,'Somasundar S',0,1,'L');
        $this->cell(0,10,'Date: '.date("d/m/Y"),0,1,'L');
    }
    
    
    function WordWrap(&$text, $maxwidth)
    {
        $text = trim($text);
        if ($text==='')
            return 0;
        $space = $this->GetStringWidth(' ');
        $lines = explode("\n", $text);
        $text = '';
        $count = 0;

        foreach ($lines as $line)
        {
            $words = preg_split('/ +/', $line);
            $width = 0;

            foreach ($words as $word)
            {
                $wordwidth = $this->GetStringWidth($word);
                if ($wordwidth > $maxwidth)
                {
                    for($i=0; $i<strlen($word); $i++)
                    {
                        $wordwidth = $this->GetStringWidth(substr($word, $i, 1));
                        if($width + $wordwidth <= $maxwidth)
                        {
                            $width += $wordwidth;
                            $text .= substr($word, $i, 1);
                        }
                        else
                        {
                            $width = $wordwidth;
                            $text = rtrim($text)."\n".substr($word, $i, 1);
                            $count++;
                        }
                    }
                }
                elseif($width + $wordwidth <= $maxwidth)
                {
                    $width += $wordwidth + $space;
                    $text .= $word.' ';
                }
                else
                {
                    $width = $wordwidth + $space;
                    $text = rtrim($text)."\n".$word.' ';
                    $count++;
                }
            }
            $text = rtrim($text)."\n";
            $count++;
        }
        $text = rtrim($text);
        return $count;
}

    
}

    $page=new mypage('P','mm','A4');
    $page->aliasNbPages();
$page->Addpage();
$page->content();
$page->output();

