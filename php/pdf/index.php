<?php

// PDF生成
// function pdf(){
	require_once("./module/mpdf.php");

	$mpdf=new mPDF('ja', 'A4');
	$mpdf->ignore_invalid_utf8 = true;

	// $html = file_get_contents("http://visional.jp");
	// $stylesheet = file_get_contents("http://visional.jp/css/style.css" );

	
	// -----------------------------------------
	// 登録データ
	// -----------------------------------------

	$today = date("Y/m/d");

	// $page_title = '金融フォーラム2015';
	$page_title = $_GET['title'];

	// $name1 = '佐藤';
	$name1 = $_GET['name1'];

	// $name2 = '美帆'.'様';
	$name2 = $_GET['name2'].'様';

	// $date1 = '05/22';
	$date1 = $_GET['date'];

	// $week = '('.'金'.')';
	$week = '('.$_GET['week'].')';

	// $start_time = '9:30';
	$start_time = $_GET['start_time'];

	// $end_time = '〜'.'10:30';
	$end_time = '〜'.$_GET['end_time'];

	// $hall = '会場A会場（ベルサール神田 2F）';
	$hall = $_GET['hall'];

	// $session_name = '【東京／基調講演】地域金融機関に期待される役割';
	$session_name = $_GET['session_name'];

	// $hall_address = '東京都千代田区神田美土代町7 住友不動産神田ビル2・3F / TEL : 03-5281-3053';
	$hall_address = $_GET['hall_address'];

	// $hall_access = '新宿線「小川町駅」B6出口 徒歩2分<br/>千代田線「新御茶ノ水駅」B6出口 徒歩2分<br/>丸ノ内線「淡路町駅」A6出口 徒歩3分<br/>JR線「神田駅」北口 徒歩7分<br/>銀座線「神田駅」4番出口 徒歩7分<br/>半蔵門線、丸ノ内線、東西線、三田線、千代田線「大手町駅」C1出口 徒歩8分';
	$hall_access = $_GET['hall_access'];

	// $vote = '383';
	$vote = $_GET['vote'];

	// $vote_num = '431';
	$vote_num = $_GET['vote_num'];

	$title 				= '『'.$page_title.'』受講票';
	$title_company 		= $_GET['title_company'];
	// $title_company 		= '株式会社セミナーインフォ';

	$img 				= $_GET['img'];
	// $img 				= 'http://www.finance-forum.jp/forum_2015_tokyo/img/map.jpg';

	$contact_title 		= '株式会社セミナーインフォ';
	$contact_team 		= 'プロモーション事業部';
	$contact_tel 		= '03-3239-6544';
	$contact_mail 		= 'customer@seminar-info.jp';

	// HTML
	$html = '<div style="border-top:1px solid #333;">';
		$html.='<div style="border-left:1px solid #333;border-right:1px solid #333;">';
			$html.='<div id="title" style="width:100%; padding:2% 0; font-size:26px; text-align:center; border-bottom:1px solid #333; display:block;">';
				$html.=$title;
			$html.='</div>';
			$html.='<div id="company" style="padding:2%; border-bottom:1px solid #333">';
				$html.='<div id="title" style="">';
					$html.=$title_company;
				$html.='</div>';
				$html.='<div id="name" style="">';
					$html.=$name1.' '.$name2;
				$html.='</div>';
			$html.='</div>';
			$html.='<div id="summary" style="border-bottom:1px solid #333">';
				$html.='<div style="width:16%; height:20px; padding:30px 2% 30px 2%; float:left; border-right:1px solid #000;border-bottom:1px solid #333;">';
					$html.='お申し込み内容';
				$html.='</div>';
				$html.='<div style="float:left; border-bottom:1px solid #000;">';
					$html.='<div style="border-bottom:1px solid #333;">';
						$html.='<div style="width:20%; padding:2% 0; text-align:center; float:left;">';
							$html.='日時';
						$html.='</div>';
						$html.='<div id="date" style="width:77.81%; padding:2% 0 2% 2%; float:left; border-left:1px solid #000;">';
							$html.=$date1.$week.$start_time.$end_time;
						$html.='</div>';
					$html.='</div>';
					$html.='<div style="">';
						$html.='<div style="width:20%; height:18px; padding:2% 0; text-align:center; float:left;">';
							$html.='会場';
						$html.='</div>';
						$html.='<div id="hall" style="width:77.81%; height:18px; padding:2% 0 2% 2%; float:left; border-left:1px solid #000;">';
							$html.=$hall;
						$html.='</div>';
					$html.='</div>';
					// $html.='<div style="">';
					// 	$html.='<div style="width:20%; padding:2% 0; text-align:center; float:left;">';
					// 		$html.='セッション名';
					// 	$html.='</div>';
					// 	$html.='<div id="session_name" style="width:77.81%; padding:2% 0 2% 2%; float:left; border-left:1px solid #333;">';
					// 		$html.=$session_name;
					// 	$html.='</div>';
					// $html.='</div>';
				$html.='</div>';

				$html.='<div style="width:20%; height:14px; padding:2% 0; float:left; text-align:center; border-right:1px solid #333;">';
					$html.='注意事項';
				$html.='</div>';
				$html.='<div style="display:block; position:relative; border-bottom:1px solid #333;">';
					$html.='<p style="width:98%;margin-left:10px; font-size:10px; font-weight:bold; line-height:20px; letter-spacing:0.5px;">';
						// $html.='(1）こちらの受講票をセミナー会場受付にお持ちください。<br>(2）複数セミナーにお申し込みの場合は、セミナー毎に受講票が必要です。<br>(3)【基調講演】にお申し込みの方は、メイン会場(A)が満席の場合は、サブ会場(B)へのご案内となります。';
						$html.='(1）こちらの受講票をセミナー会場受付にお持ちください。';
					$html.='</p>';
				$html.='</div>';
				$html.='<div style="clear:both;"></div>';
				$html.='<div style="display:width:20%; padding:5% 0 2% 0; float:left; text-align:center; border-right:1px solid #333;">';
					$html.='会場アクセス';
				$html.='</div>';
				$html.='<div style="float:left;">';
					$html.='<p style="width:98%; height:calc(100%); margin-left:10px; font-size:12px; font-weight:bold; line-height:21px; letter-spacing:0.8px;">';
						$html.=$hall_address.'<br>';
						$html.=$hall_access;
					$html.='</p>';
				$html.='</div>';
				$html.='<div style="width:100%; padding:10px auto 10px auto; border-top:1px solid #333;">';
					$html.='<div style="width:500px; margin:0 auto; display:block;"><img src="'.$img.'"></div>';
				$html.='</div>';
				$html.='<div style="width:16%; height:20px; padding:32px 2% 31px 2%; float:left; border-right:1px solid #333;border-top:1px solid #333;">';
					$html.='お問い合わせ先';
				$html.='</div>';
				$html.='<div style="display:block; position:relative;border-top:1px solid #333;">';
					$html.='<p style="width:98%;margin-left:10px; font-size:10px; font-weight:bold; letter-spacing:0.5px;">';
						$html.=$contact_title.' / '.$contact_team.'<br>'.'<div style="width:25px; margin-left:20px; left:3px; font-size:11px; line-height:15px; float:left;">TEL</div><div style="font-size:11px;position:relative;margin-left:4px;margin-top:1px;">'.$contact_tel.'</div>'.'<div style="width:40px; margin-left:-36px; font-size:11px; float:left;">E-mail</div><div style="font-size:11px;">'.$contact_mail.'</div>';
					$html.='</p>';
				$html.='</div>';
			$html.='</div>';
		$html.='</div>';
	$html.='</div>';

	// ## 文字化け対策
	// $stylesheet = mb_convert_encoding($stylesheet, "UTF-8");
	$html = mb_convert_encoding($html,"UTF-8","auto");

	// 実行
	$mpdf->WriteHTML($stylesheet,1);
	$mpdf->WriteHTML($html,2);
	$mpdf->Output();

	exit;
