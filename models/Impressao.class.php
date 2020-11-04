<?php
//biblioteca fpdf
require_once("lib/fpdf.php");
include_once("Conexao.php");
//include_once("error.php");

class Impressao{
	private $con;
	private $pdf;

	function __construct(){
		$this->con = new Conexao();
		$this->criaPDF();
	}

	function converte($string){
		return  iconv("UTF-8", "ISO-8859-1",$string);
	}

	function criaPDF(){
		//cria um documento PDF
		$this->pdf = new FPDF('p','mm','A4');

		$this->pdf->AddPage(); //adiconar uma página 
		$this->pdf->Image('images/marca.png');//figura

		//endereco da empresa
		$this->pdf->setFont('arial','',12);
		$this->pdf->Cell(0,20,"Rua Nereu Ramos, s/n, Bairro Universitário",0,1,'L');

		//email para contao
		$this->pdf->setFont('arial','',12);
		$this->pdf->Cell(0,20,"contato@ifsc.edu.br",0,1,'L');

		//dá espaco
		$this->pdf->ln(20);

		//configura a fonte
		$this->pdf->setFont('arial','B',18);
		$this->pdf->Cell(0,5,$this->converte("Relatorio"),0,1,'C');

		//linha abaixo do Titulo relatorio
		$this->pdf->Cell(0,5,"",0,1,'C');

		//dá espaco
		$this->pdf->ln(20);
		$this->pdf = $this->pdf;
	}

	function imprimeById($id){
        $dados = $this->con->get_conexao()->prepare("SELECT * FROM filme WHERE codigo=?");
        $dados->bindParam(1, $id);
        try {
            $dados->execute();
        } catch (PDOException $erro) {
            echo $erro -> getMessage();
        }

		while($linha = $dados->fetch(PDO::FETCH_OBJ)){
			$this->pdf->setFont('arial','B',12);
			$this->pdf->Cell(70,20,$this->converte("Codigo"),0,0,'L');
		
			//configura a fonte
			$this->pdf->setFont('arial','B',12);
			$this->pdf->Cell(0,20,$linha->codigo,0,1,'L');
			
			
			//configura a fonte Label...........
			$this->pdf->setFont('arial','B',12);
			$this->pdf->Cell(70,20,$this->converte("Titulo"),0,0,'L');
		
			//configura a fonte
			$this->pdf->setFont('arial','B',12);
			$this->pdf->Cell(0,20,$linha->titulo,0,1,'L');

			//configura a fonte Label............
			$this->pdf->setFont('arial','B',12);
			$this->pdf->Cell(70,20,$this->converte("Sinopse"),0,0,'L');
		
			//configura a fonte
			$this->pdf->setFont('arial','B',12);
			$this->pdf->Cell(0,20,$linha->sinopse,0,1,'L');
			
			//configura a fonte Label............
			$this->pdf->setFont('arial','B',12);
			$this->pdf->Cell(70,20,$this->converte("Quantidade"),0,0,'L');
		
			//configura a fonte
			$this->pdf->setFont('arial','B',12);
			$this->pdf->Cell(0,20,$linha->quantidade,0,1,'L');
			
			
			//configura a fonte Label.........
			$this->pdf->setFont('arial','B',12);
			$this->pdf->Cell(70,20,$this->converte("Trailer"),0,0,'L');
		
			//configura a fonte
			$this->pdf->setFont('arial','B',12);
			$this->pdf->Cell(0,20,$linha->trailer,0,1,'L');
		}
		$this->pdf->Output();
	}

	function imprimeTodos(){
        $dados = $this->con->get_conexao()->prepare("SELECT * FROM filme");
        try {
            $dados->execute();
        } catch (PDOException $erro) {
            echo $erro -> getMessage();
        }

		while($linha = $dados->fetch(PDO::FETCH_OBJ)){
			//configura a fonte Label...........
			$this->pdf->setFont('arial','B',12);
			$this->pdf->Cell(70,20,$this->converte("Titulo"),0,0,'L');
		
			//configura a fonte
			$this->pdf->setFont('arial','B',12);
			$this->pdf->Cell(0,20,$linha->titulo,0,1,'L');
			
			//configura a fonte Label.........
			$this->pdf->setFont('arial','B',12);
			$this->pdf->Cell(70,20,$this->converte("Trailer"),0,0,'L');
		
			//configura a fonte
			$this->pdf->setFont('arial','B',12);
			$this->pdf->Cell(0,20,$linha->trailer,0,1,'L');
		}
		$this->pdf->Output();
	}
}
?>