<?php
class CI_Excel
{
	public $workbook;
        
	function __construct()
	{
		require_once('PHPExcel.php');
		require_once('PHPExcel/IOFactory.php');
	}
	
	function readexcel($src, $numcol=4, $type='Excel5')
	{
		$xls_reader = PHPExcel_IOFactory::createReader($type);
		$this->workbook = $xls_reader->load($src);
		
		$rowIterator = $this->workbook->getActiveSheet()->getRowIterator();
		
		$array_data = array();
		foreach($rowIterator as $row){
			$cellIterator = $row->getCellIterator();
			$cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
			//if(1 == $row->getRowIndex ()) continue;//skip first row
			$rowIndex = $row->getRowIndex ();
			$array_data[$rowIndex] = $this->get_colarr($numcol);
			$colselect = array_keys($array_data[$rowIndex]);
			foreach ($cellIterator as $cell) {
				if(in_array($cell->getColumn(),$colselect)){
					/*$aaa = mb_detect_encoding($cell->getCalculatedValue());
					if($aaa != 'ASCII'){
						echo $aaa.'-'.mb_convert_encoding($cell->getCalculatedValue(), "UTF-7","UTF-8");
						exit;
					}*/
					$array_data[$rowIndex][$cell->getColumn()] = $cell->getCalculatedValue();
					//mb_convert_encoding($cell->getCalculatedValue(), "SJIS","UTF-8");
				}
			}
		}
		return $array_data;
	}
	
	function saveexcel($name='excel', $type='Excel5')
	{
		$xls_writer = PHPExcel_IOFactory::createWriter($this->workbook, $type);
		if($type=='Excel5'){
			header('Content-Type: application/vnd.ms-excel');
	        header('Content-Disposition: attachment;filename="'.$name.'_'.date('dMy').'.xls"');
		}else{ // $type=='Excel2007'
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	        header('Content-Disposition: attachment;filename="'.$name.'_'.date('dMy').'.xlsx"');
		}
        header('Cache-Control: max-age=0');
        $xls_writer->save('php://output');
		exit;
	}
	
	function savepdf($name='pdf')
	{
		$type='PDF';
		$xls_writer = PHPExcel_IOFactory::createWriter($this->workbook, $type);
		header('Content-Type: application/pdf');
        header('Content-Disposition: attachment;filename="'.$name.'_'.date('dMy').'.pdf"');
        header('Cache-Control: max-age=0');
        $xls_writer->save('php://output');
		exit;
	}
	
	function saveexcel_obj($objlist, $type='Excel5')
	{
		$this->workbook = new PHPExcel();
		$this->workbook->getProperties()->setTitle("export")->setDescription("none");
		$this->workbook->setActiveSheetIndex(0);
		// Field names
		$col = 0;
		foreach ($objlist->fields as $field)
		{
			$f = str_replace('_id','',$field);
			$this->workbook->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $f);
			$col++;
		}
		// Fetching data
		$row = 2;
		foreach($objlist as $obj)
		{
			$col = 0;
			foreach ($obj->fields as $field)
			{
				$f = str_replace('_id','',$field);
				$this->workbook->getActiveSheet()->setCellValueByColumnAndRow($col, $row, (string)$obj->{$f});
				$col++;
			}

			$row++;
		}
		$this->workbook->setActiveSheetIndex(0);
		$this->saveexcel($objlist->model);
	}
	
	function get_colarr($numcol=4){
		if($numcol<=0) return array();
		$colarr = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
		if($numcol>count($colarr)) $numcol = count($colarr);
		$returnarr = array();
		for($i=0; $i<$numcol; $i++){
			$returnarr[$colarr[$i]] = '';
		}
		return $returnarr;
	}
	
	function get_excelcol($numcol=0){
		if($numcol<=0) return 'A';
		$colarr = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
		if($numcol>=count($colarr)) return 'Z';
		return $colarr[$numcol];
	}
}
?>