// }
?>


<html>
<head>
	<title></title>
	<link rel="stylesheet" href="js/jquery-ui.css">
	<link rel="stylesheet" href="js/jquery-ui.structure.min.css">
	<link rel="stylesheet" href="js/jquery-ui.theme.min.css">
	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>

	<style>
	<!--
		body{
		    margin: 0;
		    padding: 0;
		}

		/*common stylesheet*/
		/*--------------------------------*/
		.borderNone{
			border:none !important;
		}

		
		#jquery-ui-sortable {
		    list-style-type: none;
		    margin: 0;
		    padding: 0;
	        /*width: 842px;*/
            width: 100%;
		}
		#jquery-ui-sortable li {
			padding: 0;
			margin: 0;
		    font-size: 12px;
			font-weight: bold;
			float: left;
			cursor: move;
            width: 11.8%;
			text-align: center;
			background: none;
		    border-left: 0;
		    border-top: 0;
		}
		
		#jquery-ui-sortable li:nth-child(9),
		#jquery-ui-sortable li:nth-child(10),
		#jquery-ui-sortable li:nth-child(17),
		#jquery-ui-sortable li:nth-child(18),
		#jquery-ui-sortable li:nth-child(25),
		#jquery-ui-sortable li:nth-child(26),
		#jquery-ui-sortable li:nth-child(33),
		#jquery-ui-sortable li:nth-child(34),
		#jquery-ui-sortable li:nth-child(41),
		#jquery-ui-sortable li:nth-child(42),
		#jquery-ui-sortable li:nth-child(49),
		#jquery-ui-sortable li:nth-child(50),
		#jquery-ui-sortable li:nth-child(57),
		#jquery-ui-sortable li:nth-child(58),
		#jquery-ui-sortable li:nth-child(65),
		#jquery-ui-sortable li:nth-child(66),
		#jquery-ui-sortable li:nth-child(73),
		#jquery-ui-sortable li:nth-child(74),
		#jquery-ui-sortable li:nth-child(81),
		#jquery-ui-sortable li:nth-child(82){ 
			border-bottom:0;
			border-left:0;
			border-top:0;
		}

		#jquery-ui-sortable li span {
		    cursor: move;
		    position: absolute;
		}

		.ui-state-default{}
		.ui-state-default span{}
		.ui-state-default input{
			width:100%;
			padding-left: 24px;
		}


	-->
	</style>
	<script>
	$(function(){
		
		function send(){
			$arr = new Array();
			for(var i=10;i<=88;i++){
				var $d = $('.page'+i).find('input').val();
				$arr.push($d);
			}
			$.ajax({
				type: "POST",
				url: "write.php",
				//下1行修正
				data:{
					'arr[]':$arr
				},
				success: function(res){
					console.log('success:');
					console.debug(res[0]);
				},
				error:function(){
					console.log('error');
				}
			});
		}
	});

	</script>
</head>
<body>
	<?php 

		//ドラッグでサイトマップを生成
		//XMLで抽出
		//URL設定
		//JSONの抽出
		//削除処理
		//新規追加処理
		//候補リストアップ処理
		//候補編集処理

		//デフォルトテーブル
		//横最低4列
		//縦最低10列
	?>
	<form method="POST" name="sitemap" id="sitemap">

		<ul id="jquery-ui-sortable">
		    <li class="ui-state-default page01">第一階層</li>
		    <li class="ui-state-default page02">URL</li>
		    <li class="ui-state-default page03">第二階層</li>
		    <li class="ui-state-default page04">URL</li>
		    <li class="ui-state-default page05">第三階層</li>
		    <li class="ui-state-default page06">URL</li>
		    <li class="ui-state-default page07">第四階層</li>
		    <li class="ui-state-default page08">URL</li>
		    <li class="ui-state-default page09">トップページ</li>
		    <li class="ui-state-default page10">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
		    	<input type="text" contenteditable="true" maxlength="10" value="test">
		    </li>
		    <li class="ui-state-default page11">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
		    	<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page12">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page13">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page14">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page15">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page16">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page17">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
			</li>
		    <li class="ui-state-default page18">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
			</li>
		    <li class="ui-state-default page19">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page20">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page21">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page22">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page23">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page24">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page25">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value=""></li>
		    <li class="ui-state-default page26">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value=""></li>
		    <li class="ui-state-default page27">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page28">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page29">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page30">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page31">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page32">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page33">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value=""></li>
		    <li class="ui-state-default page34">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value=""></li>
		    <li class="ui-state-default page35">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page36">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page37">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page38">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page39">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page40">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page41">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value=""></li>
		    <li class="ui-state-default page42">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value=""></li>
		    <li class="ui-state-default page43">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page44">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page45">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page46">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page47">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page48">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page49">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value=""></li>
		    <li class="ui-state-default page50">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value=""></li>
		    <li class="ui-state-default page51">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page52">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page53">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page54">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page55">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page56">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page57">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value=""></li>
		    <li class="ui-state-default page58">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value=""></li>
		    <li class="ui-state-default page59">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page60">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page61">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page62">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page63">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page64">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page65">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value=""></li>
		    <li class="ui-state-default page66">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value=""></li>
		    <li class="ui-state-default page67">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page68">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page69">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page70">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page71">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page72">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page73">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value=""></li>
		    <li class="ui-state-default page74">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value=""></li>
		    <li class="ui-state-default page75">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page76">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page77">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page78">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page79">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page80">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page81">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value=""></li>
		    <li class="ui-state-default page82">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value=""></li>
		    <li class="ui-state-default page83">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page84">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page85">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page86">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page87">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		    <li class="ui-state-default page88">
		    	<span class="ui-icon ui-icon-arrowthick-2-n-s ui-corner-all ui-state-hover"></span>
				<input type="text" contenteditable="true" value="">
		    </li>
		</ul>

		<input id="submit" type="submit" value="サイトマップ生成">
	</form>
	<div style="clear: both;"></div>

	<script>
		<!--
		$(function() {
			$( '#jquery-ui-sortable' ).sortable( {
		        handle: 'span',
		    } );
			$( '#jquery-ui-sortable' ).disableSelection();
		});
		// -->
	</script>
</body>
</html>